<?php defined('BASEPATH') OR exit('No direct script access allowed');
class giaovien_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('GV_MA');
		$this->db->order_by('GV_MA','DESC');
		$temp=$this->db->get('GIAOVIEN');
		$temp=$temp->result_array();
		$data['GV_MA']=(count($temp)>0?$temp[0]['GV_MA']+1:1);
		if($this->db->insert('GIAOVIEN',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('GV_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$data=$this->db->get('GIAOVIEN');
		return $data->result_array();
	}
	function delete($gv_ma)
	{
		$this->db->where('GV_MA',$gv_ma);
		if($this->db->delete('GIAOVIEN')) return 1;
		return 0;
	}
	function get_giaovien($gv_ma)
	{
		$this->db->select('*');
		$this->db->where('GV_MA',$gv_ma);
		$result=$this->db->get('GIAOVIEN');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('GV_MA',$data['GV_MA']);
		unset($data['GV_MA']);
		if($this->db->update('GIAOVIEN',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('GIAOVIEN');
	}
	function search($gv_ten)
	{
		$this->db->select('*');
		$this->db->from('GIAOVIEN');
		$this->db->like('GV_TEN',$gv_ten);
		$result=$this->db->get();
		return $result->result_array();
	}
}