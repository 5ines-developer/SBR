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

	public function ban_upload($output = null)
	{

        $this->load->library('upload');
        $this->load->library('image_lib');
		$files = $_FILES;
        $filesCount = count($_FILES['banner']['name']);

        if (file_exists($_FILES['banner']['tmp_name'])) {
            $config['upload_path'] = 'vendors-profile/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
             $this->upload->do_upload('banner');
	        	$upload_data = $this->upload->data();
	            $config['image_library'] = 'gd2';

	                $file_name = $upload_data['file_name'];
	                $imgpath = 'vendors-profile/'.$file_name;
	                $config['image_library']    = 'gd2';
	                $config['source_image']     = $upload_data['full_path'];
	                $config['wm_type']          = 'overlay';
	                $config['wm_overlay_path']  = 'assets/img/water.png';//the overlay image
	                $config['wm_x_transp']      = '4';
	                $config['wm_y_transp']      = '4';
	                $config['width']            = '50';
	                $config['height']           = '50';
	                $config['padding']          = '50';
	                $config['wm_opacity']       = '40';
	                $config['wm_vrt_alignment'] = 'middle';
                	$config['wm_hor_alignment'] = 'center';
                	 $this->image_lib->initialize($config);
	                if (!$this->image_lib->watermark()) {
	                    $response['wm_errors'] = $this->image_lib->display_errors();
	                    $response['wm_status'] = 'error';
	                } else {
	                    $response['wm_status'] = 'success';
	                }
	        $output = $this->m_vendorDetail->banner($imgpath,$file_name,$this->uniq);

    	}
    	echo $output;
	}


public function offer($output = null)
	{

        $this->load->library('upload');
        $this->load->library('image_lib');
		$files = $_FILES;
        $filesCount = count($_FILES['offer']['name']);

        if (file_exists($_FILES['offer']['tmp_name'])) {
            $config['upload_path'] = 'offer-image/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            $this->upload->do_upload('offer');
	        	$upload_data = $this->upload->data();
	            $file_name = $upload_data['file_name'];
	            $imgpath = 'offer-image/'.$file_name;
	                
	        $output = $this->m_vendorDetail->banner($imgpath,$file_name,$this->uniq);

    	}
    	echo $output;
	}

	public function packages($var = null)
    {
			$data['title'] = 'Packages | Shaadibaraati';
			$data['value'] = $this->m_vendorDetail->getProfile($this->uniq);
            $this->load->view('vendor-auth/packages',$data);
        
    }






	
}

/* End of file Vendor-detail.php */
/* Location: ./application/controllers/Vendor-detail.php */