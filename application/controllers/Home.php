<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_home');
		$this->load->library('form_validation');
	}


	/**
     * home-> load view page
     * url : base_url
    **/
	public function index()
	{
        $data['title']      = 'ShaadiBaraati';
        $data['city']       = $this->m_home->getCity();
        $data['category']   = $this->m_home->getCategory();
		$this->load->view('site/index', $data, FALSE);
    }


    /**
     * newsletter subscription-> email check exist
     * url : emailcheck
    **/
	public function emailcheck($value='')
	{
		$email = $this->input->post('email');
        $output = $this->m_home->email_check($email);
		echo  $output;
    }
    

    /**
     * newsletter subscription-> add detail
     * url : subscribe
    **/
    public function subscribe($id = null)
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[newsletter.email]',
                array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') );
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
        	redirect(base_url(),'refresh');
        }else{

            $email = $this->input->post('email');
            $output = $this->m_home->subscribe($email);

            if (!empty($output)) {
                $this->session->set_flashdata('success', 'Thank you for subscribing to our website');
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later!');
                redirect(base_url());
            }
        }
        
        
    }
    
    

}

/* End of file Controllername.php */
