<?php defined('BASEPATH') OR exit('No direct script access allowed');
class giaovien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Quản Lý Giáo Viên';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		if($this->uri->segment(2)=='index' || $this->uri->segment(2)=='') $data['xuat_file_excel']=1;
		$this->load->view('giaovien/menu',$data);

		$this->load->model('giaovien_model');
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
				if($this->giaovien_model->delete($temp)) $kt++;
			}
			if($kt) $this->load->view('alert/success');
			else $this->load->view('alert/error');
		}

		/*************phan trang*************************/
		$config['base_url'] = base_url().'giaovien/index';
		$config['total_rows'] = $this->giaovien_model->countall();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['giaoviens']=$this->giaovien_model->get_list($total,$start);
		$this->load->view('giaovien/list',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['GV_TEN']))
		{
			if($this->giaovien_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		$this->load->view('giaovien/form_insert');

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function sua($gv_ma = '')
	{
		if(isset($_POST['GV_TEN']))
		{
			if($this->giaovien_model->update($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		if($gv_ma == '') exit('No direct script access allowed');
		$data['giaovien']=$this->giaovien_model->get_giaovien($gv_ma)[0];
		$this->load->view('giaovien/form_update',$data);

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function timkiem()
	{
		if(isset($_POST['search']))
		{
			$data=array();
			$data['giaoviens']=$this->giaovien_model->search($_POST['search']);
			if(count($data['giaoviens'])>0)
				$this->load->view('giaovien/search',$data);
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
		$template='danh_sach_giao_vien.xls';
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);

		if($id==0) $data=$this->giaovien_model->get_list();
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'gv',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
}