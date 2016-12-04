<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hoctap_model extends CI_Model
{
	private function trung_lap($data)
	{
		$this->db->select('*');
		$this->db->where('HV_MA',$data['HV_MA']);
		$temp = $this->db->get('HOCTAP');
		if($temp->num_rows()>0) return 1;
		return 0;
	}
	private function update_siso_lophoc($lh_ma,$loai)
	{
		$this->db->select('LH_SISO');
		$this->db->where('LH_MA',$lh_ma);
		$result=$this->db->get('LOPHOC');
		$temp=$result->result_array()[0];
		if($loai=='tang') $siso=$temp['LH_SISO']+1;
		else $siso=$temp['LH_SISO']-1;
		$data=array('LH_SISO'=>$siso);
		$this->db->where('LH_MA',$lh_ma);
		if($this->db->update('LOPHOC',$data)) return 1;
		return 0;
	}
	function insert($data)
	{
		/**************kiểm tra trùng lặp**************************/
		if($this->trung_lap($data)) return 0;
		/****************update sĩ số lớp học***********************/
		$this->update_siso_lophoc($data['LH_MA'],'tang');
		/*********************************************************/
		$this->db->select('HT_MA');
		$this->db->order_by('HT_MA','DESC');
		$temp=$this->db->get('HOCTAP');
		$temp=$temp->result_array();
		$data['HT_MA']=(count($temp)>0?$temp[0]['HT_MA']+1:1);
		if($this->db->insert('HOCTAP',$data))
			return 1;
		return 0;
	}
	function get_list($total=0,$start=0)
	{
		$this->db->select('*');
		$this->db->order_by('HT_MA','DESC');
		$this->db->from('HOCTAP');
		$this->db->join('HOCVIEN','HOCVIEN.HV_MA=HOCTAP.HV_MA');
		$this->db->join('LOPHOC','LOPHOC.LH_MA=HOCTAP.LH_MA');
		if($total!=0 || $start!=0)
			$this->db->limit($total,$start);
		$data=$this->db->get();
		return $data->result_array();
	}
	function delete($ht_ma)
	{
		$data=array();
		$this->db->select('LH_MA');
		$this->db->from('HOCTAP');
		$this->db->where('HT_MA',$ht_ma);
		$data=$this->db->get();

		$this->db->where('HT_MA',$ht_ma);
		if($this->db->delete('HOCTAP'))
		{
			$data=$data->result_array()[0];
			$this->update_siso_lophoc($data['LH_MA'],'giam');
			return 1;
		}
		return 0;
	}
	function get_hoctap($ht_ma)
	{
		$this->db->select('*');
		$this->db->where('HT_MA',$ht_ma);
		$result=$this->db->get('HOCTAP');
		return $result->result_array();
	}
	function update($data)
	{
		$this->db->where('HT_MA',$data['HT_MA']);
		unset($data['HT_MA']);
		if($this->db->update('HOCTAP',$data)) return 1;
		return 0;
	}
	function countall()
	{
		return $this->db->count_all('HOCTAP');
	}
	function search($hv_ten)
	{
		$this->db->select('*');
		$this->db->order_by('HT_MA','DESC');
		$this->db->from('HOCTAP');
		$this->db->join('HOCVIEN','HOCVIEN.HV_MA=HOCTAP.HV_MA');
		$this->db->join('LOPHOC','LOPHOC.LH_MA=HOCTAP.LH_MA');
		$this->db->like('HV_TEN',$hv_ten);
		$data=$this->db->get();
		return $data->result_array();
	}
}