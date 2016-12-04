<?php defined('BASEPATH') OR exit('No direct script access allowed');
class khoahoc_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('KH_MA');
		$this->db->order_by('KH_MA','DESC');
		$temp=$this->db->get('KHOAHOC');
		$temp=$temp->result_array();
		$data['KH_MA']=(count($temp)>0?$temp[0]['KH_MA']+1:1);
		if($this->db->insert('KHOAHOC',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('KH_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$data=$this->db->get('KHOAHOC');
		return $data->result_array();
	}
	function delete($kh_ma)
	{
		$this->db->where('KH_MA',$kh_ma);
		if($this->db->delete('KHOAHOC')) return 1;
		return 0;
	}
	function get_khoahoc($kh_ma)
	{
		$this->db->select('*');
		$this->db->where('KH_MA',$kh_ma);
		$result=$this->db->get('KHOAHOC');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('KH_MA',$data['KH_MA']);
		unset($data['KH_MA']);
		if($this->db->update('KHOAHOC',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('KHOAHOC');
	}
}