<?php defined('BASEPATH') OR exit('No direct script access allowed');
class lophoc_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('LH_MA');
		$this->db->order_by('LH_MA','DESC');
		$temp=$this->db->get('LOPHOC');
		$temp=$temp->result_array();
		$data['LH_MA']=(count($temp)>0?$temp[0]['LH_MA']+1:1);
		if($this->db->insert('LOPHOC',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('LH_MA','DESC');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$this->db->from('LOPHOC');
		$this->db->join('GIAOVIEN','LOPHOC.GV_MA=GIAOVIEN.GV_MA');
		$this->db->join('KHOAHOC','LOPHOC.KH_MA=KHOAHOC.KH_MA');
		$data=$this->db->get();
		return $data->result_array();
	}
	function delete($lh_ma)
	{
		$this->db->where('LH_MA',$lh_ma);
		if($this->db->delete('LOPHOC')) return 1;
		return 0;
	}
	function get_lophoc($lh_ma)
	{
		$this->db->select('*');
		$this->db->where('LH_MA',$lh_ma);
		$result=$this->db->get('LOPHOC');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('LH_MA',$data['LH_MA']);
		unset($data['LH_MA']);
		unset($data['LH_SISO']);
		if($this->db->update('LOPHOC',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('LOPHOC');
	}
	function search($lh_ten)
	{
		$this->db->select('*');
		$this->db->from('LOPHOC');
		$this->db->like('LH_TEN',$lh_ten);
		$this->db->join('GIAOVIEN','LOPHOC.GV_MA=GIAOVIEN.GV_MA');
		$this->db->join('KHOAHOC','LOPHOC.KH_MA=KHOAHOC.KH_MA');
		$result=$this->db->get();
		return $result->result_array();
	}
	function get_hocvien($lh_ma)
	{
		$this->db->select('*');
		$this->db->from('HOCTAP');
		$this->db->order_by('HT_MA','DESC');
		$this->db->join('HOCVIEN','HOCTAP.HV_MA=HOCVIEN.HV_MA');
		$this->db->join('LOPHOC','HOCTAP.LH_MA=LOPHOC.LH_MA');
		$this->db->where('HOCTAP.LH_MA',$lh_ma);
		$data=$this->db->get();
		return $data->result_array();
	}
}