<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_enquiry');
    }

    //get enquiries
	public function index()
	{
		$data['title']  = 'Enquiry - Shaadibaraati';
		$data['result']  = $this->m_enquiry->getEnquiry();
		$this->load->view('enquiry/enquiry-list', $data, FALSE);
		
	}

	public function view($id='')
    {
        $data['result']  = $this->m_enquiry->view($id);
        $data['title']   = 'Enquiry - Shaadibaraati';
        $this->load->view('enquiry/view-enquiry', $data, FALSE);
    }

    public function freequote($id = null)
    {
        $data['title']  = 'Free quote - Shaadibaraati';
		$data['result']  = $this->m_enquiry->getfreequote();
		$this->load->view('enquiry/freequote', $data, FALSE);
    }

    public function quoteview($id='')
    {
        $data['result']  = $this->m_enquiry->quoteview($id);
        $data['title']   = 'Enquiry - Shaadibaraati';
        $this->load->view('enquiry/view-free', $data, FALSE);
    }



}

/* End of file Enquiries.php */
/* Location: ./application/controllers/Enquiries.php */