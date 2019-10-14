<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// $this->load->model('m_vauth');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
    }

    public function index($var = null)
    {
        $data['title'] = 'Vendor Registration | Shaadibaraati';
        $this->load->view('vendor-auth/vendor-registration',$data);
    }

    public function login($var = null)
    {
        $data['title'] = 'Vendor Registration | Shaadibaraati';
        $this->load->view('vendor-auth/vendor-login',$data);
    }
    
}