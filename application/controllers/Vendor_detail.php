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
		$this->userId = $this->session->userdata('shvid');
		$this->uniq = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row('uniq');
	}

	public function index()
	{
		$data['title'] = 'Vendor Profile | Shaadibaraati';
		
        $output = $this->m_vendorDetail->getVendors($this->uniq);
        if (!empty($output )) {
	        foreach ($output as $key => $value) {
	           $value->service     = $this->m_vendorDetail->getService($value->id);
	           $value->video       = $this->m_vendorDetail->getVideo($value->id);
	           $value->review      = $this->m_vendorDetail->getReview($value->id);
	           $value->userReview  = $this->m_vendorDetail->getuserReview($value->id);
	           $value->fav         = $this->m_vendorDetail->getFavourite($value->id);
	        //    $value->faq         = $this->m_vendorDetail->faq($value->catId);
	           $value->offer       = $this->m_vendorDetail->offer($value->id);
	        }
	        $data['title']  = $value->name.'- ShaadiBaraati';
        }
        $data['vendor'] = $output;
        $this->load->view('vendor-auth/vendor-profile',$data);
	}


	public function addprice($value='')
	{
		$price = $this->input->post('price');
		$output = $this->m_vendorDetail->insertPrice($price,$this->uniq);
		echo $output;
	}

	public function getPrice($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('price');
		echo $output;
	}

	public function pricePer($value='')
	{
		$per = $this->input->post('per');
		$output = $this->m_vendorDetail->pricePer($per,$this->uniq);
		echo $output;
	}

	public function getPer($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('price_for');
		echo $output;
	}

	public function address($value='')
	{
		$vaddress = $this->input->post('vaddress');
		$output = $this->m_vendorDetail->address($vaddress,$this->uniq);
		echo $output;
	}

	public function getAddress($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('address');
		echo $output;
	}

	public function ban_upload($var = null)
	{
		

		$banner = $this->input->post('banner');
		
		echo "<pre>";
		print_r ($banner);
		echo "</pre>";
		
	}


	public function changePassword($var = null)
    {
		if ($this->session->userdata('shvid') != '') {
			$data['title'] = 'Change password | Shaadibaraati';
			$this->load->view('vendor-auth/change-password',$data);
		}else{
			$this->session->set_flashdata('error', 'Please login and try again'); 			
			redirect('vendor/login');
		}        
	}
	
	    /**
     *Change pasword -> Update New password
     * @url : update/change-password
     * @param : new password,confirm password,userid
     */
    public function password_validation()
    {
        $this->form_validation->set_rules('curtpassword', 'Current Password', 'callback_passwordcheck');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[newpassword]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('vendor/change-password');
        } else {
			$password = $this->input->post('newpassword');
			$hash  = $this->bcrypt->hash_password($password);
			
            if ($this->m_vendorDetail->changepass($this->userId, $hash)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('vendor/change-password');
            } else {
                $this->session->set_flashdata('error', 'unable to update your password, New password is matching with the current password!');
                redirect('vendor/change-password');
            }
        }
	}
	
	public function passwordcheck($password)
    {
		$result = $this->db->where('id', $this->userId)->get('vendor')->row();
		if ($this->bcrypt->check_password($password, $result->password)) {
			return true;
		}else{
			$this->form_validation->set_message('passwordcheck', 'The {field} is not Valid');
			return false;
		}
    }


	
}

/* End of file Vendor-detail.php */
/* Location: ./application/controllers/Vendor-detail.php */