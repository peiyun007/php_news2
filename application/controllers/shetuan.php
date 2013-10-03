<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shetuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->model('Mshetuan');
	}

	/* 首页  */


	function index()
	{
		$list_shetuan = $this->Mshetuan->get_hotest_st_need();
		$this->output->set_content_type('application/json')->set_output(json_encode($list_shetuan));
	}

	function list_shetuan()
	{
		$list_shetuan = $this->Mshetuan->get_hotest_st_need();
		$this->output->set_content_type('application/json')->set_output(json_encode($list_shetuan));
	}
	
	
	/*
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

	*/
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>
