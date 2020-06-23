<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class H_banner extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        $this->load->model('m_cities');
        $this->load->model('m_homban');
    }
    
    /**
     * Category -> add Category banner
     * load view page
     * url : category-banner/add
    **/
    public function add()
    {   
        $data['banner'] = $this->m_homban->bannerGet();
		$data['title']  = 'Home Banner - Shaadibaraati';
		$this->load->view('home-banner/add-banner', $data, FALSE);
    }

    	/**
     * category -> insert category banner
     * insert new category into db
     * url : category-banner/insert
    **/
         //insert banner
// update banner
    public function update()
    {
       	 	$type = $this->input->post('type');
        	$position = $this->input->post('postion');
            $title  =   $this->input->post('ctitle');
            $url    =   $this->input->post('curl');

            $files = $_FILES;
	        if (file_exists($_FILES['img']['tmp_name'])) {
	            $config['upload_path'] = '../banner/';
	            $config['allowed_types'] = 'jpg|png|jpeg';
	            $config['max_width'] = 0;
	            $config['encrypt_name'] = true;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path'])) { mkdir($config['upload_path'], 0777, true); }
	            if (!$this->upload->do_upload('img')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('home-banner/add');
	            } else {
	                // echo "ok";exit();
	                $upload_data = $this->upload->data();
	                $config['image_library'] = 'gd2';
	                $config['source_image'] = $upload_data['full_path'];
	                $config['create_thumb'] = true;
	                $config['maintain_ratio'] = true;
	                $config['height'] = 250;
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
	                $file_name = $upload_data['file_name'];
	                $imgpath = 'banner/'.$file_name;
	            }
	        }
                $data = array(
                    'img'      => $imgpath,
                    'position' => $position
                );
            
        if($this->m_homban->updateBanner($data)){
            $this->session->set_flashdata('success', 'Banner update successfully');
            redirect('home-banner/add');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('home-banner/add');
        }
    }

    public function delete($value='')
    {
    	$id = $this->input->get('id');
    	if($this->m_homban->delete($id)){
            $this->session->set_flashdata('success', 'Banner deleted successfully');
            redirect('home-banner/add');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('home-banner/add');
        }
    }


}

/* End of file H_banner.php */
/* Location: ./application/controllers/H_banner.php */