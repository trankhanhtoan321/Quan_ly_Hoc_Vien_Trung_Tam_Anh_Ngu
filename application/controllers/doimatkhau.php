<?php defined('BASEPATH') OR exit('No direct script access allowed');
class doimatkhau extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Đổi Mật Khẩu';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		$this->load->model('nguoidung_model');
	}
	function index()
	{
		if(isset($_POST['MATKHAU']) && isset($_POST['MATKHAUMOI']))
		{
			$user=$this->session->userdata('nguoidung');
			if($this->nguoidung_model->dangnhap($user['TENDANGNHAP'],$_POST['MATKHAU']))
			{
				if($this->nguoidung_model->doimatkhau($user['TENDANGNHAP'],$_POST['MATKHAUMOI']))
					$this->load->view('alert/success');
				else $this->load->view('alert/error');
			}
		}
		$this->load->view('doimatkhau');
		
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
}