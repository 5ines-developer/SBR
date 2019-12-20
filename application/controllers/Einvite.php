<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Einvite extends CI_Controller {
    public function einvite_dashboard()
    {
        $data['title']  = 'ShaadiBaraati | Dashboard';
        $this->load->view('einvite/e-dashboard',$data);
    }
    public function manage_user()
    {
        $data['title']  = 'ShaadiBaraati | Manage User';
        $this->load->view('einvite/manage-user',$data);
    }
    public function wedding_event()
    {
        $data['title']  = 'ShaadiBaraati | Wedding Event';
        $this->load->view('einvite/wedding-event',$data);
    }
    public function family_member()
    {
        $data['title']  = 'ShaadiBaraati | Family Member';
        $this->load->view('einvite/family-member',$data);
    }
}


/* End of file Einvitet.php */
/* Location: ./application/controllers/Einvite.php */