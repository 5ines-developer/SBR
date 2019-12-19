<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Einvite extends CI_Controller {
    public function einvite_dashboard()
    {
        $data['title']  = 'ShaadiBaraati | Dashboard';
        $this->load->view('einvite/e-dashboard',$data);
    }
}


/* End of file Einvitet.php */
/* Location: ./application/controllers/Einvite.php */