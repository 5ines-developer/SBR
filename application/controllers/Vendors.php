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
           $value->service          = $this->m_vendors->getService($value->id);
           $value->video          = $this->m_vendors->getVideo($value->id);
        }
        $data['vendor'] = $output;
        $data['title']  = $value->name.'- ShaadiBaraati';
        $this->load->view('vendors/detail', $data, FALSE);
    }


    public function gallery($value='')
    {
        $data='';
       $vndr_id =  $this->input->post('vndr_id');
      $output = $this->m_vendors->getGallery($vndr_id);

      foreach ($output as $key => $value) {
          $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
      }

       echo json_encode($data);
    }


    public function full_gallery($value='')
    {
        $data='';
        $vndr_id =  $this->input->post('vndr_id');
        $output = $this->m_vendors->full_gallery($vndr_id);
        foreach ($output as $key => $value) {
          $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
        }
       echo json_encode($data);
    }



    
}