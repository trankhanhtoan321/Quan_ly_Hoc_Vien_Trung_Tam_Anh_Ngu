<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hocvien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Quản Lý Học Viên';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		if($this->uri->segment(2)=='index' || $this->uri->segment(2)=='') $data['xuat_file_excel']=1;
		$this->load->view('hocvien/menu',$data);

		$this->load->model('hocvien_model');
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
				if($this->hocvien_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}

		/*************phan trang*************************/
		$config['base_url'] = base_url().'hocvien/index';
		$config['total_rows'] = $this->hocvien_model->countall();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['hocviens']=$this->hocvien_model->get_list($total,$start);
		$this->load->view('hocvien/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function tiemnang()
	{
		$data=array();
		$this->load->library('pagination');
		if(isset($_POST['xoanhieuluachon']))
		{
			$kt=0;
			foreach($_POST['xoanhieuluachon'] as $temp)
			{
				if($this->hocvien_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		$data['hocviens']=$this->hocvien_model->get_list_tiem_nang();
		/*************phan trang*************************/
		$config['base_url'] = base_url().'hocvien/tiemnang';
		$config['total_rows'] = count($data['hocviens']);
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['hocviens']=$this->hocvien_model->get_list_tiem_nang($total,$start);
		$this->load->view('hocvien/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['HV_TEN']))
		{
			if($this->hocvien_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		$this->load->view('hocvien/form_insert');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function sua($hv_ma = '')
	{
		if(isset($_POST['HV_TEN']))
		{
			if($this->hocvien_model->update($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		if($hv_ma == '') exit('No direct script access allowed');
		$data['hocvien']=$this->hocvien_model->get_hocvien($hv_ma)[0];
		$this->load->view('hocvien/form_update',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function timkiem()
	{
		if(isset($_POST['search']))
		{
			$data=array();
			$data['hocviens']=$this->hocvien_model->search($_POST['search']);
			if(count($data['hocviens'])>0)
				$this->load->view('hocvien/search',$data);
			else $this->load->view('alert/not_found');
		}
		else $this->load->view('alert/not_found');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function report_tiemnang()
	{
		$this->load->library('PHPReport');
		$template='danh_sach_hoc_vien.xls';
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);

		if($id==0) $data=$this->hocvien_model->get_list();
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'hv',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
	function report($id)
	{
		$this->load->library('PHPReport');
		$template='danh_sach_hoc_vien.xls';
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);

		if($id==0) $data=$this->hocvien_model->get_list();
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'hv',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
}