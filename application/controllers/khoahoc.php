<?php defined('BASEPATH') OR exit('No direct script access allowed');
class khoahoc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Quản Lý Khóa Học';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		if($this->uri->segment(2)=='index' || $this->uri->segment(2)=='') $data['xuat_file_excel']=1;
		$this->load->view('khoahoc/menu',$data);

		$this->load->model('khoahoc_model');
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
				if($this->khoahoc_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}

		/*************phan trang*************************/
		$config['base_url'] = base_url().'khoahoc/index';
		$config['total_rows'] = $this->khoahoc_model->countall();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['khoahocs']=$this->khoahoc_model->get_list($total,$start);
		$this->load->view('khoahoc/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['KH_TEN']))
		{
			if($this->khoahoc_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		$this->load->view('khoahoc/form_insert');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function sua($kh_ma = '')
	{
		if(isset($_POST['KH_TEN']))
		{
			if($this->khoahoc_model->update($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		if($kh_ma == '') exit('No direct script access allowed');
		$data['khoahoc']=$this->khoahoc_model->get_khoahoc($kh_ma)[0];
		$this->load->view('khoahoc/form_update',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function report($id)
	{
		$this->load->library('PHPReport');
		$template='danh_sach_khoa_hoc.xls';
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);

		if($id==0) $data=$this->khoahoc_model->get_list();
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'kh',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
}