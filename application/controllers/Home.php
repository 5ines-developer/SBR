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


    public function contact($id='')
    {
        $data['title']  = 'contact - ShaadiBaraati';
        $data['user']   = $this->m_home->getuser($this->session->userdata('shdid'));
        $this->load->view('site/contact-us',$data);
    }

    public function insertcontact($value='')
    {
        $name       =   $this->input->post('name');
        $email      =   $this->input->post('email');
        $phone      =   $this->input->post('phone');
        $subject    =   $this->input->post('subject');
        $message    =   $this->input->post('message');
        $uniq       =   $this->input->post('uniq');

        $insert = array(
          'name'    =>  $name , 
          'email'   =>  $email , 
          'phone'   =>  $phone , 
          'subject' =>  $subject , 
          'message' =>  $message ,
          'uniq'    =>  $uniq
        );

        $data['result'] = $insert;
        $data['output']  =  $this->m_home->addenquiry($insert);
        if (!empty($data['output'])) {
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/enquiry', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to('prathwi@5ine.in');
            $this->email->subject('Enquiry Form');
            $this->email->message($msg);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Your request has been submitted successfully, Our team will contact you soon.');
                redirect('contact-us','refresh');
            } else {
                $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
                redirect('contact-us','refresh');
            }
        }else{
              $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
              redirect('contact-us','refresh');
        }
    }

    public function privacy_policy()
    {
        $data['title']  = 'privacy-policy - ShaadiBaraati';
        $this->load->view('site/privacy-policy',$data);
    }
    

    public function terms_conditions()
    {
        $data['title']  = 'terms-conditions - ShaadiBaraati';
        $this->load->view('site/terms-conditions',$data);
    }

    public function about_us()
    {
        $data['title']  = 'about-us - ShaadiBaraati';
        $this->load->view('site/about-us',$data);
    }

}

/* End of file Controllername.php */
