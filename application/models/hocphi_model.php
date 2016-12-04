<?php defined('BASEPATH') OR exit('No direct script access allowed');
class hocphi_model extends CI_Model
{
	function insert_hv($hv_ma)
	{
		$this->db->select('*');
		$this->db->order_by('HOCTAP.HV_MA','DESC');
		$this->db->from('HOCTAP');
		$this->db->join('HOCVIEN','HOCTAP.HV_MA=HOCVIEN.HV_MA');
		$this->db->join('LOPHOC','HOCTAP.LH_MA=LOPHOC.LH_MA');
		$this->db->join('KHOAHOC','KHOAHOC.KH_MA=LOPHOC.KH_MA');
		$this->db->where('HOCTAP.HV_MA',$hv_ma);
		$temp=$this->db->get();
		$temp=$temp->result_array();
		if(count($temp)>0)
		{
			$temp=$temp[0];
			$this->db->select_sum('HP_TIENDONG');
			$this->db->from('HOCPHI');
			$this->db->where('HT_MA',$temp['HT_MA']);
			$temp2=$this->db->get();
			$temp2=$temp2->result_array()[0];
			$temp['HP_TIENDONG']=$temp2['HP_TIENDONG'];
			return $temp;
		}
		return 0;
	}
	function insert($data)
	{
		$this->db->select_max('HP_MA');
		$temp=$this->db->get('HOCPHI');
		$temp=$temp->result_array()[0]['HP_MA'];
		$data['HP_MA']=$temp+1;
		if($this->db->insert('HOCPHI',$data))
			return 1;
		return 0;
	}
	function get_danh_sach_no()
	{
		$kq=array();
		$this->db->select('HV_MA');
		$this->db->from('HOCTAP');
		$data=$this->db->get();
		$data=$data->result_array();
		foreach($data as $temp)
		{
			$temp2=$this->insert_hv($temp['HV_MA']);
			if($temp2['HP_TIENDONG'] < $temp2['KH_HOCPHI'])
			{
				$kq[]=$temp2;
			}
		}
		return $kq;
	}
	function get_danh_sach_no_2($start,$total)
	{
		$kq=array();
		$this->db->select('HV_MA');
		$this->db->from('HOCTAP');
		$data=$this->db->get();
		$data=$data->result_array();
		foreach($data as $temp)
		{
			$temp2=$this->insert_hv($temp['HV_MA']);
			if($temp2['HP_TIENDONG'] < $temp2['KH_HOCPHI'])
			{
				$kq[]=$temp2;
			}
		}
		$kq2=array();
		$start=($start==''?0:$start);
		for($i=$start;$i<($start+$total) && $i<count($kq);$i++)
			$kq2[]=$kq[$i];
		return $kq2;
	}
	function get_list()
	{
		$kq=array();
		$this->db->select('HV_MA');
		$this->db->order_by('HV_MA','DESC');
		$this->db->from('HOCTAP');
		$data=$this->db->get();
		$data=$data->result_array();
		foreach($data as $temp)
			if($temp2=$this->insert_hv($temp['HV_MA'])) $kq[]=$temp2;
		return $kq;
	}
	function get_list_2($start,$total)
	{
		$kq=array();
		$this->db->select('HV_MA');
		$this->db->from('HOCTAP');
		$data=$this->db->get();
		$data=$data->result_array();
		foreach($data as $temp)
		{
			$temp2=$this->insert_hv($temp['HV_MA']);
			$kq[]=$temp2;
		}
		$kq2=array();
		$start=($start==''?0:$start);
		for($i=$start;$i<($start+$total) && $i<count($kq);$i++)
			$kq2[]=$kq[$i];
		return $kq2;
	}
	function search($hv_ten)
	{
		$this->db->select('HV_MA');
		$this->db->from('HOCVIEN');
		$this->db->like('HV_TEN',$hv_ten);
		$result=$this->db->get();
		$result=$result->result_array();
		$data=array();
		foreach($result as $temp)
		{
			$this->db->select('*');
			$this->db->from('HOCTAP');
			$this->db->where('HV_MA',$temp['HV_MA']);
			$t=$this->db->get();
			$t=$t->result_array();
			if(count($t)>0)
			{
				$temp2=$this->insert_hv($temp['HV_MA']);
				$data[]=$temp2;
			}
		}
		return $data;
	}
	function thongke($a,$b)
	{
		$kq=array();
		$this->db->select('HV_MA');
		$this->db->order_by('HV_MA','DESC');
		$this->db->from('HOCTAP');
		$data=$this->db->get();
		$data=$data->result_array();
		foreach($data as $temp)
			if($temp2=$this->insert_hv_thongke($temp['HV_MA'],$a,$b))
			{
				if($temp2['HP_TIENDONG'] > 0 ) $kq[]=$temp2;
			}
		return $kq;
	}
	function insert_hv_thongke($hv_ma,$a,$b)
	{
		$this->db->select('*');
		$this->db->order_by('HOCTAP.HV_MA','DESC');
		$this->db->from('HOCTAP');
		$this->db->join('HOCVIEN','HOCTAP.HV_MA=HOCVIEN.HV_MA');
		$this->db->join('LOPHOC','HOCTAP.LH_MA=LOPHOC.LH_MA');
		$this->db->join('KHOAHOC','KHOAHOC.KH_MA=LOPHOC.KH_MA');
		$this->db->where('HOCTAP.HV_MA',$hv_ma);
		$temp=$this->db->get();
		$temp=$temp->result_array();
		if(count($temp)>0)
		{
			$temp=$temp[0];
			$this->db->select_sum('HP_TIENDONG');
			$this->db->from('HOCPHI');
			$this->db->where('HT_MA',$temp['HT_MA']);
			$this->db->where('HP_NGAYDONG >=',$a);
			$this->db->where('HP_NGAYDONG <=',$b);
			$temp2=$this->db->get();
			$temp2=$temp2->result_array()[0];
			$temp['HP_TIENDONG']=$temp2['HP_TIENDONG'];
			return $temp;
		}
		return 0;
	}
}