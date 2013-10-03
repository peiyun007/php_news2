<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mshetuan extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	/* 添加社团 */
	// function insert_shetuan
	// {
	// 	$st_name = $this->input->post('st_name');
	// 	$createUser_id = $this->input->post('createUser_id');
	// 	$leader_id = $this->input->post('leader_id');
	// 	$region = $this->input->post('region');
	// 	$create_Time = $this->input->post('create_Time');

	// 	$this->db->query("INSERT INTO tb_st(st_name,createUser_id,leader_id,region,create_Time)VALUES('$st_name','$createUser_id','$leader_id','$region',now())");
	// }

	/* 列出热门的10大社团需求 */
	function get_hotest_st_need()
	{
// 		$queryStr =  <<<php
// 		select tb_st.name,tb_st_activity.title,tb_user.true_name,tb_st_activity.publish_date,tb_st_activity.money
// 		from tb_st,tb_st_activity,tb_user
// 		where tb_st_activity.publisher_id=tb_user.id and tb_st_activity.st_id=tb_st.id
// 		order by tb_st_activity.click_nums
// 		limit 0,10;
// php
		$query = $this->db->query('select tb_st.name,tb_st_activity.title,tb_user.true_name,tb_st_activity.publish_date,tb_st_activity.money from tb_st,tb_st_activity,tb_user where tb_st_activity.publisher_id=tb_user.id and tb_st_activity.st_id=tb_st.id order by tb_st_activity.click_nums limit 0,10');
		// $query = $this->db->query(queryStr);
		return $query->result();
	}
}

/* End of file mhome.php */
/* Location: ./application/models/mhome.php */
?>
