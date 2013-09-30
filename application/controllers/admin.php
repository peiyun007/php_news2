<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  * 后台管理平台
  * SaiXS
  *
  */
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('news');

		$this->load->library('form_validation');
	}

	/* 后台首页  */
	function index()
	{
		check();

		$this->load->view('admin/index');
	}

	/* 后台顶部文件  */
	function top()
	{
		$this->load->view('admin/top');
	}

	/* 后台中间文件  */
	function center()
	{
		$this->load->view('admin/center');
	}

	/* 后台中间 左边文件 */
	function left()
	{
		$this->load->model('Mhome');

		$data['get_category'] = $this->Mhome->get_category();

		$this->load->view('admin/left', $data);
	}

	/* 后台中间右边文件 */
	function right()
	{
		$this->load->view('admin/right');
	}

	/* 后台底部文件 */
	function bottom()
	{
		$this->load->view('admin/bottom');
	}

	/* 文章列表页 */
	function article_list()
	{
		$this->load->library('pagination');

		$this->load->model('Madmin');

		$config['base_url'] = site_url('admin/article_list/');
		$config['total_rows'] = $this->Madmin->select_article_num_rows();
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '第一页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';

		$this->pagination->initialize($config);

		$data['get_article_list'] = $this->Madmin->get_article_page($this->uri->segment(3, 0), $config['per_page']);

		$this->load->view('admin/article_list', $data);
	}

	/* 文章添加  */
	function add_article()
	{
		$this->load->model('Mhome');

		$data['get_category'] = $this->Mhome->get_category_show();

		$this->load->view('admin/add_article', $data);
	}

	/* 文章添加后台  */
	function add_article_ok()
	{
		if ($this->input->post('submit_article'))
		{
			$this->load->model('Madmin');
			$query = $this->Madmin->insert_article();

			if ($query)
			{
				showmessage('添加文章成功', 'admin/article_list/');
			}
			else
			{
				showmessage('操作失败，系统繁忙或着填写错误', 'admin/article_list/');
			}
		}
	}

	/* 文章修改  */
	function edit_article()
	{
		$this->load->model('Mhome');

		$data['get_article_content'] = $this->Mhome->get_article_content($this->uri->segment(3));
		$data['get_category'] = $this->Mhome->get_category_show();

		$this->load->view('admin/edit_article', $data);
	}

	/* 文章修改后台  */
	function edit_article_ok()
	{
			$this->load->model('Madmin');
			$query = $this->Madmin->edit_article();

			if ($query)
			{
				showmessage('修改文章成功', 'admin/article_list/');
			}
			else
			{
				showmessage('操作失败，系统繁忙或着填写错误', 'admin/article_list/');
			}
	}

	/* 删除ID文章  */
	function del_article($id)
	{
		$table = "article";
		$where['id'] = $id;
		$res = $this->db->delete($table, $where);

		if ($res)
		{
			showmessage('删除文章成功', 'admin/article_list/');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/article_list/');
		}
	}

	/* 删除选择的文章  */
	function del_article_all()
	{
		$id = $this->input->post('id');

		if ($id=="")
		{
			showmessage('请选择要删除数据', 'admin/article_list');
		}

		$table="article";
		$this->db->where_in('id', $id);
		$res=$this->db->delete('article');

		if ($res)
		{
			showmessage('删除成功', 'admin/article_list');
		}
		else
		{
			showmessage('删除失败', 'admin/article_list');
		}
	}

	/* 添加分类  */
	function add_category()
	{
		$this->load->model('Mhome');
		$id = $this->input->post('id');
		$class_name = $this->input->post('class_name');

		$lastflag = $this->input->post('lastflag');

		if ($id)
		{
			$class = $this->Mhome->get_category_name($id);

			foreach ($class as $row)
			{
				$classname1 = $row->category_name;
				$tier = $row->tier;
				$idlist = $row->idlist;
			}

			$classname = $classname1.$class_name . '|';
			$tier = $tier + 1;
			$upid = $id;
		}
		else
		{
			$classname = $class_name . '|';
			$tier = 1;
			$upid = 0;
			$idlist = ',';
		}

		$table = 'category';

		if ($classname=='|')
		{
			showmessage('添加失败，分类名不能为空', 'admin/category_list/' . $upid);
		}

		$query = $this->db->from($table)->where('category_name', $classname)->get();

		if ($query->row())
		{
			showmessage('添加失败，已经存在该分类', 'admin/category_list/' . $upid);
		}

		$arr['category_name'] = $classname;
		$arr['tier'] = $tier;
		$arr['upid'] = $upid;
		$arr['lastflag'] = $lastflag;
		$this->db->insert($table, $arr);
		$tid = $this->db->insert_id();
		$arr1['idlist'] = $idlist . $tid . ',';
		$where['id'] = $tid;
		$res = $this->db->update($table, $arr1, $where);

		if ($res)
		{
			showmessage('添加分类成功', 'admin/category_list/' . $upid);
		}
		else
		{
			showmessage('添加失败', 'admin/category_list/' . $upid);
		}
	}

	/* 修改分类  */
	function edit_category()
	{
		$this->load->model('Mhome');

		$data['get_category_name'] = $this->Mhome->get_category_name($this->uri->segment(3));

		$this->load->view('admin/edit_category', $data);
	}

	/* 修改分类后台  */
	function edit_category_ok()
	{
		$class_name = $this->input->post('category_name');
		$id = $this->input->post('category_id');
		$upid = $this->input->post('upid');
		$lastflag = $this->input->post('lastflag');

		if ($upid)
		{
			$class = $this->Mhome->get_category_name($upid);

			foreach ($class as $row)
			{
				$classname1 = $row->category_name;
			}

			$classname = $classname1 . $class_name . '|';
		}
		else
		{
			$classname = $class_name . '|';
		}

		$table = 'category';

		$query = $this->db->query("SELECT * FROM category WHERE category_name='$classname' AND id<>$id");

		if ($query->num_rows() > 0)
		{
			showmessage('修改失败，已经存在同名分类', 'admin/edit_category/' . $id);
		}

		$arr['category_name'] = $classname;
		$arr['lastflag'] = $lastflag;
		$where['id'] = $id;
		$res = $this->db->update($table, $arr, $where);

		if ($res)
		{
			showmessage('修改分类信息成功', 'admin/category_list');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/category_list');
		}
	}

	/* 删除分类  */
	function del_category()
	{
		$id = ',' . $this->uri->segment(3) . ',';
		$table = 'category';
		$this->db->like('idlist', $id);
		$res = $this->db->delete($table);

		if ($res)
		{
			showmessage('删除分类成功', 'admin/category_list/');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/category_list/');
		}
	}

	/* 分类列表  */
	function category_list()
	{
		$this->load->model('Mhome');
		$id = $this->uri->segment(3);

		if ($id=='')
		{
			$id = 0;
			$data['get_category_name'] = '';
		}
		else
		{
			$data['get_category_name'] = $this->Mhome->get_category_name($id);
		}

		$data['id'] = $this->uri->segment(3);
		$data['get_category'] = $this->Mhome->get_category_upid($id);
		$this->load->view('admin/category_list', $data);
	}

	/* 评论列表  */
	function comments_list()
	{
		$this->load->library('pagination');
		$this->load->model('Madmin');

		$config['base_url'] = base_url() . 'index.php/admin/commends_list/';
		$config['total_rows'] = $this->Madmin->select_comments_num_rows();
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '第一页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';

		$this->pagination->initialize($config);

		$data['get_comments_list'] = $this->Madmin->get_comments_page($this->uri->segment(3, 0), $config['per_page']);

		$this->load->view('admin/comments_list', $data);
	}

	/* 删除评论  */
	function del_comments()
	{
		$where['id'] = $this->uri->segment(3);
		$table = 'comments';
		$res = $this->db->delete($table, $where);

		if($res)
		{
			showmessage('删除评论成功', 'admin/comments_list');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/comments_list');
		}
	}

	/* 用户列表  */
	function user_list()
	{
		$this->load->model('Madmin');

		$data['get_user'] = $this->Madmin->get_user();

		$this->load->view('admin/user_list', $data);
	}

	/* 添加用户  */
	function add_user()
	{
		$this->load->view('admin/add_user');
	}

	/* 添加用户后台  */
	function add_user_ok()
	{
		$this->form_validation->set_rules('username', '用户名', 'required|unique[admin.name]');
		$this->form_validation->set_rules('password', '密码', 'required|min_length[6]|is_alpha');
		$this->form_validation->set_message('min_length', '%s长度必须超过6位.');
		$this->form_validation->set_message('required', '%s不能为空.');
		$this->form_validation->set_error_delimiters('<span>', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/add_user');
		}
		else
		{
			$arr['name'] = $this->input->post('username');
			$arr['password'] = md5($this->input->post('password'));
			$table = 'admin';
			$res = $this->db->insert($table, $arr);

			if ($res)
			{
				showmessage('添加用户成功', 'admin/user_list');
			}
			else
			{
				showmessage('操作失败，系统繁忙或着填写错误', 'admin/user_list');
			}
		}
	}

	/* 修改用户  */
	function edit_user()
	{
		$this->load->model('Madmin');

		$data['get_user_name'] = $this->Madmin->get_user_name($this->uri->segment(3));

		$this->load->view('admin/edit_user', $data);
	}

	/* 修改用户后台  */
	function edit_user_ok()
	{
		$arr['name'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		$where['id'] = $this->input->post('id');
		$table = 'admin';
		$res = $this->db->update($table, $arr, $where);

		if ($res)
		{
			showmessage('修改用户信息成功', 'admin/user_list');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/user_list');
		}
	}

	/* 删除 用户  */
	function del_user()
	{
		$where['id'] = $this->uri->segment(3);
		$table = 'admin';
		$res = $this->db->delete($table, $where);

		if ($res)
		{
			showmessage('删除用户成功', 'admin/user_list');
		}
		else
		{
			showmessage('操作失败，系统繁忙或着填写错误', 'admin/user_list');
		}
	}

	/* 修改密码  */
	function pwd()
	{
		$this->load->view('admin/pwd');
	}

	/* 修改密码后台  */
	function pwd_ok()
	{
		$this->form_validation->set_rules('password', '密码', 'required|min_length[6]|is_alpha');
		$this->form_validation->set_message('min_length', '%s长度必须超过6位.');
		$this->form_validation->set_message('required', '%s不能为空.');
		$this->form_validation->set_error_delimiters('<span>', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/pwd');
		}
		else
		{
			$arr['password'] = md5($this->input->post('password'));
			$where['name'] = $this->session->userdata('manager');
			$table = 'admin';
			$res = $this->db->update($table, $arr, $where);

			if ($res)
			{
				showmessage('修改密码成功', 'admin/pwd');
			}
			else
			{
				showmessage('修改失败，系统繁忙或着填写错误', 'admin/pwd');
			}
		}
	}

	/* 登陆验证页面  */
	function check_login()
	{
		$this->load->model('Madmin');

		$query = $this->Madmin->login_ok();

		if ($query)
		{
			$this->session->set_userdata('manager', $this->input->post('user'));
			showmessage('登陆成功', 'admin/index');
		}
		else
		{
			showmessage('登陆失败，系统繁忙或着填写错误', 'home/index');
		}
	}

	/* 退出系统  */
	function exit_system()
	{
		$array_items = array('manager' => '');

		$this->session->unset_userdata($array_items);

		redirect('home/index');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
