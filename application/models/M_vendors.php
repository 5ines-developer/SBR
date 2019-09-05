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


    public function getVideo($id='')
    {
        $this->db->where('vendor_id', $id);
        return $this->db->get('vendor_video')->result();
    }



}