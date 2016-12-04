<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ketquahoctap_model extends CI_Model
{
	function insert($data)
	{
		$this->db->select('*');
		$this->db->from('KETQUAHOCTAP');
		$this->db->where('HT_MA',$data['HT_MA']);
		$this->db->where('KT_MA',$data['KT_MA']);
		$temp=$this->db->get();
		$temp=$temp->result_array();
		if(count($temp)>0) return 0;
		if($this->db->insert('KETQUAHOCTAP',$data)) return 1;
		return 0;
	}
}