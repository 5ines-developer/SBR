<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendorDetail extends CI_Model {

	    /*
     *Home-> get cities
     **/
    public function getVendors($uniqid='')
    {

        $this->db->select('v.id,v.name,v.phone,v.email,v.price,v.price_for,v.address,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,cty.id as cityId, cat.id as catId');
        $this->db->group_start();
        	$this->db->where('v.is_active', '3');
        	$this->db->or_where('v.is_active', '1');
        $this->db->group_end();
        $this->db->where('v.uniq', $uniqid);
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*
     *vendor detail-> get services
    **/
    public function getService($id='')
    {
       $this->db->where('vi.vendor_id', $id);
       $this->db->from('vendor_infoservice vi');
       $this->db->join('information_service in', 'in.id = vi.information_id', 'left');
       $this->db->limit(6);
       return $this->db->get()->result();
    }

    /*
     *vendor detail-> fetch all video
    **/
    public function getVideo($id='')
    {
        $this->db->where('vendor_id', $id);
        $this->db->limit(6);
        return $this->db->get('vendor_video')->result();
    }

    //get review details
    public function getReview($id='')
    {
       $this->db->where('vendor_id', $id);
       $this->db->where('status', '1');
       $this->db->order_by('id', 'desc');
       return $this->db->get('vendor_review')->result();
    }

        // getuserreview
    public function getuserReview($id)
    {
        $this->db->where('vendor_id', $id);
        $this->db->where('status', '1');
        $this->db->where('user_id', $this->session->userdata('shdid'));
        return $this->db->get('vendor_review')->row();
    }

        //get favourite
    public function getFavourite($vendorid='')
    {
        $this->db->select('status');
        $this->db->where('vendor_id', $vendorid);
        $this->db->where('user_id', $this->session->userdata('shdid'));
        $ouput = $this->db->get('shortlist_vendor')->row();
        if (!empty($ouput)) {
        	return $ouput->status;
        }else{
        	return false;
        }
    }

        //  add faq
    public function faq($id)
    {
        $uqid = $this->db->select('uniq')->where('id',$id)->get('category')->row('uniq');
        $this->db->where('category_id', $uqid)->order_by('id', 'asc');        
        return $this->db->get('faq')->result();
        
    }

    public function offer($id='')
    {
        $this->db->where('vendor_id', $id);
        return $this->db->get('vendor_offer')->row_array();
    }

    public function similarVendors($city='',$category='',$id='')
    {    

        $this->db->where('v.id !=', $id);
        $this->db->select('v.package,v.id,v.name,v.phone,v.email,v.price,v.address,v.price_for,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,cty.id as cityId, cat.id as catId');
        $this->db->where('v.city', $city);
        $this->db->where('v.category', $category); 
        $this->db->where('v.is_active', '1');

        $this->db->protect_identifiers = FALSE;
            $this->db->order_by('FIELD ( v.package, "Wed Elite", "Wed Leader", "Wed Assisted", "Wed Gold", "Wed Premium", "Wed Featured", "Free Listing", "")');
        $this->db->protect_identifiers = TRUE;

        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function insertPrice($price,$uniq)
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('price' =>$price));
    	if ($this->db->affected_rows() > 0) {
    		return $price;
    	}else{
    		return false;
    	}
    }

    public function pricePer($per='',$uniq='')
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('price_for' =>$per));
    	if ($this->db->affected_rows() > 0) {
    		return $per;
    	}else{
    		return false;
    	}
    }

    public function address($vaddress,$uniq)
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('address' =>$vaddress));
    	if ($this->db->affected_rows() > 0) {
    		return $vaddress;
    	}else{
    		return false;
    	}
    }

    	/**
	*Change pasword -> Update New password
	* @url : change-password
	*/
	public function changepass($id,$npass)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('vendor');
		if($query->num_rows() > 0)
		{
			$this->db->where('id', $id);
			$this->db->update('vendor',  array('password' =>$npass));
			if ($this->db->affected_rows() > 0)
			{
				return true;
			}else{

				return false;
			}
		} else {
			return false;
		}
	}

    



}

/* End of file M_vendorDetail.php */
/* Location: ./application/models/M_vendorDetail.php */