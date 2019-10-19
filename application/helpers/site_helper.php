<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // protected $ci;
    
    
    if(!function_exists('vendor_category')) {
        function vendor_category() {
            $ci = get_instance();

            $ci->load->model('M_vendors');
            $category =  $ci->M_vendors->allcategory();
            return $category;
        }
    }

    if(!function_exists('cities')) {
        function cities() {
            $ci = get_instance();

            $ci->load->model('M_vendors');
            $cities =  $ci->M_vendors->allcities();
            return $cities;
        }
    }

       if(!function_exists('profile')) {
        function profile() {
            $ci = get_instance();

            $ci->load->model('M_vendorDetail');
            $profile =  $ci->M_vendorDetail->profileImg($ci->session->userdata('shvid'));
            return $profile;
        }
        }




/* End of file LibraryName.php */
