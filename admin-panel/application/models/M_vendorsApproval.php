<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendorsApproval extends CI_Model {

	public function get_vendors($value='')
	{
		$this->db->where('ven.is_active', '3');
		$this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,');
		$this->db->from('vendor ven');
		$this->db->join('city cty', 'cty.id = ven.city', 'left');
		$this->db->join('category cat', 'cat.id = ven.category', 'left');
		$this->db->order_by('ven.id', 'desc');
		return $this->db->get()->result();
	}

	public function approve_vendors($id='')
	{
		$this->db->where('id', $id)->update('vendor',array('is_active'=>'1'));
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function reject_vendors($id='')
	{
		$this->db->where('id', $id)->update('vendor',array('is_active'=>'2'));
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	

}

/* End of file m_vendorsApproval.php */
/* Location: ./application/models/m_vendorsApproval.php */