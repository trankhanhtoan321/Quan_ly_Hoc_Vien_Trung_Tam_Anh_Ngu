<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hocphi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Đóng Học Phí';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);
		$this->load->view('hocphi/menu');

		$this->load->model('hocphi_model');
	}
	function index()
	{
		$data=array();
		if($temp=$this->session->flashdata('HP_OK'))
		{
			if($temp==1)
			{
				$temp2=array();
				$temp2['hocvien']=$this->session->flashdata('HP_HV');
				$this->load->view('hocphi/alert_success',$temp2);
			}
			else if($temp==2) $this->load->view('alert/error');
		}

		$data['hocphis']=$this->hocphi_model->get_list();
		/*************phan trang*************************/
		$this->load->library('pagination');
		$config['base_url'] = base_url().'hocphi/index';
		$config['total_rows'] = count($data['hocphis']);
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['hocphis']=$this->hocphi_model->get_list_2($start,$total);
		
		$this->load->view('hocphi/list',$data);
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function themmoi()
	{
		$data=array();
		if(isset($_POST['HT_MA']))
		{
			if(empty($_POST['HP_NGAYDONG'])) $_POST['HP_NGAYDONG']=date("Y-m-d",time());
			if($this->hocphi_model->insert($_POST))
				$this->load->view('alert/success');
			else $this->load->view('alert/error');
		}
		/*load model hoc vien va model lop hoc*/
		$this->load->model('hocvien_model');
		$this->load->model('lophoc_model');
		$this->load->model('hoctap_model');
		/****************************************/
		/*
		session['HP_HV']=các thông tin liên quan đối tượng học viên đã nhập
		+ tất cả thông tin liên quan đến học viên trng bảng HOCVIEN
		+ tất cả thông tin liên quan đến lớp học của học viên đó
		+ lấy được mã đăng ký

		***************xử lý***********************
		+ bảng 1: nhập thông tin hoc viên, lấy vào mã học viên
		+ bảng 2: từ mã học viên, lấy ra các thông tin của học viên đó, 
			kết hợp bảng HOCTAP lấy ra những lớp học mà học viến đăng ký
			, các thông tin về khóa học của lớp học đó, kết hợp với bảng HOCPHI, 
			tính toán số tiền đã đóng, còn nợ, tổng số tiền phải đóng, 
			số tiền học phí đó của lớp học nào
		*/
		$temp=array();
		if(isset($_POST['HV_MA']))
		{
			if($temp['HP_HV']=$this->hocphi_model->insert_hv($_POST['HV_MA']))
			{
				$this->session->set_userdata($temp);
			}
		}
		if(isset($_POST['HP_TIENDONG']) && $this->session->has_userdata('HP_HV'))
		{
			$temp=NULL;
			$temp2=array();
			$data=array();
			$temp=$this->session->userdata('HP_HV');
			$data['HT_MA']=$temp['HT_MA'];
			$data['HP_TIENDONG']=$_POST['HP_TIENDONG'];
			$data['HP_NGAYDONG']=date("Y-m-d",time());
			if($this->hocphi_model->insert($data))
			{
				$temp2['HP_HV']=$this->hocphi_model->insert_hv($temp['HV_MA']);
				$temp2['HP_OK']=1;
				$this->session->set_userdata($temp2);
			}
			else $temp2['HP_OK']=2;
			$this->session->unset_userdata('HP_HV');
			$this->session->set_flashdata($temp2);
			redirect(base_url().'hocphi');
		}
		/**************hiển thị các bảng nhập nội dung theo đúng thứ tự nhập***************/
		if(!$this->session->has_userdata('HP_HV'))
		{
			$data['hocviens']=$this->hocphi_model->get_list();
			$this->load->view('hocphi/form_insert_hocvien',$data);
		}
		else
		{
			$data['hocvien']=$this->session->userdata('HP_HV');
			$this->load->view('hocphi/form_insert_tiendong',$data);
		}

		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function thoat()
	{
		if($this->session->has_userdata('HP_HV'))
		{
			$this->session->unset_userdata('HP_HV');
			redirect(base_url().'hocphi');
		}
		else redirect(base_url().'hocphi');
	}
	function danh_sach_no()
	{
		$data['hocphis']=$this->hocphi_model->get_danh_sach_no();
		/*************phan trang*************************/
		$this->load->library('pagination');
		$config['base_url'] = base_url().'hocphi/index';
		$config['total_rows'] = count($data['hocphis']);
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		/***************************************************************/
		$start=$this->uri->segment(3);
		$total=$config['per_page'];
		$data['hocphis']=$this->hocphi_model->get_danh_sach_no_2($start,$total);
		
		$this->load->view('hocphi/list_no',$data);
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function timkiem()
	{
		if(isset($_POST['search']))
		{
			$data=array();
			$data['hocphis']=$this->hocphi_model->search($_POST['search']);
			if(count($data['hocphis'])>0)
				$this->load->view('hocphi/search',$data);
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
			$data=$this->hocphi_model->get_list();
			$template='danh_sach_hoc_phi.xls';
		}
		else if($id==1)
		{
			$data=$this->hocphi_model->get_danh_sach_no();
			$template='danh_sach_no_hoc_phi.xls';
		}
		$templateDir='public/report/';
		$config=array(
				'template'=>$template,
				'templateDir'=>$templateDir
			);
		$R=new PHPReport($config);
		$R->load(array(
						'id'=>'hp',
						'repeat'=>true,
						'data'=>$data,
					)
		        );
		echo $R->render('excel');
		exit();
	}
}