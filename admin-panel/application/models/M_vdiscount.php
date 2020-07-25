<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vdiscount extends CI_Model {


	public function getDiscount($rpid='')
	{
		 if ($this->session->userdata('sha_type') == '2' ) {
            $addedby = $this->db->select('id')->where('manager',$this->session->userdata('sha_id'))->get('admin')->result();
            foreach ($addedby as $key ) {
                $val[] = $key->id;
            }
            if(!empty($val)){
	            $this->db->group_start();
	                $this->db->where_in('rp.added_by',$val);
	            $this->db->group_end();
        	}
        }else if($this->session->userdata('sha_type') == '3' ) {
        	$this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        }

        if (!empty($rpid)) {
        	$this->db->where('rp.id', $rpid);
        }
        
        return $this->db->select('rp.id,rp.city_banner,rp.cat_banner,rp.package as renewPack,rp.invoice_name,rp.gstno,rp.listing_name,rp.listing_mail,rp.listing_phone,rp.invoice_address,rp.ord_type,rp.c_person,rp.alt_phone,rp.list_city,rp.tenure,rp.nt_amnt,rp.discount,rp.gst_amount,rp.amt_after_disc,rp.tds,rp.t_amnt,rp.am_words,rp.pay_mode,rp.inst_no,rp.pay_date,rp.amount,rp.status, am.admin_type,am.id as empid, am.name as empname,vn.name as vendorname,cty.city,cat.category,p.title,rp.started_from, rp.employee,rp.manager, rp.status,vn.id as vendorId,rp.seen,rp.live,rp.approved')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.approved','desc')
		->get()->result();
	}

	public function status_change($id='',$update='')
	{
		return $this->db->where('id', $id)->update('renew_package',$update);
	}

	public function getVendor($id='')
	{
		$vendor = $this->db->where('rp.id', $id)->get('renew_package rp')->row();
		return $this->db->where('ve.id', $vendor->vendor_id)
				->select('ve.name,ve.email,pc.title as package,ad.email as adminMail,ad.manager')
				->from('vendor ve')
				->join('admin ad','ad.id = ve.added_by','left')
				->join('package pc','pc.id = ve.package','left')
				->get()->row();
		return $query;
	}

	public function getManager($id='')
	{
		return $this->db->select('email,name,phone,')->where('id', $id)->get('admin')->row();
	}


	public function invoiceInsert($insert='')
	{
		$query = $this->db->where('uniq_id', $insert['uniq_id'])->get('package_invoice');
		if ($query->num_rows() > 0) {
			$this->db->where('uniq_id', $insert['uniq_id'])->update('package_invoice',$insert);
			return $this->db->insert_id();
		}else{
			$this->db->insert('package_invoice', $insert);
			return $this->db->insert_id();
		}
	}

	public function prices($id='')
	{
		return $this->db->select('discount,gst_amount,t_amnt,nt_amnt')
		->where('id', $id)
		->get('renew_package')->row();
	}

	public function invoiceDownload($vnid='',$id='')
	{
		$this->db->select('rp.*,pi.*,pi.package as packName,pi.id as invoiceId');
		return $this->db->where('pi.renewal_id', $id)
		->from('package_invoice pi')
		->join('renew_package rp', 'rp.id = pi.renewal_id', 'left')
		->get()->row_array();
	}

	public function getTenure($id='')
	{
		$this->db->where('id', $id)->select('started_from,add_mon,tenure');
		return $this->db->get('renew_package')->row();
	}

	public function checkInvoice($id='')
	{
		$this->db->where('renewal_id', $id);
		$query = $this->db->get('package_invoice');
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function getStates($value='')
	{
		return $this->db->order_by('state', 'asc')->get('state_list')->result();
	}

	public function getinNo($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('package_invoice')->row('id');
	}

	public function getCity($value='')
	{
		$this->db->order_by('city', 'asc');
		return $this->db->get('city')->result();
	}

	public function cityName($id='')
	{
		return $this->db->select('city')->where('id', $id)->get('city')->row('city');
	}

	public function stateName($id='')
	{
		return $this->db->select('state')->where('id', $id)->get('state_list')->row('state');
	}

	public function insertIterm($insert='')
	{
		return $this->db->insert('invoice_terms', $insert);
	}

	public function termsGet($id='')
	{
		return $this->db->where('invoice_id', $id)->get('invoice_terms')->result();
	}
	

}

/* End of file m_vdiscount.php */
/* Location: ./application/models/m_vdiscount.php */