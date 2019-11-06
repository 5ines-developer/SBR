<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_venquiry extends CI_Model {

    public function vendor_enquiry($var = null)
    {
        $this->db->select('ve.*,v.*,ve.category cat,v.id ids');
        $this->db->order_by('ve.id', 'asc');        
        $this->db->from('vendor_enquiry ve');
        $this->db->join('vendor v', 'v.uniq = ve.vendor_id', 'left');        
        return $this->db->get()->result();  
    }


    public function packageGet($value='')
    {
    	$this->db->select('ve.*,v.*,ve.id as ids,ve.package as pack');
        $this->db->order_by('ve.id', 'desc');        
        $this->db->from('v_buypackage ve');
        $this->db->join('vendor v', 'v.id = ve.vendor_id', 'left');        
        return $this->db->get()->result();
    }


    public function singlePackage($id='')
    {
    	$this->update_status($id);

    	$this->db->where('ve.id', $id);
    	$this->db->select('ve.*,v.*,ve.id as ids,ve.package as pack');
        $this->db->order_by('ve.id', 'desc');        
        $this->db->from('v_buypackage ve');
        $this->db->join('vendor v', 'v.id = ve.vendor_id', 'left');        
        return $this->db->get()->row();
    }

    public function update_status($id='')
    {
    	return $this->db->where('id', $id)->update('v_buypackage',  array('status' => '1' ));
    }

    public function cityName($id='')
    {
    	return $this->db->where('id', $id)->get('city')->row('city');
    }

    public function categoryName($id='')
    {
    	return $this->db->where('id', $id)->get('category')->row('category');
    }

    public function package($pckge='',$type='')
    {
       if ($type == 'package') {
          return $this->db->where('id', $pckge)->get('package')->row('title');
       }else{
            return $this->db->where('id', $pckge)->get('banner_package')->row('title');
       }
    }


    


    

}

/* End of file ModelName.php */
