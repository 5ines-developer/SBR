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
			$output = $this->m_vnupgrade->checkUpgrade($id);
			if (!empty($output)) {
				$this->session->set_flashdata('error', 'You cannot upgrade this vendor, <br> package upgrade is already in process for this vendor.');
				redirect('vendors/manage','refresh');
			}else{
				$data['result']     = $this->m_vnupgrade->detail($id);
				$data['city']       = $this->m_vnupgrade->get_city();
				$data['category']   = $this->m_vnupgrade->get_category();
				$data['package']    = $this->m_vnupgrade->getPackage();
				$data['invoice']    = $this->m_vnupgrade->getInvoice($id);
				$data['employee']   = $this->m_vnupgrade->getEmployee();
				$this->load->view('sales/upgrade', $data, FALSE);
			}
		}

		public function insertUpgrade($value='')
		{
			$output = $this->m_vnupgrade->checkUpgrade($this->input->post('vid'));
			if (!empty($output)) {
				$this->session->set_flashdata('error', 'You cannot upgrade this vendor, <br> package upgrade is already in process for this vendor.');
				redirect('vendors/manage/'.$this->input->post('vid'),'refresh');
			}else{
				$insert = array(
	            'vendor_id'       	=> $this->input->post('vid'),
	            'v_city'            => $this->input->post('vcity'),
	            'v_category'        => $this->input->post('vcategory'),
	            'city_banner'       => $this->input->post('c_bnr'),
	            'cat_banner'       	=> $this->input->post('cat_bnr'),
	            'package'        	=> $this->input->post('vpackage'),
	            'invoice_name'     	=> $this->input->post('i_name'),
	            'gstno'      		=> $this->input->post('gstno'),
	            'listing_name'      => $this->input->post('l_name'),
	            'listing_mail'      => $this->input->post('ld_email'),
	            'listing_phone'    	=> $this->input->post('ld_phone'),
	            'invoice_address '  => $this->input->post('invoice_address'),
	            'ord_type'     		=> $this->input->post('ord_type'),
	            'c_person'   		=> $this->input->post('c_person'),
	            'alt_phone'      	=> $this->input->post('alt_phone'),
	            'list_city'         => $this->input->post('lcity'),
	            'tenure'         	=> $this->input->post('tenure'),
	            'nt_amnt'        	=> $this->input->post('nt_amnt'),
	            'discount'        	=> $this->input->post('discount'),
	            'gst_amount'        => $this->input->post('gst_amount'),
	            'amt_after_disc'    => $this->input->post('amt_after_disc'),
	            'tds'            	=> $this->input->post('tds'),
	            't_amnt'            => $this->input->post('t_amnt'),
	            'am_words'         	=> $this->input->post('am_words'),
	            'pay_mode '      	=> $this->input->post('pay_mode'),
	            'inst_no '      	=> $this->input->post('inst_no'),
	            'pay_date'        	=> $this->input->post('pay_date'),
	            'amount'        	=> $this->input->post('amount'),
	            'pdc_mode'        	=> $this->input->post('pdc_mode'),
				'pdc_instrmnt'      => $this->input->post('pdc_instrmnt'),
				'pdc_pay_date'      => $this->input->post('pdc_pay_date'),
				'pdc_amount'        => $this->input->post('pdc_amount'),
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
		}

		public function convertPdf($insert='')
		{

			$data['city'] = $this->db->where('id', $insert['v_city'])->get('city')->row('city');
			$data['category'] = $this->db->where('id', $insert['v_category'])->get('category')->row('category');
			$data['employee'] = $this->db->select('name as empname,admin_type,id as empid')->where('id', $insert['added_by'])->get('admin')->row();
			$data['result'] = $insert;
			require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
			    'format' => [190, 236],
			    'orientation' => 'L'
			]);
			$html = $this->load->view('sales/proposal', $data, TRUE);
	        $mpdf->WriteHTML($html);
	        $content = $mpdf->Output('', 'S');
        	$filename = "vendor-propsal".random_string('alnum',10).".pdf";
        	$this->send_sales($insert,$content,$filename);
		}

	public function send_sales($insert='',$content='',$filename='')
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
        // $this->email->to($to,$insert['listing_mail']);
        // $this->email->cc($manager,$cc);

        $this->email->subject('Vendor Package proposal');
        $this->email->message('New Vendor Package proposal has been submitted , document attached');
        $this->email->attach($content, 'attachment', $filename, 'application/pdf'); 
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
		$data['title']  = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->view_proposal($this->aid,$id);
		$data['emp'] 	= $this->m_vnupgrade->employ($data['result']['employee'],$data['result']['manager']);
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

	public function viewProps($id='')
	{
		$data['title']  = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_vnupgrade->view_proposal($this->aid,$id);
		$data['emp'] 	= $this->m_vnupgrade->employ($data['result']['employee'],$data['result']['manager']);
		if($this->type == '1'){
			$this->m_vnupgrade->seenChange($id);
		}
		$this->load->view('sales/proposal-detail', $data, FALSE);
	}

	public function downloads($id='')
	{
		$data['result'] = $this->m_vnupgrade->view_proposal($this->aid,$id);
		require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
			    'format' => [190, 236],
			    'orientation' => 'L'
			]);
			$html = $this->load->view('sales/proposal', $data, TRUE);
			$pdfFilePath ="vendor-propsal-".date('Y-m-h')."-.pdf";
	        $mpdf->WriteHTML($html);
	        $mpdf->Output($pdfFilePath, "D");
	}
}
	
	/* End of file Vendors_upgrade.php */
	/* Location: ./application/controllers/Vendors_upgrade.php */	