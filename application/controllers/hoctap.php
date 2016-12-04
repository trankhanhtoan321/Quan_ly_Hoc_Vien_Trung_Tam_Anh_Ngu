<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hoctap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Đăng Ký Học';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		if($this->uri->segment(2)=='index' || $this->uri->segment(2)=='') $data['xuat_file_excel']=1;
		$this->load->view('hoctap/menu',$data);

		$this->load->model('hoctap_model');
	}
	function index()
	{
		$data=array();
		$this->load->library('pagination');
		if(isset($_POST['xoanhieuluachon']))
		{
			$kt=0;
			foreach($_POST['xoanhieuluachon'] as $temp)
			{
				if($this->hoctap_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}

		/*************phan trang*************************/
		$config['base_url'] = base_url().'hoctap/index';
		$config['total_rows'] = $this->hoctap_model->countall();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['hoctaps']=$this->hoctap_model->get_list($total,$start);
		$this->load->view('hoctap/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['HV_MA']) && isset($_POST['LH_MA']))
		{
			if(empty($_POST['HT_NGAYBATDAU'])) $_POST['HT_NGAYBATDAU']=date("Y-m-d",time());
			if($this->hoctap_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		/*load model hoc vien va model lop hoc*/
		$this->load->model('hocvien_model');
		$this->load->model('lophoc_model');
		/****************************************/
		$data['hocviens']=$this->hocvien_model->get_list();
		$data['lophocs']=$this->lophoc_model->get_list();
		$this->load->view('hoctap/form_insert',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function sua($ht_ma = '')
	{
		if(isset($_POST['HT_TEN']))
		{
			if($this->hoctap_model->update($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		if($ht_ma == '') exit('No direct script access allowed');
		/*load model hoc vien va model lop hoc*/
		$this->load->model('hocvien_model');
		$this->load->model('lophoc_model');
		/****************************************/
		$data['hocviens']=$this->hocvien_model->get_list();
		$data['lophocs']=$this->lophoc_model->get_list();
		$data['hoctap']=$this->hoctap_model->get_hoctap($ht_ma)[0];
		$this->load->view('hoctap/form_update',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function timkiem()
	{
		if(isset($_POST['search']))
		{
			$data=array();
			$data['hoctaps']=$this->hoctap_model->search($_POST['search']);
			if(count($data['hoctaps'])>0)
				$this->load->view('hoctap/search',$data);
			else $this->load->view('alert/not_found');
		}
		else $this->load->view('alert/not_found');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
}