<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
    }


    /**
     * Category -> add Category
     * load view page
     * url : category/add
    **/
	public function index()
	{
		$data['title']  = 'Category - Shaadibaraati';
		$this->load->view('category/add-category', $data, FALSE);
	}

	/**
     * category -> insert category
     * insert new category into db
     * url : category/insert
    **/
	public function insert_category($value='')
	{

		$files = $_FILES;
        $filesCount = count($_FILES['image']['name']);
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../category-image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('cities/add');
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
                $imgpath = 'category-image/'.$file_name;

            }
        }


        $files1 = $_FILES;
        $filesCount = count($_FILES['icon']['name']);
        if (file_exists($_FILES['icon']['tmp_name'])) {
            $config['upload_path'] = '../category-icon/';
            $config['allowed_types'] = 'svg|SVG';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('icon')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('category/add');
            } else {
                // echo "ok";exit();
                $upload_data1 = $this->upload->data();
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $upload_data1['full_path'];
                $config1['create_thumb'] = true;
                $config1['maintain_ratio'] = true;
                $config1['height'] = 250;

                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();

                $file_name1 = $upload_data1['file_name'];
                $icnpath = 'category-icon/'.$file_name1;

            }
        }

        $insert =  array(
        	'image' => $imgpath,
        	'icon' => $icnpath,
        	'uniq' => $this->input->post('category_id'),
            'subtitle' => $this->input->post('subtitle'),
        	'category' => $this->input->post('category')
        );

			if($this->m_category->insert_category($insert))
			{
				$this->session->set_flashdata('success', 'category Added Successfully');
				redirect('category/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('category/add','refresh');
			}
		}

        /**
         * category -> delete city
         * url : cities/delete
         * @param : id
        */
        public function delete_category($id='')
        {
            // send to model
            if($this->m_category->delete_category($id)){
                $this->session->set_flashdata('success', 'category Deleted Successfully');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }
        }



	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function manage_category()
	{
		$data['title']  = 'category - Shaadibaraati';
		$data['result']  = $this->m_category->getcategory();
		$this->load->view('category/manage-category', $data, FALSE);
	}




    /**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_category($id='')
    {
        $data['result']  = $this->m_category->single_category($id);
        $data['title']   = $data['result']->category.' - Shaadibaraati';
        $this->load->view('category/edit-category', $data, FALSE);
    }


    	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function update_category($value='')
	{
		$files = $_FILES;
        $filesCount = count($_FILES['image']['name']);
		if (!empty($filesCount)) {
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../category-image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('category/add');
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
                $imgpath = 'category-image/'.$file_name;

            }
        }
        }

       
        $files1 = $_FILES;
        $filesCount1 = count($_FILES['icon']['name']);

         if (!empty($filesCount1)) {

        if (file_exists($_FILES['icon']['tmp_name'])) {
	            $config['upload_path'] = '../category-icon/';
	            $config['allowed_types'] = 'svg|SVG';
	            $config['max_width'] = 0;
	            $config['encrypt_name'] = true;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path'])) {
	                mkdir($config['upload_path'], 0777, true);
	            }

	            if (!$this->upload->do_upload('icon')) {
	                $error = array('error' => $this->upload->display_errors());
	                // print_r($error);exit();
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('category/add');
	            } else {
	                // echo "ok";exit();
	                $upload_data1 = $this->upload->data();
	                $config1['image_library'] = 'gd2';
	                $config1['source_image'] = $upload_data1['full_path'];
	                $config1['create_thumb'] = true;
	                $config1['maintain_ratio'] = true;
	                $config1['height'] = 250;

	                $this->load->library('image_lib', $config1);
	                $this->image_lib->resize();

	                $file_name1 = $upload_data1['file_name'];
	                $icnpath = 'category-icon/'.$file_name1;

	            }

        	}
        }

        $id = $this->input->post('city_id');

        $update =  array(
            'category' => $this->input->post('category'),
        	'subtitle' => $this->input->post('subtitle'),
        );

        if (!empty($imgpath)) {
        	$update['image'] = $imgpath;
        }
        if (!empty($icnpath)) {
        	$update['icon'] = $icnpath;
        }


			if($this->m_category->update_category($update,$id))
			{
				$this->session->set_flashdata('success', 'City Updated Successfully');
				redirect('category/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('category/edit/'.$id,'refresh');
			}
		}






}

/* End of file Cities.php */
/* Location: ./application/controllers/Cities.php */