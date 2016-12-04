<?php defined('BASEPATH') OR exit('No direct script access allowed');
class lophoc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Quản Lý Lớp Học';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		if($this->uri->segment(2)=='index' || $this->uri->segment(2)=='') $data['xuat_file_excel']=1;
		$this->load->view('lophoc/menu',$data);

		$this->load->model('lophoc_model');
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
				if($this->lophoc_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}

		/*************phan trang*************************/
		$config['base_url'] = base_url().'lophoc/index';
		$config['total_rows'] = $this->lophoc_model->countall();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['lophocs']=$this->lophoc_model->get_list($total,$start);


		$this->load->view('lophoc/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['LH_TEN']))
		{
			if($this->lophoc_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		/*load model giao vien, khoa hoc*/
		$this->load->model('giaovien_model');
		$this->load->model('khoahoc_model');
		/*************************************/
		$data['giaoviens']=$this->giaovien_model->get_list();
		$data['khoahocs']=$this->khoahoc_model->get_list();
		$this->load->view('lophoc/form_insert',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function sua($lh_ma = '')
	{
		if(isset($_POST['LH_TEN']))
		{
			if($this->lophoc_model->update($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		if($lh_ma == '') exit('No direct script access allowed');
		/*load model giao vien, khoa hoc*/
		$this->load->model('giaovien_model');
		$this->load->model('khoahoc_model');
		/**************************************/
		$data['giaoviens']=$this->giaovien_model->get_list();
		$data['khoahocs']=$this->khoahoc_model->get_list();
		$data['lophoc']=$this->lophoc_model->get_lophoc($lh_ma)[0];
		$this->load->view('lophoc/form_update',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function danhsach($lh_ma)
	{
		$data['lophocs']=$this->lophoc_model->get_hocvien($lh_ma);
		$this->load->view('lophoc/danh_sach_hoc_vien',$data);
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function timkiem()
	{
		if(isset($_POST['search']))
		{
			$data=array();
			$data['lophocs']=$this->lophoc_model->search($_POST['search']);
			if(count($data['lophocs'])>0)
				$this->load->view('lophoc/search',$data);
			else $this->load->view('alert/not_found');
		}
		else $this->load->view('alert/not_found');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function report($id)
	{
		$this->load->library('PHPReport');
		if($id==0)
		{
			$data=$this->lophoc_model->get_list();
			$template='danh_sach_lop_hoc.xls';
		}
		else
		{
			$data=$this->lophoc_model->get_hocvien($id);
			$template='danh_sach_hoc_vien_theo_lop.xls';
		}
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'lh',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
}