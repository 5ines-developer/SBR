<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_vnupgrade extends CI_Model {

		/**
     * Vendors -> get Vendors
     * get Vendors details from database
     * url : vendors/my-vendors
    **/
	public function get_vendors($id='',$filter='')
	{
		$null=0;
		if (!empty($filter) && $filter =='free') {
			$this->db->where('ven.package', $null);
		}elseif (!empty($filter)) {
			$this->db->where('ven.package !=', $null);
		}

		if (!empty($id)) {
			$this->db->where('ven.added_by', $id);
		}

		$this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pac.title,ven.package');
		$this->db->order_by('ven.id', 'desc');
		$this->db->from('vendor ven');
		$this->db->join('city cty', 'cty.id = ven.city', 'left');
		$this->db->join('category cat', 'cat.id = ven.category', 'left');
		$this->db->join('package pac', 'pac.id = ven.package', 'left');
		return $this->db->get()->result();
	}

	/**
     * Vendors -> get Vendors
     * get Vendors details from databases
     * url : vendors/view/id
    **/
	public function detail($id='')
	{
		$this->db->select('v.id as vId,ct.id as citId, ct.city as city,cat.id as catId, cat.category as category')
		->where('v.id', $id)
		->from('vendor v')
		->join('city ct', 'ct.id = v.city', 'left')
		->join('category cat', 'cat.id = v.category', 'left');
		return $this->db->get()->row();
	}

		/**
     * Vendors -> get category
     * get category details from database
     * url : vendors/add
    **/
	public function get_category($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('category')->result();
	}


	/**
     * Vendors -> get city
     * get city details from database
     * url : vendors/add
    **/
	public function get_city($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('city')->result();
	}

	public function getPackage($value='')
	{
		return $this->db->get('package')->result();
	}

	public function insertProposal($insert='')
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('renew_package');
		if ($query->num_rows() > 0) {
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('renew_package', $insert);
		}else{
			$this->db->insert('renew_package', $insert);
			return $this->db->insert_id();
		}
		
	}

	// get new proposal
	public function newProposal($added = null)
	{
		return $this->db->where('rp.added_by', $added)
		->where('rp.seen !=',1)
		->where('rp.live !=',1)
		->where('rp.status !=', 1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
		
	}

	public function approvedProposal($added = null)
	{
		return $this->db->where('rp.added_by', $added)
		->where('rp.status', 1)
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function rejectedProposal($added = null)
	{
		return $this->db->where('rp.added_by', $added)
		->where('rp.status', '2')
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function view_proposal($added = null,$id = null)
	{
		return $this->db->where('rp.id', $id)
		->select('rp.id,rp.lname,rp.in_name,rp.gstno,rp.laddress,rp.in_email,rp.in_mobile,rp.landline,rp.total,rp.namopunt,rp.or_id,rp.pan_no,am.admin_type,am.id as empid, am.name as empname,vn.name,cty.city,cat.category,p.title,rp.started_from,rp.pay_date')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->row_array();
	}

	public function seenChange($id='')
	{
		return $this->db->where('id', $id)
		->where('seen','0')
		->update('renew_package',array('seen' => 1 ));
	}

	public function allProposal($added = null)
	{
		return $this->db->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function clearedProposal($added = null)
	{
		return $this->db->where('rp.status',1)
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function liveProposal($added='')
	{
		return $this->db->where('rp.live',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}
}

/* End of file M_vnupgrade.php */
/* Location: ./application/models/M_vnupgrade.php */