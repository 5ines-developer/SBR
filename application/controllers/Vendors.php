<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_vendors');
		$this->load->model('m_home');
		$this->load->library('form_validation');
    }


	/**
     * vendors-> load view page
     * url : vendors
    **/
	public function index()
	{
        $data['title']      = 'Vendors - ShaadiBaraati';
        $city     = $this->input->post('city');
        $category = $this->input->post('category');
        $data['vendors']    = $this->m_vendors->getVendors($city,$category);
		$this->load->view('vendors/result', $data, FALSE);
    }
    
}