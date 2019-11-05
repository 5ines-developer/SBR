<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class preload
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_preload');
        
    }

    public function testimonial()
    {
        return  $this->ci->m_preload->testimonial();
    }

    public function feedback()
    {
        return  $this->ci->m_preload->feedback();
    }

    public function bypackage()
    {
        return  $this->ci->m_preload->bypackage();
    }

    public function access()
    {
        return  $this->ci->m_preload->getaccess();
    }

}

/* End of file LibraryName.php */
