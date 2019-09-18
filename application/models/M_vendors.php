<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_vendors extends CI_Model
{

    /*
     *Home-> get cities
     **/
    public function getVendors($uniqid='')
    {
        $this->db->select('v.id,v.name,v.phone,v.email,v.price,v.address,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,');
        $this->db->where('v.is_active', '1');
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
     *vendor detail-> get gallery(portfolio images)
    **/
    public function getGallery($id='')
    {
        $this->db->where('vendor_id', $id);
        $this->db->limit(10);
        return $this->db->get('vendor_portfolio')->result();
    }

    /*
     *vendor detail-> gallery(portfolio images) fetch all
    **/
    public function full_gallery($id='')
    {
        $this->db->where('vendor_id', $id);
        return $this->db->get('vendor_portfolio')->result();
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


    //get user details to add review
    public function getUser($id='')
    {
        $this->db->select('su_id, su_name,su_email');
        $this->db->where('su_is_active', '1');
        $this->db->where('su_id', $id);
        return $this->db->get('user')->row();
    }

    //get vendor for review
    public function vendor($vendoruniq='')
    {
        $this->db->select('name, category,city,uniq');
        $this->db->where('is_active', '1');
        $this->db->where('uniq', $vendoruniq);
        return $this->db->get('vendor')->row();
    }

    //add review
    public function addReview($insert='')
    {
        $this->db->where('user_id', $insert['user_id']);
    	$this->db->where('vendor_id', $insert['vendor_id']);
    	$query = $this->db->get('vendor_review');
    	if ($query->num_rows() > 0) {
    		$this->db->where('user_id', $insert['user_id']);
            $this->db->where('vendor_id', $insert['vendor_id']);
    		$this->db->update('vendor_review', $insert);
    		if ($this->db->affected_rows() > 0) {
    			return true;
    		}else{
    			return false;
    		}
    	}else{
        	return $this->db->insert('vendor_review', $insert);
    	}
    }

    //get review details
    public function getReview($id='')
    {
       $this->db->where('vendor_id', $id);
       $this->db->where('status', '1');
       return $this->db->get('vendor_review')->result();
    }

    public function makeFavourite($userid='',$vendorid='')
    {
        $this->db->where('vendor_id', $vendorid);
        $this->db->where('user_id', $userid);
        $result = $this->db->get('shortlist_vendor')->row();
        
        if ($result->id > 0) {
            if ($result->status == '0') {$status = '1'; }else{$status = '0'; }
            $this->db->where('vendor_id', $vendorid);
            $this->db->where('user_id', $userid);
            $this->db->update('shortlist_vendor', array('status' => $status ));
            if ($this->db->affected_rows() > 0) {
                $this->db->select('status');
                $this->db->where('vendor_id', $vendorid);
                $this->db->where('user_id', $userid);
                $ouput = $this->db->get('shortlist_vendor')->row();
                return $ouput->status;
            }else{
                return 3;
            }
        }else{
            if($this->db->insert('shortlist_vendor', array('vendor_id'=> $vendorid,'user_id'=> $userid,'status'=> '1')))
            {
                return true;
            }else{
                return 3; 
            }

        }
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

    //insert enquiries
    public function addenquiry($insert='')
    {
        $this->db->where('uniq', $insert['uniq']);
        $query = $this->db->get('vendor_enquiry');
        if ($query->num_rows() > 0) {
            $this->db->where('uniq', $insert['uniq']);
            $this->db->update('vendor_enquiry', $insert);
            if ($this->db->affected_rows() > 0) {
                return true;
            }else{
                return false;
            }
        }else{
            return $this->db->insert('vendor_enquiry', $insert);
        }
       
    }


    public function userget($id='')
    {
        $this->db->select('su_name, su_email, su_phone');
       $this->db->where('su_id', $id);
       return $this->db->get('user')->row();
    }


    //  add faq
    public function faq($id)
    {
        $this->db->where('vendor_id', $id);
        return $this->db->get('vendor_faq')->result();
        
    }

    // fetch vendor category

    public function allcategory(Type $var = null)
    {
        $this->db->select('id, category, icon, uniq');
        return $this->db->get('category')->result();
    }
    



}