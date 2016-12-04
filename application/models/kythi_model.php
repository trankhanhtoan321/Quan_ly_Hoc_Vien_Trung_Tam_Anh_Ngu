<?php defined('BASEPATH') OR exit('No direct script access allowed');
class kythi_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('KT_MA');
		$this->db->order_by('KT_MA','DESC');
		$temp=$this->db->get('KYTHI');
		$temp=$temp->result_array();
		$data['KT_MA']=(count($temp)>0?$temp[0]['KT_MA']+1:1);
		if($this->db->insert('KYTHI',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('KT_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$data=$this->db->get('KYTHI');
		return $data->result_array();
	}
	function delete($kt_ma)
	{
		$this->db->where('KT_MA',$kt_ma);
		if($this->db->delete('KYTHI')) return 1;
		return 0;
	}
	function get_kythi($kt_ma)
	{
		$this->db->select('*');
		$this->db->where('KT_MA',$kt_ma);
		$result=$this->db->get('KYTHI');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('KT_MA',$data['KT_MA']);
		unset($data['KT_MA']);
		if($this->db->update('KYTHI',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('KYTHI');
	}
}