<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->library('pagination');

		$this->load->model('Mhome');
	}

	/* 首页  */
	function index()
	{
		$data['category'] = $this->Mhome->get_category();
		$data['page_title'] = 'CI开发新闻发布系统';

		$this->load->view('header', $data);

		$data['get_article_new'] = $this->Mhome->get_article_new();
		$data['get_article_recommend'] = $this->Mhome->get_article_recommend();

		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	/* 各分类页面  */
	function category()
	{
		$data['category'] = $this->Mhome->get_category();
		$data['category_name'] = $this->Mhome->get_category_name($this->uri->segment(3));
		$data['page_title'] = 'CI开发新闻发布系统';

		$this->load->view('header', $data);

		$config['base_url'] = site_url('home/category/' . $this->uri->segment(3));
		$config['total_rows'] = $this->Mhome->select_num_rows($this->uri->segment(3));
		$config['per_page'] = 3;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '第一页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$this->pagination->initialize($config);
		$data['article_list'] = $this->Mhome->get_page($this->uri->segment(3), $this->uri->segment(4, 0), $config['per_page']);

		$this->load->view('category', $data);
		$this->load->view('footer');
	}

	/* 详细内容  */
	function content()
	{
		$data['category'] = $this->Mhome->get_category();
		$data['get_comments'] = $this->Mhome->get_comment($this->uri->segment(3));
		$data['page_title'] = 'CI开发新闻发布系统';
		$data['get_article_content'] = $this->Mhome->get_article_content($this->uri->segment(3));

		$this->load->view('header', $data);
		$this->load->view('content', $data);
		$this->load->view('footer');
	}

	/* 添加评论  */
	function comment_ok()
	{
		if ($this->input->post('submit'))
		{
			$query = $this->Mhome->insert_comment();

			if ($query)
			{
				redirect('home/content/' . $this->input->post('article_id'));
			}
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>
