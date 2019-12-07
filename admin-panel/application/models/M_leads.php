<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_leads extends CI_Model {


    
	public function getCategory($value='')
	{
		return $this->db->select('category,id as catid')->get('category')->result();
	}

	public function getCity($value='')
	{
		return $this->db->select('city,id as cityId')->get('city')->result();
	}

	public function getVendors($city='',$category='',$v_type='',$search='')
	{
		if (!empty($search)) { $this->db->group_start()->like('vn.name', $search)->group_end(); }

		if (!empty($city)) { $this->db->where('vn.city', $city); }
		if (!empty($category)) { $this->db->where('vn.category', $category); }

		if ($v_type =='free') {
			$nul = 0;
			return $this->db->where('package',$nul)->select('vn.name,vn.id as vid')->get('vendor vn')->result();			
		}else{
            $this->db->select('vn.name,vn.id as vid,pac.*,vp.*,la.vendor_id as lvn_id,la.name as lvn_name')	
            ->group_by('vn.name')	
			->from('vendor_package  vp')
			->join('vendor vn', 'vn.id = vp.vendor_id', 'left')
			->join('leads_assign la', 'la.vendor_id = vp.vendor_id', 'left')
			->join('package pac', 'pac.id = vp.package_id', 'left');
			return $this->db->get()->result();
		}	
    }
    
    public function lead_insert($insert = null)
    {    
        return $this->db->insert('leads_assign', $insert); 
    }

    public function getLeads($var = null)
    {
        $this->db->select('lp.*,cty.city as cityName,cat.category as catName,vn.name as vendorName')
        ->from('leads_assign lp')
        ->join('vendor  vn', 'vn.id  = lp.vendor_id ', 'left')
		->join('city cty', 'cty.id = lp.city', 'left')
		->join('category cat', 'cat.id = lp.category', 'left');
        return $this->db->order_by('id', 'desc')->get()->result();  
    }


    public function getleadcount($vid = '',$name='')
    { 
        return $this->db->where('vendor_id', $vid)->where('name',$name)->get('leads_assign')->num_rows();   
    }

    

}

/* End of file ModelName.php */
