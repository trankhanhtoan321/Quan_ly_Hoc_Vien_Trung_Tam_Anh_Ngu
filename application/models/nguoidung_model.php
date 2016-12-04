<?php defined('BASEPATH') OR exit('No direct script access allowed');
class nguoidung_model extends CI_Model
{
	function dangnhap($ten,$matkhau)
	{
		$this->db->select("TENDANGNHAP, MATKHAU, LOAI");
		$this->db->where('TENDANGNHAP',$ten);
		$this->db->where('MATKHAU',md5($matkhau));
		$result = $this->db->get("NGUOIDUNG");
		$result = $result->result_array();
		if(count($result)==1)
		{
			$data=array();
			$data['nguoidung']=$result[0];
			$this->session->set_userdata($data);
			return 1;
		}
		return 0;
	}
	function logout()
	{
		$this->session->unset_userdata('nguoidung');
	}
	function doimatkhau($ten,$matkhau)
	{
		$data=array();
		$data['MATKHAU']=md5($matkhau);
		$this->db->where('TENDANGNHAP',$ten);
		if($this->db->update('NGUOIDUNG',$data)) return 1;
		return 0;
	}
}