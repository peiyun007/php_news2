( function( $ ) {
    /**
        用法： 
        var flip = $('.flipContainer > div').quickFlip({
        ...
        });
        注销：
        flip.destroy();

    **/
    var defaults = {
        'eventName' : 'click', //String 可定义为hover或者click
        'needChildrenNumber' : 2, //在动画展示时需要前后两个视图
        'closeSpeed' : 100, 
        'openSpeed' : 110,
        'ctaSelector' : '', //String '.click_flip'当ctaSelector定义时，则动画触发事件绑定在该selector上
        'easing' : 'swing',
        'vertical' : false, //Bollean 为true时是上下翻转
        'hoverDuration' : 1000,
        'leaveDuration' : 500,
        'useOwnChildren' : false, //Bollean 为true时则在动画翻转时，消失和显示用的是自己的子view而不是空白view
        'actualChildrenNumber' : 0, //Number 在init的时候会自己计算父节点实际含有的孩子数量（不需要传）
        'flipFirstHideClass' : '', //第一次隐藏的空白div(用于动画关闭)的className
        'flipFirstShowClass' : '', //第一次显示的空白div(用于动画显示)的className
        'beforeFlip' : null, // Funcion
        'afterFlip' : null, // Function
        'baseCss' : {
            'position' : 'absolute',
            'margin' : 0,
            'padding' : 0,
            'overflow' : 'hidden'
        }
    }

    var QuickFlip = function (el, options){
        this.options = $.extend({}, defaults, options);
        this.$el = $(el);
        this.init();
    }
    var fn = QuickFlip.prototype;

    fn.init = function() {
        var options = this.options;
        var self = this;
        this.cssOpt = {
            'width' : this.$el.width(),
            'height' : this.$el.height(),
            'half' : parseInt( (options.vertical ? this.$el.height() : this.$el.width()) / 2)
        }
        if(this.$el.css('position') == 'static') this.$el.css('position', 'relative');

        var j = 0;
        $.each(this.$el.children(), function(i) {
            $(this).addClass('_flip_main').addClass('_flip_main_panel_child_' + i);
            j ++;
        })
        this.options.actualChildrenNumber = j;

        this.$flipDom = $('<div></div>');

        for(var i=0; i<options.needChildrenNumber; i++) {
            this.build(i);
        }

        this.$el.append(this.$flipDom);
        this.bindEvents();
    }

    fn.build = function(i) {
        var options = this.options;
        var self = this;
        var outerClass = 'quick_flip_' + (i);
       
        var flipItem = $([
        '<div class="'+ outerClass + '" style="display:none">',
        '   <div>',
        '   </div>',
        '   <div>',
        '   </div>',
        '</div>'].join(""));

        var outerCss = this.organizeCss('outer');
        var innerCss = this.organizeCss('inner');

        if(options.useOwnChildren && (options.actualChildrenNumber == options.needChildrenNumber)) {
            $.each(flipItem.children(), function(j) {
                $(this).css(outerCss['item' + j]);
                $(self.$el.find('._flip_main_panel_child_' + i)).clone().removeClass('_flip_main').show().css(innerCss['item' + j]).appendTo($(this));
             })
        } else {
            var childClassName = options['flipFirst'+ ((i == 0) ? 'Hide' : 'Show')  +'Class'];
            $.each(flipItem.children(), function(j) {
                $(this).css(outerCss['item' + j]);
                $('<div class="'+ childClassName +'" ></div>').css(innerCss['item' + j]).appendTo($(this));
            })
        } 
        this.$flipDom.append(flipItem);
    }

    fn.bindEvents = function() {
        var options = this.options;
        var self = this;
        if(options.eventName == 'hover') {
            self.bindHover();
        } else {
            this.$el.on('click.flip', options.ctaSelector, function(ev) {
                self.flip();
            })
        }
    }

    fn.unbindEvents = function() {
        this.$el.off('click.flip');
        this.$el.off('mouseenter.flip').off('mouseleave.flip');
    }

    fn.bindHover = function(ev) {
        var self = this;
        var options = this.options;
        this.$el.off('mouseenter.flip').off('mouseleave.flip');
        this.$el.on('mouseenter.flip', this.options.ctaSelector, function(ev) {
            ev.preventDefault();
            var target = $(ev.currentTarget);
            target.attr('leave', false);
            target.attr('flip', false);
            var setTime = setTimeout(function(){
                var leave = target.attr('leave');
                if(leave === 'true') {
                    clearTimeout(setTime);
                    return;
                } else {
                    self.flip();
                    target.attr('flip', true);
                }
                
            }, options.hoverDuration);                          
        }).on('mouseleave.flip',  this.options.ctaSelector, function(ev) {
            ev.preventDefault();
            var target = $(ev.currentTarget);
            target.attr('leave', true);
            var setTime = setTimeout(function(){
                var flip = target.attr('flip');
                if(flip === 'true') {
                    self.flip();
                } else {
                    clearTimeout(setTime);
                    return;
                }                                
            }, options.leaveDuration); 
        });
    }

    fn.organizeCss = function(type) {
        var options = this.options;
        var defaultsCss = options.baseCss;
        var compCss = {}
        var css = $.extend({}, defaultsCss, {
            width : type === 'outer' ? (options.vertical ? this.cssOpt.width : this.cssOpt.half)  : this.cssOpt.width,
            height : type === 'outer' ? (options.vertical ? this.cssOpt.half : this.cssOpt.height) : this.cssOpt.height
        })
        
        if(type == 'outer') {      
            if(options.vertical) {
                compCss.item0 = $.extend({}, css, {
                    'left' : 0,
                    'bottom' : this.cssOpt.half,
                })
                compCss.item1 = $.extend({}, css, {
                    'left' : 0,
                    'top' : this.cssOpt.half
                })
            } else {       
                compCss.item0 = $.extend({},css, {
                    'top' : 0,
                    'right' : this.cssOpt.half,
                })
                compCss.item1 = $.extend({},css, {
                    'top' : 0,
                    'left' : this.cssOpt.half
                })
            }
        } else {
            if(options.vertical) {
                compCss.item0 = $.extend({}, css, {
                    'left' : 0,
                    'top' : 0,
                })
                compCss.item1 = $.extend({}, css, {
                    'left' : 0,
                    'top' : 'auto',
                    'right' : 0
                })
            } else {          
                compCss.item0 = $.extend({}, css, {
                    'top' : 0,
                    'left' : 0,
                })
                compCss.item1 = $.extend({}, css, {
                    'top' : 0,
                    'left' : 'auto',
                    'right' : 0
                })
            }
        }
        return compCss;
    }

    fn.flip = function() {
        var options = this.options;
        var self = this;
        var showIndex = this.$el.attr('showIndex') || 1;
        var hideIndex = this.$el.attr('hideIndex') || 0;
        var flipHide = this.$flipDom.find('.quick_flip_' + hideIndex), 
            flipShow = this.$flipDom.find('.quick_flip_' + showIndex) ,
            closeCss = options.vertical ? { height : 0 } : { width : 0 },
            openCss = options.vertical ? { height : this.cssOpt.half } : { width : this.cssOpt.half };

        if(typeof(options.beforeFlip) == 'function') {
            options.beforeFlip.call(this, flipShow, flipShow);
        }

        if(options.needChildrenNumber == options.actualChildrenNumber) {
            this.$el.find('._flip_main:eq('+ hideIndex +')').hide();
        } else {
            self.$el.find('._flip_main:eq(0)').hide();
        }
        
        var animateEnd;
        $(flipHide.show().children()).each(function(){
            var $this = $(this);
            $this.css(openCss).animate( closeCss, options.closeSpeed, options.easing, function(){
                if(!animateEnd) {
                    animateEnd = true;
                    return;
                } else {
                    var innerAnimateEnd;
                    $(flipHide).hide();
                    $(flipShow.show().children()).each(function() {
                        var $that = $(this);          
                        $that.css(closeCss).animate(openCss, options.openSpeed, options.easing, function(){
                            if(!innerAnimateEnd){
                                innerAnimateEnd = true;
                                return;
                            }else {
                                $(flipShow).hide();

                                if(options.needChildrenNumber == options.actualChildrenNumber) {
                                    self.$el.find('._flip_main:eq('+ showIndex +')').show();
                                } else {
                                    self.$el.find('._flip_main:eq(0)').show();
                                }
                                
                                self.$el.attr('showIndex', hideIndex);
                                self.$el.attr('hideIndex', showIndex);
                                if(typeof(options.afterFlip) == 'function') {
                                    options.afterFlip.call(self);
                                }
                            }
                        })
                    })
                }
            })
        })

    }

    fn.destory = function() {
        this.unbindEvents();
        this.$flipDom.remove();
    }

    //jQuery adapter
    $.fn.quickFlip = function(options) {
        return this.each(function() {
            if (!$(this).data('quickFlip')) {
                $(this).data('quickFlip', new QuickFlip( this, options ));
            }
        });
    };
       
})( jQuery );