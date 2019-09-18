<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_vendors');
		$this->load->model('m_home');
		$this->load->library('form_validation');
    }


    /**
     * vendors-> load view page
     * url : vendors
    **/
    public function detail($category="",$name="",$uniqid="")
    {
        $output = $this->m_vendors->getVendors($uniqid);
        foreach ($output as $key => $value) {
           $value->service     = $this->m_vendors->getService($value->id);
           $value->video       = $this->m_vendors->getVideo($value->id);
           $value->review      = $this->m_vendors->getReview($value->id);
           $value->fav         = $this->m_vendors->getFavourite($value->id);
           $value->faq         = $this->m_vendors->faq($value->id);
           $value->offer         = $this->m_vendors->offer($value->id);
        }

        $data['vendor'] = $output;
        $data['title']  = $value->name.'- ShaadiBaraati';
        $this->load->view('vendors/detail', $data, FALSE);
    }


    public function gallery($value='')
    {
        // $data ='';
       $vndr_id =  $this->input->post('vndr_id');
      $output = $this->m_vendors->getGallery($vndr_id);
      if(!empty($output)){
          foreach ($output as $key => $value) {
            $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
        }
      }else{
        $data = '';
      }
      
      

       echo json_encode($data);
    }


    public function full_gallery($value='')
    {
        $data = array();
        $vndr_id =  $this->input->post('vndr_id');
        $output = $this->m_vendors->full_gallery($vndr_id);
        if(!empty($output)){
          foreach ($output as $key => $value) {
            $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
          }
        }
        
       echo json_encode($data);
    }


    //check if the user logged in or not
    public function reviewSession($value='')
    {

      $user =  $this->session->userdata('shdid');
      if (!empty($user)) {
        echo "1";
      }else{
        echo "0";
      }
    }

    public function review_submit($value='')
    {

      $proffesional = $this->input->post('rev_proffesional');
        $quality      = $this->input->post('rev_quality');
        $service      = $this->input->post('rev_service');
        $money        = $this->input->post('rev_money');
        $experience   = $this->input->post('rev_experience');
        $description  = $this->input->post('rev_description');
        $rating       = $this->input->post('rev_rating');
        $vendorid     = $this->input->post('rev_vendor');
        $vendoruniq   = $this->input->post('vendoruniq');

        $user   = $this->m_vendors->getUser($this->session->userdata('shdid'));
        $vendor = $this->m_vendors->getVendors($vendoruniq);

        foreach ($vendor as $key => $value) {}

      $this->form_validation->set_rules('rev_description', 'Review', 'trim|required|min_length[15]', array('min_length[15]'=> 'Review description Should not be less than 15 character'));
      if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'detail/'.str_replace(" ","-",strtolower($value->category)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq,'refresh');
      }else{
        
        $insert = array(
          'proffesional'  => $proffesional, 
          'quality'       => $quality, 
          'service'       => $service, 
          'money'         => $money, 
          'experience'    => $experience, 
          'review'        => $description, 
          'vendor_id'     => $vendorid,
          'user_id'       => $user->su_id,
          'user_name'     => $user->su_name,
          'user_email'    => $user->su_email,
          'rating'        => $rating,
          'status'        =>  '1'
        );

          if($this->m_vendors->addReview($insert)){
               $this->session->set_flashdata('success', 'Review added Successfully');
               redirect(base_url().'detail/'.str_replace(" ","-",strtolower($value->category)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq,'refresh');
          }else{
                    $this->session->set_flashdata('error', 'Something went wrong please try again later!');
              redirect(base_url().'detail/'.str_replace(" ","-",strtolower($value->category)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq,'refresh');
          }
    }

  }


  public function makeFavourite($id='')
  {
      $user =  $this->session->userdata('shdid');
      if (!empty($user)) {

        $vndr_id = $this->input->post('vndr_id');
        $output = $this->m_vendors->makeFavourite($user,$vndr_id);
        echo $output; //1 if favourited , 3 if not performed anything, 0 not favourited
        
      }else{
        echo "5"; //not logged in
      }
  }


  public function getFavourite($value='')
  {
    $vndr_id = $this->input->post('vndr_id');
    $output  = $this->m_vendors->getFavourite($vndr_id);
    echo  $output;
  }


  public function enquireVendor($id='')
  {
        $name       =   $this->input->post('e_name');
        $email      =   $this->input->post('e_email');
        $mobile      =   $this->input->post('e_mobile');
        $fnDate     =   $this->input->post('fn_date');
        $guestNo    =   $this->input->post('guest_no');
        $rooms      =   $this->input->post('rooms');
        $fnType     =   $this->input->post('fn_type');
        $fnTime     =   $this->input->post('fn_time');
        $WedDetail  =   $this->input->post('wed_detail');
        $vendor_id  =   $this->input->post('vendor_id');
        $uniq       =   $this->input->post('uniq');

        $vendors = $this->m_vendors->getVendors($vendor_id);

        foreach ($vendors as $key => $value) { }

        $insert = array(
          'user_name'   =>  $name , 
          'user_email'  =>  $email , 
          'user_phone'  =>  $mobile , 
          'vendor_id'   =>  $vendor_id , 
          'fn_date'     =>  $fnDate , 
          'fn_type'     =>  $fnType , 
          'fn_time'     =>  $fnTime , 
          'guest_no'    =>  $guestNo , 
          'wed_detail'  =>  $WedDetail , 
          'category'    =>  $value->category , 
          'uniq'        =>  $uniq
        );

      $url = 'detail/'.str_replace(' ', '-', strtolower($value->category)).'/'.str_replace(' ', '-', strtolower($value->name)).'/'.$vendor_id;

        $data['output']  =  $this->m_vendors->addenquiry($insert);
        $data['result']  =  $insert;
        $data['value']    =   $value;

        

        if (!empty($data['output'])  && !empty($vendors)) {
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/vendor-enquiry', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to('prathwi@5ine.in');
            $this->email->subject('Vendor enquiry request-'.$value->name);
            $this->email->message($msg);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Your request has been submitted successfully, Our team will contact you soon.');
                redirect($url,'refresh');
            } else {
                $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
                redirect($url,'refresh');
            }
        }else{
              $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
              redirect($url,'refresh');
        } 
  }


  public function allCategory($id='')
  {
    $data['category']   = $this->m_vendors->getCategory();
    $this->load->view('vendors/all-category.php',$data);
  }




    
}