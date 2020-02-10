<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_report');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        // if (in_array("2", $acces))
        // {
        //     $this->access = true;

        // }else{
        //     $this->access = null;
        // }
        // if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }



	public function index()
	{
		$data['title'] = 'Sales Report | Shaadibaraati';
		$data['result'] = $this->m_report->saleReport();
        $this->load->view('report/sales.php', $data, FALSE);
	}


    public function leads($value='')
    {
        $data['title'] = 'Leads Report | Shaadibaraati';
        $data['result'] = $this->m_report->vendorGet();
        $this->load->view('report/leads.php', $data, FALSE);
    }


    public function visitors($value='')
    {
        $startdate     = date('Y-m-d H:i:s',strtotime(date('Y-01-01')));
        $data['title'] = 'Leads Report | Shaadibaraati';
        $data['result'] = $this->m_report->visitors($startdate);
        $this->load->view('report/visitors.php', $data, FALSE);
    }

    public function employee($value='')
    {
        $startdate     = date('Y-m-d H:i:s',strtotime(date('Y-01-01')));
        $data['title'] = 'Leads Report | Shaadibaraati';
        $data['result'] = $this->m_report->employee();
        $this->load->view('report/employee.php', $data, FALSE);
    }

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */