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

	public function employee($year='',$month='',$city='')
	{
		if (!empty($city)) { $this->db->where('a.city', $city); } 
		if (!empty($month)) { $this->db->where('et.month', $month); } 
		if (!empty($year)) { $this->db->where('et.year', $year); }
		$this->db->group_by('id');
		$this->db->where('a.admin_type', 3);
		$this->db->select('a.id,et.target,et.year,et.month,cty.city,a.name');
		$this->db->from('admin a');
		$this->db->join('e_target et', 'et.emp_id = a.id', 'left');
		$this->db->join('city cty', 'cty.id = a.city', 'left');
		return $this->db->get()->result();
	}

	public function emp_clear($id='',$month='',$year='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$sdate = '01-'.$month.'-'.$year;
		$edate = $days.'-'.$month.'-'.$year;
		$start = date('Y-m-d',strtotime($sdate));
		$end = date('Y-m-d',strtotime($edate));
		$this->db->select_sum('total');
		$this->db->where('added_on >=', $start);
		$this->db->where('added_on <=', $end);
		$this->db->where('status', '1');
		$this->db->where('live', '1');
		$this->db->where('employee', $id);
		$result = $this->db->get('renew_package')->row();
		if (!empty($result->total)) {
			return $result->total;
		}else{
			return 0;
		}
	}

	public function manager($id='')
	{
		$manager = $this->db->where('id', $id)->get('admin')->row('manager');
		if (!empty($manager)) {
			return $this->db->where('id', $manager)->get('admin')->row('name');
		}else{
			return false;
		}
	}

	public function getManager($city='')
	{
		if (!empty($city)) { $this->db->where('a.city', $city); } 
		$this->db->where('a.admin_type', 2);
		$this->db->select('a.id, a.name,cty.city');
		$this->db->from('admin a');
		$this->db->join('city cty', 'cty.id = a.city', 'left');
		return $this->db->get()->result();
	}

	public function mantarget($year='',$month='',$id='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			$result = $this->db->where('emp_id', $value->id)->where('month',$month)->where('year',$year)->get('e_target')->row('target');
			$target[] = str_replace(",", "", $result); 
		}
		return $targ = array_sum($target);
	}

	public function manclear($year='',$month='',$id='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$target = array();
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			if (!empty($month) || !empty($year)) {
				$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
				$sdate = '01-'.$month.'-'.$year;
				$edate = $days.'-'.$month.'-'.$year;
				$start = date('Y-m-d',strtotime($sdate));
				$end = date('Y-m-d',strtotime($edate));
				$this->db->select_sum('total');
				$this->db->where('added_on >=', $start);
				$this->db->where('added_on <=', $end);
			}
			$this->db->where('status', '1');
			$this->db->where('live', '1');
			$this->db->where('employee', $value->id);
			$result = $this->db->get('renew_package')->row();
			if (!empty($result)) {
				$target[] = str_replace(",", "", $result->total);
			}else{
				$target = array();
			}
		}
		return $targ = array_sum($target);
	}

	public function liveReport($city='',$month='',$year='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		if (!empty($month) || !empty($year)) {
			$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$sdate = '01-'.$month.'-'.$year;
			$edate = $days.'-'.$month.'-'.$year;
			$start = date('Y-m-d',strtotime($sdate));
			$end = date('Y-m-d',strtotime($edate));
			$this->db->select_sum('total');
			$this->db->where('rp.added_on >=', $start);
			$this->db->where('rp.added_on <=', $end);
		}

		if (!empty($city)) { $this->db->where('rp.v_city', $city); } 

		$this->db->where('live', 1);
		$this->db->where('status', 1);
		$this->db->select('rp.*,vn.*,rp.discount,pc.title,rp.employee as employeename ,a.name as employee');
		$this->db->from('renew_package rp');
		$this->db->join('vendor vn', 'vn.id = rp.vendor_id', 'left');
		$this->db->join('package pc', 'pc.id = rp.package', 'left');
		$this->db->join('admin a', 'a.id = rp.employee', 'left');
		return $this->db->get()->result();
	}


}

/* End of file M_report.php */
/* Location: ./application/models/M_report.php */