<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_discount extends CI_Controller {


		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_vdiscount');

        $this->aid = $this->session->userdata('sha_id');
        $this->type = $this->session->userdata('sha_type');
        $this->ci =& get_instance();


        // $this->ci =& get_instance();
        // $accs = $this->ci->preload->access();
        // $acces = array();
        // $acces = explode (",", $accs->menu);
        
        // if (in_array("14", $acces))
        // {
        //     $this->access = true;

        // }else{
        //     $this->access = null;
        // }
        // if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }


	public function index()
	{
		
		$data['title'] = 'vendor discount | shaadibaraati';
		$data['result'] 	= $this->m_vdiscount->getDiscount();
		$this->load->view('vendors/discount', $data, FALSE);
	}

	public function approve($id='')
	{
		$status = '1';
		// send to model
        if($this->m_vdiscount->status_change($id,$status)){
        	$this->sendapprove($id);
           $this->session->set_flashdata('success', 'Vendor discount request approved Successfully');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
       	}else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
       	}
		
	}

	public function reject($value='')
	{
		$status = '2';
		// send to model
        if($this->m_vdiscount->status_change($id,$status)){
        	$this->sendreject($id);
        	if ($this->type != '2') {
        		$this->sendmanager($id);
        	}
           $this->session->set_flashdata('success', 'Vendor discount request rejected Successfully');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
       	}else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
       	}
	}


	public function sendapprove($id='')
	{
		$data['result'] = $this->m_vdiscount->getVendor($id);
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/discount_approve', $data, true); 
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($data['result']->email);
        if ($this->type != '2') {
			$data['manager'] = $this->m_vdiscount->getManager($data['result']->manager);
			$this->email->cc($data['manager']->email);
		}
        $this->email->subject('Vendor Discount Request');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
	}


	public function sendreject($value='')
	{
		$data['result'] = $this->m_vdiscount->getVendor($id);
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/discount_reject', $data, true); 
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($data['result']->email);
        if ($this->type != '2') {
			$data['manager'] = $this->m_vdiscount->getManager($data['result']->manager);
			$this->email->cc($data['manager']->email);
		}
        $this->email->subject('Vendor Discount Request');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
	}






}

/* End of file Vendor_discount.php */
/* Location: ./application/controllers/Vendor_discount.php */