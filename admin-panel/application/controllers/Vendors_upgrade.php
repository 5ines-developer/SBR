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

				$balance = 0;
				if (!empty($data['invoice']) && $data['invoice']->live =='1') {
					if (!empty($data['invoice']->tenure)) {
			            $validity = (int)$data['invoice']->tenure + (int)(!empty($data['invoice']->add_mon)?$data['invoice']->add_mon:'0');
			            $amnt = (int)$data['invoice']->t_amnt/(int)$validity;
			            $date_diff=strtotime(date('Y-m-d'))-strtotime($data['invoice']->started_from);
			            $months = floor(($date_diff)/2628000);
			            if ($months > 0) {
			            	$bal = $months * $amnt;
			            	$balance = round((int)$data['invoice']->t_amnt - (int)$bal);
			            }elseif ($months == '0') {
			            	$balance = $data['invoice']->t_amnt;
			            }
			        }
				}
				$data['balance'] 	= $balance;
				$data['employee']   = $this->m_vnupgrade->getEmployee();
				$data['banner']   	= $this->m_vnupgrade->getBanner();
				$this->load->view('sales/upgrade', $data, FALSE);
			}
		}

		public function insertUpgrade($value='')
		{
			$output = $this->m_vnupgrade->checkUpgrade($this->input->post('vid'));
			if (!empty($output)) {
				$this->session->set_flashdata('error', 'You cannot upgrade this vendor, <br> package upgrade is already in process for this vendor.');
				redirect('vendors/manage/','refresh');
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
	            'pay_mode '      	=> $this->input->post('pay_mode'),
	            'inst_no '      	=> $this->input->post('inst_no'),
	            'pay_date'        	=> $this->input->post('pay_date'),
	            'amount'        	=> $this->input->post('amount'),
				'employee'        	=> $this->input->post('emp'),
				'manager'        	=> $this->input->post('mang'),
				'bran_mang'        	=> $this->input->post('bran_mang'),
				'nation_head'       => $this->input->post('nation_head'),
				'telecaller'        => $this->input->post('telecaller'),
	            'added_by'          => $this->aid,
	            'started_from'      => date('Y-m-h'),
	            'uniq'          	=> $this->input->post('uniq'),
	            'ban_pack'			=> $this->input->post('ban_pack'),
	            'add_mon'			=> $this->input->post('addMon'),
	            'balance'			=> $this->input->post('balance'),
	        	);


	        	$pdc_mode      = $this->input->post('pdc_mode');
				$pdc_instrmnt  = $this->input->post('pdc_instrmnt');
				$pdc_pay_date  = $this->input->post('pdc_pay_date');
				$pdc_amount    = $this->input->post('pdc_amount');

				$data = $this->m_vnupgrade->insertProposal($insert);
				if (!empty($data)) {
					$insert['insert_id'] = $data;
					if (!empty($pdc_mode)) { 
					$pdccount = count($pdc_mode);
	            	for ($i = 0; $i < $pdccount; $i++) {
	            		$pdcDetails  = array('mode' =>$pdc_mode[$i] , 'date' =>$pdc_pay_date[$i] ,'instrument' =>$pdc_instrmnt[$i] ,'amount' =>$pdc_amount[$i],'rp_id'=>$data);
	            		$this->m_vnupgrade->insertPdc($pdcDetails);
		            	$pdcresult[]  = array('mode' =>$pdc_mode[$i] , 'date' =>$pdc_pay_date[$i] ,'instrument' =>$pdc_instrmnt[$i] ,'amount' =>$pdc_amount[$i] );
	            	}
	            	}

					$this->convertPdf($insert,$pdcresult);
					$this->session->set_flashdata('success','vendor proposal submitted successfully!');
					redirect('vendors/view-proposal/'.$data,'refresh');
				}else{
					$this->session->set_flashdata('error','Something went wrong please try again later!');
					redirect('vendors/manage/','refresh');
				}
			}
		}

		public function convertPdf($insert='',$pdcresult='')
		{
			$data['city'] = $this->db->where('id', $insert['v_city'])->get('city')->row('city');
			$data['category'] = $this->db->where('id', $insert['v_category'])->get('category')->row('category');
			$data['employee'] = $this->db->select('name as empname,admin_type,id as empid')->where('id', $insert['added_by'])->get('admin')->row();
			$data['result'] = $insert;
			$data['pdcresult'] = $pdcresult;
			require_once $_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/vendor-pdf/autoload.php';
			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
			    'format' => 'A4',
			    // 'orientation' => 'L',
			    'margin_top' => 10,
				'margin_left' => 10,
				'margin_right' => 10,
				'margin_bottom' => 10,
				'default_font_size' => 9,
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
        $this->email->cc($manager);
        $this->email->to($to,$insert['listing_mail']);
        $this->email->cc($manager,$cc);
        $this->email->subject('Vendor Package proposal');
        $this->email->message('New Vendor Package proposal has been submitted , document attached');
        $this->email->attach($content, 'attachment', $filename, 'application/pdf'); 
        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'You request for adding discount for the vendors <br /> has been submitted to the Admin, admin will verify and approve your request ');
            redirect('vendors/view-proposal/'.$insert['insert_id'],'refresh');
        } else {
            $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
            redirect('vendors/new-proposal','refresh');
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
		$data['pdcresult'] = $this->m_vnupgrade->getPdc($id);
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
		$data['pdcresult'] = $this->m_vnupgrade->getPdc($id);
		$data['emp'] 	= $this->m_vnupgrade->employ($data['result']['employee'],$data['result']['manager']);
		if($this->type == '1'){
			$this->m_vnupgrade->seenChange($id);
		}
		$this->load->view('sales/proposal-detail', $data, FALSE);
	}

	public function downloads($id='')
	{
		$data['result'] = $this->m_vnupgrade->view_proposal($this->aid,$id);
		$data['pdcresult'] = $this->m_vnupgrade->getPdc($id);
		// require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/vendor-pdf/autoload.php';
			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
			    'format' => 'A4',
			    // 'orientation' => 'L',
			    'margin_top' => 10,
				'margin_left' => 10,
				'margin_right' => 10,
				'margin_bottom' => 10,
				'default_font_size' => 9,
			]);
			$html = $this->load->view('sales/proposal', $data, TRUE);
			$pdfFilePath ="vendor-propsal-".date('Y-m-h H:i:s')."-.pdf";
	        $mpdf->WriteHTML($html);
	        $mpdf->Output($pdfFilePath, "D");
	}

	public function editProposal($id='')
	{
		$data['result']     = $this->m_vnupgrade->editProposal($id);
		$data['pdcresult']  = $this->m_vnupgrade->getPdc($id);
		$data['city']       = $this->m_vnupgrade->get_city();
		$data['category']   = $this->m_vnupgrade->get_category();
		$data['package']    = $this->m_vnupgrade->getPackage();
		$data['employee']   = $this->m_vnupgrade->getEmployee();
		$data['banner']   	= $this->m_vnupgrade->getBanner();
		$this->load->view('sales/editPropsal', $data, FALSE);
	}


	public function updateUpgrade($value='')
		{

			$id = $this->input->post('id');
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
	            'pay_mode '      	=> $this->input->post('pay_mode'),
	            'inst_no '      	=> $this->input->post('inst_no'),
	            'pay_date'        	=> $this->input->post('pay_date'),
	            'amount'        	=> $this->input->post('amount'),
				'employee'        	=> $this->input->post('emp'),
				'manager'        	=> $this->input->post('mang'),
				'bran_mang'        	=> $this->input->post('bran_mang'),
				'nation_head'       => $this->input->post('nation_head'),
				'telecaller'        => $this->input->post('telecaller'),
	            'added_by'          => $this->aid,
	            'started_from'      => date('Y-m-h'),
	            'uniq'          	=> $this->input->post('uniq'),
	            'ban_pack'			=> $this->input->post('ban_pack'),
	        	);

	        	$pdc_mode      = $this->input->post('pdc_mode');
				$pdc_instrmnt  = $this->input->post('pdc_instrmnt');
				$pdc_pay_date  = $this->input->post('pdc_pay_date');
				$pdc_amount    = $this->input->post('pdc_amount');

				$data = $this->m_vnupgrade->updateUpgrade($insert,$id);
				if (!empty($data)) {
					if (!empty($pdc_mode)) {
						$this->db->where('rp_id', $id)->delete('rp_pdc');
						$pdccount = count($pdc_mode);
		            	for ($i = 0; $i < $pdccount; $i++) {
		            		$pdcDetails  = array('mode' =>$pdc_mode[$i] , 'date' =>$pdc_pay_date[$i] ,'instrument' =>$pdc_instrmnt[$i] ,'amount' =>$pdc_amount[$i],'rp_id'=>$id);
		            		$this->m_vnupgrade->insertPdc($pdcDetails);
		            	}
	            	}
					$this->session->set_flashdata('success','Vendor proposal updated successfully.');
				}else{
					$this->session->set_flashdata('error','Something went wrong please try again later!');
				}
				redirect('vendors/edit-proposal/'.$id,'refresh');
		}
}
	
	/* End of file Vendors_upgrade.php */
	/* Location: ./application/controllers/Vendors_upgrade.php */	