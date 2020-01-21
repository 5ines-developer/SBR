<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Vendors_upgrade extends CI_Controller {

		/*--construct--*/
	    public function __construct()
	    {
	        parent::__construct();
	        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
	        $this->aid = $this->session->userdata('sha_id');
        	$this->type = $this->session->userdata('sha_type');
	        $this->load->model('m_vnupgrade');
	    }

	    /**
	     * Vendors -> upgrade vendors
	     * load view page
	     * url : vendors/my-vendors
	    **/		
		public function index($id='')
		{
			$filter = $this->input->get('f');
	        $data['title']   = 'Vendors - Shaadibaraati';
			$data['result']  = $this->m_vnupgrade->get_vendors($this->aid,$filter);
	        $this->load->view('sales/my-vendor', $data, FALSE);
		}



	    /**
	     * Vendors -> upgrade vendors
	     * load view page
	     * url : vendors/my-vendors
	    **/	
		public function upgrade($id='')
		{
			$data['title']   = 'Vendors - Shaadibaraati';
			$data['result']     = $this->m_vnupgrade->detail($id);
			$data['city']       = $this->m_vnupgrade->get_city();
			$data['category']   = $this->m_vnupgrade->get_category();
			$data['package']    = $this->m_vnupgrade->getPackage();
			$data['invoice']    = $this->m_vnupgrade->getInvoice($id);
			$data['employee']    = $this->m_vnupgrade->getEmployee();
			$this->load->view('sales/upgrade', $data, FALSE);
		}

		public function insertUpgrade($value='')
		{
			$insert = array(
            'vendor_id'       	=> $this->input->post('vid'),
            'v_city'            => $this->input->post('vcity'),
            'v_category'        => $this->input->post('vcategory'),
            'city_banner'       => $this->input->post('c_bnr'),
            'cat_banner'       	=> $this->input->post('cat_bnr'),
            'package'        	=> $this->input->post('vpackage'),
            'discount'      	=> $this->input->post('discount'),
            'lname'            	=> $this->input->post('l_name'),
            'lnumber'           => $this->input->post('ld_phone'),
            'ld_email'         	=> $this->input->post('ld_email'),
            'in_name'         	=> $this->input->post('i_name'),
            'city '          	=> $this->input->post('lcity'),
            'gstno'     		=> $this->input->post('gstno'),
            'laddress'   		=> $this->input->post('li_address'),
            'in_mobile'      	=> $this->input->post('i_mobile'),
            'in_email'          => $this->input->post('i_email'),
            'in_street'         => $this->input->post('str_addrs'),
            'in_city'        	=> $this->input->post('incity'),
            'state'        		=> $this->input->post('listate'),
            'postode'        	=> $this->input->post('postode'),
            'namopunt'        	=> $this->input->post('nt_amnt'),
            'gst'            	=> $this->input->post('gst_amount'),
            'total'            	=> $this->input->post('t_amnt'),
            'pay_mode'         	=> $this->input->post('pay_mode'),
            'or_id '      		=> $this->input->post('ord_id'),
            'pay_date'        	=> $this->input->post('pay_date'),
            'landline'        	=> $this->input->post('i_landl'),
            'rec_no'        	=> $this->input->post('rec_no'),
			'pan_no'        	=> $this->input->post('pan_no'),
			'dr_bank'        	=> $this->input->post('dr_bank'),
			'pay_type'        	=> $this->input->post('pay_type'),
			'pdc'        		=> $this->input->post('pdc'),
			'employee'        	=> $this->input->post('emp'),
			'manager'        	=> $this->input->post('mang'),
            'added_by'          => $this->aid,
            'started_from'      => date('Y-m-h'),
            'uniq'          	=> $this->input->post('uniq'),
        	);
			$data = $this->m_vnupgrade->insertProposal($insert);
			if (!empty($data)) {
				$insert['insert_id'] = $data;
				$this->convertPdf($insert);
				$this->session->set_flashdata('error','Something went wrong please try again later!');
				redirect('vendors/view-proposal/'.$data,'refresh');
			}else{
				$this->session->set_flashdata('error','Something went wrong please try again later!');
				redirect('vendors/upgrade/'.$insert['vendor_id'],'refresh');
			}
		}

		public function convertPdf($insert='')
		{
			
			$data['city'] = $this->db->where('id', $insert['v_city'])->get('city')->row('city');
			$data['category'] = $this->db->where('id', $insert['v_category'])->get('category')->row('category');
			$data['employee'] = $this->db->select('name as empname,admin_type,id as empid')->where('id', $insert['added_by'])->get('admin')->row();
			$data['result'] = $insert;
			$this->load->library('pdf');
			$html = $this->output->get_output($this->load->view('sales/proposal',$data));
			$pdf = $this->pdf->loadHtml($html);
			$this->pdf->setPaper('A3', 'Potrait');
			$this->pdf->render();
			// Output the generated PDF (1 = download and 0 = preview)
            // $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
			$fileName = random_string('alnum',10);
			file_put_contents('pdf/propsal-'.$fileName.'.pdf',$this->pdf->output());
			$pdfFile = 'pdf/propsal-'.$fileName.'.pdf';
			$this->send_sales($insert,$pdfFile);
		}

	public function send_sales($insert='',$pdfFile='')
    {

        $disc = $this->db->where('id', $this->aid)->get('admin')->row();
        $manager = $this->db->where('id', $disc->manager)->get('admin')->row('email');
        $this->load->config('email');
        $this->load->library('email');
        $to = $this->config->item('vr_to');
        $cc = $this->config->item('vr_cc');
        $from = $this->config->item('smtp_user');
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to('prathwi@5ine.in');
        // $this->email->cc($manager);
        $this->email->subject('Vendor Package proposal');
        $this->email->message('New Vendor Package proposal has been submitted , document attached');
        $this->email->attach($_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/admin-panel/'.$pdfFile);
        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'You request for adding discount for the vendors <br /> has been submitted to the Admin, admin will verify and approve your request ');
            redirect('vendors/view-proposal/'.$insert['insert_id'],'refresh');
        } else {
            $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
            redirect('vendors/upgrade/'.$insert['vendor_id'],'refresh');
        }        
	}
	

	public function newProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->newProposal($this->aid);
		$this->load->view('sales/new-proposal', $data, FALSE);
	}

	public function approvedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->approvedProposal($this->aid);
		$this->load->view('sales/approved-proposal', $data, FALSE);
	}

	public function rejectedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->rejectedProposal($this->aid);
		$this->load->view('sales/rejected-proposal', $data, FALSE);
	}


	public function view_proposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->view_proposal($this->aid,$id);

		if($this->type == '1'){
			$this->m_vnupgrade->seenChange($id);
		}
		$this->load->view('sales/view-proposal', $data, FALSE);
	}

	public function allProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->allProposal($this->aid,$id);
		$this->load->view('sales/all-proposal', $data, FALSE);
	}
	
	public function clearedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->clearedProposal($this->aid,$id);
		$this->load->view('sales/cleared-proposal', $data, FALSE);
	}

	public function liveProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->liveProposal($this->aid,$id);
		$this->load->view('sales/live-proposal', $data, FALSE);
	}


	/**
	 * vendor upgrade/renewal - get the package price
	 * calculate the price & discount automatically
	 * url : vendors/upgrade/(param=vendor id)
	**/		
	public function getPrice($value='')
	{
		$data = array();
		$package = $this->input->get('package');
		$output = $this->m_vnupgrade->packPrice($package); 
		$price = str_replace( ',', '', $output );
		$gst = (($price)* 18) / 100 ;
		$data['price'] = $price;
		$data['gst'] = $gst;
		echo json_encode($data);

	}
}
	
	/* End of file Vendors_upgrade.php */
	/* Location: ./application/controllers/Vendors_upgrade.php */	