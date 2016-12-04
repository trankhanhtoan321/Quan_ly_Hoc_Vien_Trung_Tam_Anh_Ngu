<?php defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('nguoidung_model');
		$this->load->model('hocvien_model');
		$this->load->model('giaovien_model');
		$this->load->model('lophoc_model');
		$this->load->model('khoahoc_model');
	}
	public function index()
	{
		$data=array();
		/*************************khai bao*********************************/
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Quản lý học viên trung tâm anh ngữ';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);
		/**********************************************************/
		$data['num_hv']=count($this->hocvien_model->get_list());
		$data['num_gv']=count($this->giaovien_model->get_list());
		$data['num_lh']=count($this->lophoc_model->get_list());
		$data['num_kh']=count($this->khoahoc_model->get_list());
		$this->load->view('home',$data);
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function login()
	{
		if(!empty($this->session->userdata('nguoidung'))) redirect(base_url());
		$this->load->view('login');
		if(isset($_POST['TENDANGNHAP']) && isset($_POST['MATKHAU']))
		{
			if($this->nguoidung_model->dangnhap($_POST['TENDANGNHAP'],$_POST['MATKHAU']));
				redirect(base_url());
		}
	}
	function logout()
	{
		$this->nguoidung_model->logout();
		redirect(base_url().'main/login');
	}
}
