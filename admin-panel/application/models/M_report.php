<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {

	public function saleReport($value='')
	{
		return 
		$this->db
		// ->where('rp.status', 1)
		// ->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from,rp.added_on,vn.phone,vn.email,p.title,rp.namopunt,rp.gst,rp.total,rp.discount,am.name as employee,rp.manager,rp.status,rp.live,rp.approved,rp.added_by,rp.validity,')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.employee', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}


	public function empGet($value='')
	{
		return $this->db->select('id,name,email')->where('admin_type', '3')
		->get('admin')->result();
	}

	public function vendorsCount($id='')
	{
		return $this->db->where('added_by', $id)->get('vendor')->num_rows();
	}

	public function leadsCount($id='')
	{
		return $this->db->where('assigned_by', $id)->get('leads_assign')->num_rows();
	}

	public function visitors($startdate='')
	{
        $this->db->select('date');
        $now    = date("Y-m-d H:i:s");
        $this->db->where('date <=', $now);        
        $this->db->where('date >=', $startdate);
        $query = $this->db->get('visitors')->result();
        foreach ($query as $key => $value) {
        	$newData[]= date("Y-m-d",strtotime($value->date));
        }
        $data['date'] = $newData;
        $data['vals'] = array_count_values($data['date']);
        foreach ($data['vals'] as $key => $value) {
            $counts[] = array("day"=>$key , "visit"=>$value);
        }
        return $counts;
	}


}

/* End of file M_report.php */
/* Location: ./application/models/M_report.php */