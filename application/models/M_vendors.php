<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_vendors extends CI_Model
{

    /*
     *Home-> get cities
     **/
    public function getVendors($city='',$category='')
    {
        if (!empty($city)) { $this->db->where('v.city', $city); }
        if (!empty($category)) {$this->db->where('v.category', $category); }
        $this->db->where('v.is_active', '1');
        $this->db->select('v.name,v.phone,cty.city,cat.category,v.price,v.profile_file,v.id,v.uniq');
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
}