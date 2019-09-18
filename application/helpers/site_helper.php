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



/* End of file LibraryName.php */
