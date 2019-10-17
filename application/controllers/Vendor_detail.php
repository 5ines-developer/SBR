<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('shvid') == '') { $this->session->set_flashdata('error', 'Please login and try again'); redirect('vendor/login'); } 
		$this->load->model('m_vendorDetail');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
	}

	public function index()
	{
		$data['title'] = 'Vendor Profile | Shaadibaraati';
		$uniqid = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row();
        $output = $this->m_vendorDetail->getVendors($uniqid->uniq);
        if (!empty($output )) {
	        foreach ($output as $key => $value) {
	           $value->service     = $this->m_vendorDetail->getService($value->id);
	           $value->video       = $this->m_vendorDetail->getVideo($value->id);
	           $value->review      = $this->m_vendorDetail->getReview($value->id);
	           $value->userReview  = $this->m_vendorDetail->getuserReview($value->id);
	           $value->fav         = $this->m_vendorDetail->getFavourite($value->id);
	        //    $value->faq         = $this->m_vendorDetail->faq($value->catId);
	           $value->offer       = $this->m_vendorDetail->offer($value->id);
	           $value->similar     = $this->m_vendorDetail->similarVendors($value->cityId,$value->catId,$value->id);
	        }
	        $data['title']  = $value->name.'- ShaadiBaraati';
        }
        $data['vendor'] = $output;
        $this->load->view('vendor-auth/vendor-profile',$data);
	}

}

/* End of file Vendor-detail.php */
/* Location: ./application/controllers/Vendor-detail.php */