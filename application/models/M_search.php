<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

	/*
     *Home-> get cities
     **/
    public function getSearch($city='',$category='',$limit='',$start='')
    {

        if (!empty($city) && $city !='All') { $this->db->where('cty.city', $city); }
        if (!empty($category) && $category !='all category') {$this->db->where('cat.category', $category); }
        $this->db->where('v.is_active', '1');
        $this->db->select('v.name,v.phone,cty.city,cat.category,v.price,v.profile_file,v.id,v.uniq');
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //get total rows count for pagination
    public function rowsCount($city='',$category='')
    {
        if (!empty($city) && $city !='All') { $this->db->where('cty.city', $city); }
        if (!empty($category) && $category !='all category') {$this->db->where('cat.category', $category); }
        $this->db->where('v.is_active', '1');
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

    //get review count in instant
    public function countReview($id='')
    {
    	$this->db->where('vendor_id', $id);
    	$query = $this->db->get('vendor_review');
        if ($query->num_rows() > 0) {
            $result =  $query->result();
            return count($result);
        } else {
            return false;
        }
    }

    //search autocompletee
    public function get_search($vendor='')
    {
        $this->db->select('v.*,cty.city as cityname,cat.category as categoryname');
        $this->db->where('v.is_active', '1');
    	$this->db->like('v.name', $vendor, 'BOTH');
		$this->db->limit(20);
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
    }

    //get single city name
    public function SingleCity($id = null)
    {
        $this->db->select('city');
        $this->db->where('id', $id);
        return $this->db->get('city')->row_array();
    }

    //get single category name name
    public function SingleCategory($id = null)
    {
        $this->db->select('category');
        $this->db->where('id', $id);
        return $this->db->get('category')->row_array();
    }



}

/* End of file M_search.php */
/* Location: ./application/models/M_search.php */