<?php defined('BASEPATH') OR exit('No direct script access allowed');
class thongke extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('nguoidung'))) redirect(base_url().'main/login');
		$data=array();
		$data['title']='Thống Kê';
		$data['now_position']=$this->uri->segment(1);
		$this->load->view('header',$data);

		$this->load->model('hocphi_model');
	}
	function index()
	{
		$data=array();
		$xem=0;
		if(isset($_POST['TUNGAY']) && isset($_POST['DENNGAY']))
		{
			if($data['thongke']=$this->hocphi_model->thongke($_POST['TUNGAY'],$_POST['DENNGAY']))
			{
				$xem=1;
				$data['tungay']=$_POST['TUNGAY'];
				$data['denngay']=$_POST['DENNGAY'];
			}
			else
			{
				$xem=0;
				$this->load->view('alert/error');
			}
		}
		$this->load->view('thongke/form_insert');
		if($xem==1)
		{
			$this->load->view('thongke/saoke',$data);
		}
		/*************************************/
		$this->load->view('footer');
		/**************************************/
	}
	function report($a,$b)
	{
		$this->load->library('PHPReport');
		$template='thongke.xls';
		$templateDir='public/report/';
		$data=$this->hocphi_model->thongke($a,$b);
		$data2=array();
		$data2['tong']=0;
		foreach($data as $a) $data2['tong']+=$a['HP_TIENDONG'];
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