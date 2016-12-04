<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hocvien_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('HV_MA');
		$this->db->order_by('HV_MA','DESC');
		$temp=$this->db->get('HOCVIEN');
		$temp=$temp->result_array();
		$data['HV_MA']=(count($temp)>0?$temp[0]['HV_MA']+1:1);
		if($this->db->insert('HOCVIEN',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('HV_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$data=$this->db->get('HOCVIEN');
		return $data->result_array();
	}
	function get_list_tiem_nang($total=0,$start=0)
	{
		$this->db->distinct('HV_MA');
		$temp=$this->db->get('HOCTAP');
		$temp=$temp->result_array();
		$temp2=array();
		foreach($temp as $t) $temp2[]=$t['HV_MA'];
		//////////////////////////////////////////////
		$this->db->select('*');
		$this->db->order_by('HV_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$this->db->where_not_in('HV_MA',$temp2);
		$data=$this->db->get('HOCVIEN');
		return $data->result_array();
	}
	function delete($hv_ma)
	{
		$this->db->where('HV_MA',$hv_ma);
		if($this->db->delete('HOCVIEN')) return 1;
		return 0;
	}
	function get_hocvien($hv_ma)
	{
		$this->db->select('*');
		$this->db->where('HV_MA',$hv_ma);
		$result=$this->db->get('HOCVIEN');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('HV_MA',$data['HV_MA']);
		unset($data['HV_MA']);
		if($this->db->update('HOCVIEN',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('HOCVIEN');
	}
	function search($hv_ten)
	{
		$this->db->select('*');
		$this->db->from('HOCVIEN');
		$this->db->like('HV_TEN',$hv_ten);
		$result=$this->db->get();
		return $result->result_array();
	}
}