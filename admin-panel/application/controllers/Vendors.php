<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_vendors');

        $this->aid = $this->session->userdata('sha_id');
        $this->type = $this->session->userdata('sha_type');


        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("14", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }


    }


    /**
     * Vendors -> add Vendors
     * load view page
     * url : vendors/add
    **/
	public function index()
	{
		$data['title']    = 'vendors - Shaadibaraati';
		$data['category'] = $this->m_vendors->get_category();
        $data['city']     = $this->m_vendors->get_city();
		$data['package']  = $this->m_vendors->getPackage();
		$this->load->view('vendors/add-vendor', $data, FALSE);
	}

	/**
     * Vendors -> insert Vendors
     * insert new Vendors into db
     * url : vendors/insert
    **/
	public function insert_vendors($value='')
	{
        $vid = $this->input->post('vid');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        
        $this->db->where('email', $email); if (!empty($vid)) { $this->db->where('id !=', $vid); } $vemail = $this->db->get('vendor')->row('email');
        if (!empty($vemail)) 
        {
            $this->session->set_flashdata('error', 'Email id already exist! , please try again with different one');
            if (!empty($vid)) {
                redirect('vendors/edit/'.$vid);
            }else{
                redirect('vendors/add');
            }
        }

        $this->db->where('phone', $phone); if (!empty($vid)) { $this->db->where('id !=', $vid); } $vphone = $this->db->get('vendor')->row('phone');
        if (!empty($vphone)) {
            $this->session->set_flashdata('error', 'Phone number already exist! , please try again with different one');
            if (!empty($vid)) {
                redirect('vendors/edit/'.$vid);
            }else{
                redirect('vendors/add');
            }
        }

        if (empty($vphone) && empty($vemail)) {
                $this->load->library('upload');
                $this->load->library('image_lib');
                $files = $_FILES;
                $filesCount = count($_FILES['vimage']['name']);
                if (file_exists($_FILES['vimage']['tmp_name'])) {
                    $config['upload_path'] = '../vendors-profile/';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
                    $config['max_size'] = '2048';
                    $config['max_width'] = 0;
                    $config['encrypt_name'] = true;
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if (!is_dir($config['upload_path'])) {
                        mkdir($config['upload_path'], 0777, true);
                    }

                    if (!$this->upload->do_upload('vimage')) {
                        $error = array('error' => $this->upload->display_errors());
                        // print_r($error);exit();
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        if (!empty($vid)) {
                            redirect('vendors/edit/'.$vid);
                        }else{
                            redirect('vendors/add');
                        }
                        
                    } else {
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
                    }
                }

                $name       = $this->input->post('name');
                $email      = $this->input->post('email');
                $phone      = $this->input->post('phone');
                $price      = $this->input->post('price');
                $category   = $this->input->post('category');
                $city       = $this->input->post('city');
                $edit       = $this->input->post('edit');
                $uniq       = $this->input->post('uniq');
                $price_for  = $this->input->post('price_for');
                $discount   = $this->input->post('discount');
                $dissatus   = $this->input->post('dissatus');



                        $insert =  array(
                            'name'          =>  $name , 
                            'phone'         =>  $phone , 
                            'email'         =>  $email , 
                            'category'      =>  $category , 
                            'reference_id'  =>  random_string('alnum','20') , 
                            'is_active'     =>  '1' ,
                            'uniq'          =>  $uniq,
                            'city'          =>  $city,
                            'price'         =>  $price,
                            'price_for'     =>  $price_for,
                            'package'       =>  $this->input->post('package'),
                            'address'       =>  $this->input->post('address'),
                            'discount'      =>  $discount,
                        );

                        if (!empty($imgpath)) {
                            $insert['profile_file'] =  $imgpath; 
                            $insert['img']          = $file_name;
                        }
                        if (!empty($dissatus)) {
                            $insert['discount_status'] = '1';
                        }

                        if (!empty($edit)) {
                           $e = 'Updated';
                        }else{
                           $insert['added_by'] = $this->session->userdata('sha_id');
                            $e = 'Added';
                        }



                        $output = $this->m_vendors->insert_vendor($insert);
                        if(!empty($output))
                        {
                            $insert['out'] = $output;
                            if ($this->type != '1' && (!empty($dissatus))) {
                                $this->dicountCheck($insert);
                            }
                            
                            $this->session->set_flashdata('success', 'Vendor '.$e.' Successfully');
                            if (!empty($vid)) {
                                redirect('vendors/edit/'.$vid);
                            }else{
                                redirect('vendors/edit/'.$output,'refresh');
                            }
                            
                        }else{
                            $this->session->set_flashdata('error', 'Something went wrong please try again!');
                            if (!empty($vid)) {
                                redirect('vendors/edit/'.$vid);
                            }else{
                                redirect('vendors/add');
                            }
                        }
        } 
    }


    public function dicountCheck($insert='')
    {
        if(!empty($insert['discount'])){
           $disc = $this->db->where('id', $this->aid)->get('admin')->row(); 
           if ($insert['discount'] <= $disc->discount ) {
                return $this->db->where('uniq', $insert['uniq'])->update('vendor',array('discount_status' => '1'));
           }else{
                    $manager = $this->db->where('id', $disc->manager)->get('admin')->row();
                if ($this->type != '2') { 
                    if ($insert['discount'] <= $manager->discount ) {
                        $this->discountMail($manager,$insert,$disc);
                    }else{                        
                        $this->discountAdmin($manager,$insert,$disc);
                    }
                    
                }else{
                    $this->discountAdmin($manager,$insert,$disc);
                }
           }
       }
    }


    public function proposal($value='')
    {
        $this->load->view('vendors/proposals');
    }

    public function convertpdf($value='')
    {

        // echo $_SERVER["DOCUMENT_ROOT"];
        
        $this->load->view('vendors/proposals');
            // Get output html
        $html = $this->output->get_output();
        
        $this->load->library('pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
    }


    public function discountMail($manager='',$insert='',$disc)
    {
            $data['result']     = $insert;
            $data['emp']        = $disc;
            $data['manager']    = $manager;
            $this->load->config('email');
            $this->load->library('email');
            $to = $this->config->item('vr_to');
            $cc = $this->config->item('vr_cc');
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/discount', $data, true);            
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to($manager->email);
            $this->email->subject('Vendor Discount Request');
            $this->email->message($msg);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'You request for adding discount for the vendors <br /> has been submitted to the Manager, Manager will verify and approve your request ');
                redirect('vendors/edit/'.$insert['out'],'refresh');
            } else {
                $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
               redirect('vendors/edit/'.$insert['out'],'refresh');
            }
    }

    public function discountAdmin($manager='',$insert='',$disc)
    {
            $data['result']     = $insert;
            $data['emp']        = $disc;
            $data['manager']    = $manager;
            $this->load->config('email');
            $this->load->library('email');
            $to = $this->config->item('vr_to');
            $cc = $this->config->item('vr_cc');
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/discount-admin', $data, true); 
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to($to);
            $this->email->cc($cc);
            $this->email->subject('Vendor Discount Request');
            $this->email->message($msg);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'You request for adding discount for the vendors <br /> has been submitted to the Admin, admin will verify and approve your request ');
                redirect('vendors/edit/'.$insert['out'],'refresh');
            } else {
                $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
                redirect('vendors/edit/'.$insert['out'],'refresh');
            }
    }



    /**
     * vendors -> manage vendors
     * get all vendors detail and display in table
     * url : vendors/manage
    **/
    public function manage_vendors($id='')
    {
        $filter = $this->input->get('f');
        $data['result']  = $this->m_vendors->get_vendors($id,$filter);
        $data['title']   = 'Vendors - Shaadibaraati';
        $this->load->view('vendors/manage-vendor', $data, FALSE);
    }


    /**
    * vendors -> block and unblock vendors
    * url : vendors/block/id
    * @param : id
    */
    public function block_vendor($id='')
    {
       $id      = $this->input->get('id');
       $status  = $this->input->get('status');
       $output  = $this->m_vendors->block_vendor($id,$status);
       echo $output;
    }



	/**
    * vendors -> get single vendor
    * get single vendors detail and display
    * url : vendors/detail/id
    * @param : id
    */
    public function detail($id='')
    {
        $data['result']     = $this->m_vendors->detail($id);
        $data['enquiry']    = $this->m_vendors->vendorEnquiry($data['result']->uniq);
        $data['port']       = $this->m_vendors->get_portfolio($id);
        $data['video']       = $this->m_vendors->get_video($id);
        $data['review']     = $this->m_vendors->vendor_review($id);
        $data['offer']     = $this->m_vendors->vendor_offer($id);
        $data['title']      = $data['result']->name.' - Shaadibaraati';
        $data['title']      = 'Detail Vendor - Shaadibaraati';
        $this->load->view('vendors/view-vendor', $data, FALSE);
    }




    /**
    * vendors -> edit single vendor
    * get single vendors detail and edit the details
    * url : vendors/edit/id
    * @param : id
    */
    public function edit($id='')
    {
        $data['result']     = $this->m_vendors->detail($id);
        $data['category']   = $this->m_vendors->get_category();
        $data['city']       = $this->m_vendors->get_city();
        $data['service']    = $this->m_vendors->get_service($data['result']->category);
        $data['vendor_info']= $this->m_vendors->vendor_info($id);
        $data['faq']        = $this->m_vendors->vendor_faq($id);
        $data['vendor_faq'] = $this->m_vendors->get_faq($data['result']->category);
        $data['port']       = $this->m_vendors->get_portfolio($id);
        $data['video']      = $this->m_vendors->get_video($id);
        $data['package']  = $this->m_vendors->getPackage();
        $data['title']      = $data['result']->name.' - Shaadibaraati';
        $this->load->view('vendors/edit-vendor', $data, FALSE);
    }


    /**
    * vendors -> insert vendor about detail
    * insert single vendor about us detail
    * url : vendor/insert_about
    * @param : id
    */
    public function insert_about($id='')
    {
        $id = $this->input->post('id');
           $about       =  $this->input->post('about');          

           $insert = array(
            'detail'        => $about            
           );

            $output = $this->m_vendors->insert_about($insert,$id);
            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor details Updated Successfully');
                redirect('vendors/edit/'.$id);
            }else{
                $this->session->set_flashdata('error', 'Something went wrong please try again!');
                redirect('vendors/edit/'.$id);
            }
    }

    public function gallery_delete($id = '',$vendor='')
    {
                 // send to model
                 if($this->m_vendors->gallery_delete($id)){
                    $this->session->set_flashdata('success', 'Vendor portfolio Deleted Successfully');
                    redirect('vendors/edit/'.$vendor,'refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('vendors/edit/'.$vendor,'refresh'); // if you are redirect to list of the data add controller name here
                }
    }

    public function video_delete($id = '',$vendor='')
    {
                 // send to model
                 if($this->m_vendors->video_delete($id)){
                    $this->session->set_flashdata('success', 'Vendor Video Deleted Successfully');
                    redirect('vendors/edit/'.$vendor,'refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('vendors/edit/'.$vendor,'refresh'); // if you are redirect to list of the data add controller name here
                }
    }



    
    /**
    * vendors -> insert vendor portfolio images
    * insert single vendor portfolio images
    * url : vendor/portfolio_insert
    * @param : id
    */
    public function portfolio_insert($value='')
    {

        $this->load->library('upload');
        $this->load->library('image_lib');

        $files = $_FILES;
        $id = $this->input->post('id');
        $filesCount = count($_FILES['images']['name']);

        if ($filesCount > 30) {
            $this->session->set_flashdata('error', 'Maximum you can add 30 files!');
            redirect('vendors/edit/'.$id);
        }



        if (!empty($filesCount)) {
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['images']['name']     = $files['images']['name'][$i];
            $_FILES['images']['type']     = $files['images']['type'][$i];
            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
            $_FILES['images']['error']    = $files['images']['error'][$i];
            $_FILES['images']['size']     = $files['images']['size'][$i];
            
            $config['upload_path']   = '../vendor-portfolio/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width']     = 0;
            $config['encrypt_name']  = TRUE;
            $config['max_size'] = '2048';
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path']))
                mkdir($config['upload_path'], 0777, TRUE);
            
            if (!$this->upload->do_upload('images')) {
               $error =  $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('vendors/edit/'.$id);
            } else {
                
                $upload_data = $this->upload->data();
                $image[] = $upload_data['file_name'];
                
                $width  = 700;
                $height = 400;

                $file_name = $upload_data['file_name'];
                $imgpath = 'vendor-portfolio/'.$file_name;
                
                // $thumbnail = $this->thumbnail($upload_data, $width, $height);
                $watermark = $this->watermark($upload_data,$file_name);
                $insert = array (
                    'path'          => $imgpath,
                    'image'         => $file_name,
                    'thumb_image'   => $file_name, 
                    'vendor_id'     => $id,
                );

                $output = $this->m_vendors->insert_portfolio($insert);
            }
        }

            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor portfolio added Successfully');
                redirect('vendors/edit/'.$id,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong please try again!');
                  redirect('vendors/edit/'.$id,'refresh');
            }
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again!');
            redirect('vendors/edit/'.$id);
        }
    }


    public function watermark($upload_data = " ",$thumbnail)
    {     
        $this->load->library('upload');
        $this->load->library('image_lib');

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
            $this->image_lib->watermark();

    }


    public function thumbnail($upload_data = "", $width = "", $height = "")
    {
        $this->load->library('image_lib');
        $config_manip = array(
            'image_library'  => 'gd2',
            'source_image'   => $upload_data['full_path'],
            'maintain_ratio' => FALSE,
            'create_thumb'   => TRUE,
            'width'          =>  $width,
            'height'         => $height
        );
        
        $this->image_lib->initialize($config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $file_name[]  = $upload_data['file_name'];
        $file_tumb    = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file    = $file_tumb . '_thumb' . $file_tumb_ex;
        return $thum_file;


    }


        /**
         * vendors -> delete vendors
         * url : vendors/delete/id
         * @param : id
        */
        public function delete($id='')
        {
            // send to model
            if($this->m_vendors->delete($id)){
                $this->session->set_flashdata('success', 'Vendor Deleted Successfully');
                redirect('vendors/manage','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('vendors/manage','refresh'); // if you are redirect to list of the data add controller name here
            }
        }

        public function service($value='')
        {
           $id  = $this->input->post('id');
           $service  = $this->input->post('serv');
           $subtitle  = $this->input->post('sr_subtitle');

           $this->m_vendors->deletService($id);          

           for ($i=0; $i < count($service) ; $i++) { 

            if (!empty($subtitle[$i])) {
                $insert = array('vendor_id' => $id, 'information_id' => $service[$i],'subtitle'=>$subtitle[$i]);
                $output[] = $this->m_vendors->service($insert);
            }             

            }



            if(!empty($output[0]))
            {
                $this->session->set_flashdata('success', 'vendor Services added Successfully');
                redirect('vendors/edit/'.$id,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try again later.');
               redirect('vendors/edit/'.$id,'refresh');
            }
        }

    /**
     * vendors -> add video link
     * url : vendors/add-video
    */
    public function add_video($value='')
    {
            $id             = $this->input->post('id');
            $vd_category    = $this->input->post('vd_category');
            $youtube        = $this->input->post('vd_link');
            $fb             = $this->input->post('vdfb_link');

            if ($vd_category == '1') {
               $link = $youtube;
            }else if($vd_category == '2'){
                $link = $fb;
            }

            $insert = array(
                'type'      => $vd_category, 
                'link'      => $link, 
                'vendor_id' => $id,
            );

            $output = $this->m_vendors->add_video($insert);

            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor video link added Successfully');
                redirect('vendors/edit/'.$id,'refresh');
            }else{
                $this->session->set_flashdata('error', 'You have already added 6 videos of this vendor please delete the existing video and try again!');
               redirect('vendors/edit/'.$id,'refresh');
            }
    }

    public function faq_insert()
    {
        $qtn = $this->input->post('quation');
        $ans = $this->input->post('asw');
        $posts = $this->input->post();
        $id =  $this->input->post('id');
        $fa_id =  $this->input->post('fa_id');

        $this->m_vendors->delfaq($id);
        foreach ($ans as $key => $value) {
            if(!empty($ans[$key]) && !empty($qtn[$key])){
                $data = array(
                    'quotation' => $qtn[$key], 
                    'asw' => $ans[$key],
                    'vendor_id' => $id,
                    'fq_id' => $fa_id[$key]
                );

                $this->m_vendors->faq_insert($data);
            }
        }
        // vendor_faq
        $this->session->set_flashdata('success', 'FAQ added Successfully');
        redirect('vendors/edit/'.$id,'refresh');
        
    }


    public function reviewupdate($id='')
    {
       $id = $this->input->post('id');
       $review = $this->input->post('revw');
       $vendid = $this->input->post('vendid');
            $output = $this->m_vendors->updateReview($id,$review,$vendid);

            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor review updated Successfully');
                redirect('vendors/view/'.$vendid,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong Please try again!');
               redirect('vendors/view/'.$vendid,'refresh');
            }
    }

    public function reviewdelete($id='',$vendid='')
    {
            if($this->m_vendors->reviewdelete($id)){
                $this->session->set_flashdata('success', 'Vendor review Deleted Successfully');
                redirect('vendors/view/'.$vendid,'refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('vendors/view/'.$vendid,'refresh'); // if you are redirect to list of the data add controller name here
            }
    }

    public function offer_insert($value='')
    {
        $id = $this->input->post('id');

                $files = $_FILES;
                    $config['upload_path']      = '../offer-image/';
                    $config['allowed_types']    = 'jpg|png|jpeg|gif';
                    $config['max_width']        = 0;
                    $config['max_size']         = '2048';
                    $config['encrypt_name']     = true;
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if (!is_dir($config['upload_path'])) {
                        mkdir($config['upload_path'], 0777, true);
                    }

                    if (!$this->upload->do_upload('offimage')) {
                        $error = array('error' => $this->upload->display_errors());
                        // print_r($error);exit();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                         redirect('vendors/edit/'.$id,'refresh');
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
                        $imgpath = 'offer-image/'.$file_name;
                }


                $insert =  array(
                    'image'       =>  $imgpath , 
                    'vendor_id'      =>  $id , 
                );
            $output = $this->m_vendors->offer_image($insert);
            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor offer image added Successfully');
                redirect('vendors/edit/'.$id,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try again later.');
               redirect('vendors/edit/'.$id,'refresh');
            }
        

    }








}

/* End of file Vendors.php */
/* Location: ./application/controllers/Vendors.php */