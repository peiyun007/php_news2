(function($) {
var scrollable =  function (options) {
    var imgUrl = options.imgUrl || "";

    var isFirefox= navigator.userAgent.toLowerCase().match(/firefox\/([\d.]+)/),
    ie6 = !window.XMLHttpRequest && window.ActiveXObject,
    d = 20;
  
    var self = this;
    var container = this[0];

    var _root, _slider, scrollAble,
    startPercent = 0, currentPercent, 
    scrollDis, sliderDis, 
    startY, draging = !1, 
    hideTimer;    
    
    init();
    function init () {
        if(!self.find('#BS_scroll').length > 0) {
            container.style.position = "relative";
            container.style.overflow = "hidden";
            self.append(['<div style="display:none;top:0;position: absolute;right: 1px;width: 11px;cursor: pointer;" id="BS_scroll"  >', '<em style="height:0;background-image: url('+imgUrl+'/webim_scroll_bg.png);background-position: -9px 0;background-repeat: repeat-y;width: 11px;min-height: 5px;border-radius: 4px;display:inline-block;" id="BS_scroll_main"></em>', '</div>'].join(""));
        }
        _root = self.find('#BS_scroll')[0];           
        _root.style.zIndex = 1e3;
        _slider = self.find('#BS_scroll_main')[0];
        unBindDomEvent (container); 
        bindDomEvent(container);
        set();
    };

    function set() {
        containerClientHeight = container.clientHeight;
        ie6 && containerClientHeight == 0 && (containerClientHeight = container.offsetHeight);
        containerScrollHeight = self.find('ul').height();
        scrollAble = containerClientHeight < containerScrollHeight;
        if ( !! scrollAble) {
            var b = containerClientHeight / containerScrollHeight,
                c = parseInt(containerClientHeight * b > d ? containerClientHeight * b : d);
            _slider.style.height = c - 7 + "px";
            sliderDis = containerClientHeight - c;
            scrollDis = containerScrollHeight - containerClientHeight;
            var e = container.scrollTop / scrollDis;
            e > 1 && (e = 1);
            e < 0 && (e = 0);
            setPos(e);
        }
    }

    function hide () {
        _root.style.display = "none"
    };
    function show () {
        _root.style.display = ""
    };
    function start (b) {
        if (!draging) {
            draging = !0;
            b = b || widow.event;
            startY = b.clientY;
            preventDefault(b)
        }
    };
    function move (b) {
        if ( !! draging) {
            b = b || window.event;
            var c = b.clientY;
            currentPercent = (c - startY) / sliderDis + startPercent;
            currentPercent > 1 && (currentPercent = 1);
            currentPercent < 0 && (currentPercent = 0);
            setPos(currentPercent);
            preventDefault(b)
        }
    };
    function end (a) {
        if ( !! draging) {
            draging = !1;
            startPercent = currentPercent
        }
    };
    function over (a) {
        var a = a || window.event,
            c = a.srcElement || a.target;
        hideTimer && clearTimeout(hideTimer);
        !scrollAble || (hideTimer = setTimeout(function() {
            show()
        }, 500))
    };

    function out (a) {
        hideTimer && clearTimeout(hideTimer);
        hideTimer = setTimeout(function() {
            hide()
        }, 500)
    }
    function scrollFun (b) {
        if ( !! scrollAble) {
            var d = isFirefox ? b.detail : - b.wheelDelta / 40;
            startPercent = (container.scrollTop + d * 16) / scrollDis;
            if (startPercent > 1) {
                startPercent = 1;
                set();
            }
            startPercent < 0 && (startPercent = 0);
            setPos(startPercent);
            preventDefault(b)
        }
    }
    function setPos (a) {
        container.scrollTop = a * scrollDis;
        _root.style.top = a * sliderDis + container.scrollTop + "px";
        currentPercent = a
    }
    function scrollPercent (a, b) {
        scrollToByPercent(currentPercent + a, b)
    }
    function scrollToByPercent (a, b) {
        setPos(a)
    }

    function bindDomEvent () {
        addEvent(container, isFirefox ? "DOMMouseScroll" : "mousewheel", scrollFun);
        addEvent(_slider, "click", start);
        addEvent(document, "mousemove", move);
        addEvent(document, "mouseup", end);
        addEvent(container, "mouseover", over);
        addEvent(container, "mouseout", out)
    }

    function unBindDomEvent () {
        removeEvent(container, isFirefox ? "DOMMouseScroll" : "mousewheel", scrollFun);
        removeEvent(_slider, "click", start);
        removeEvent(document, "mousemove", move);
        removeEvent(document, "mouseup", end);
        removeEvent(container, "mouseover", over);
        removeEvent(container, "mouseout", out)
    }

    function addEvent(A, B, z) {
        if (window.addEventListener) {
                return A.addEventListener(B, z, false)
            } else {
                if (window.attachEvent) {
                    return  A.attachEvent("on" + B, z)
                } else {
                    return {}
                }
            }
    }

    function removeEvent(A, B, z) {
        if (window.addEventListener) {
                return A.removeEventListener(B, z, false)
            } else {
                if (window.detachEvent) {
                    return  A.detachEvent("on" + B, z)
                } else {
                    return {}
                }
            }
    }

    function preventDefault(z) {
        if (z.preventDefault) {
            z.preventDefault()
        } else {
            z.returnValue = false
        }
    }
};
    
$.fn.extend({
    scrollable: scrollable
});
}(jQuery));