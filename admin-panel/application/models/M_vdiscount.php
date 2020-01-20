<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vdiscount extends CI_Model {


	public function getDiscount($value='')
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
        }

        // $this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        return $this->db->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from,rp.gstno,rp.laddress,p.price,rp.discount,rp.gst,rp.total,rp.total,rp.dr_bank')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();

        

	}

	public function status_change($id='',$status='')
	{
		return $this->db->where('id', $id)->update('renew_package',array('status' => $status,'approved' =>$status));
	}

	public function getVendor($id='')
	{
		$query = $this->db->where('ve.id', $id)
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
			return $this->db->where('uniq_id', $insert['uniq_id'])->update('package_invoice',$insert);
		}else{
			return $this->db->insert('package_invoice', $insert);
		}
	}
	

}

/* End of file m_vdiscount.php */
/* Location: ./application/models/m_vdiscount.php */