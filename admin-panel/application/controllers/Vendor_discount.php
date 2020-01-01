<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_discount extends CI_Controller {


		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_vdiscount');

        $this->aid = $this->session->userdata('sha_id');
        $this->type = $this->session->userdata('sha_type');
        $this->ci =& get_instance();


        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if(in_array("8", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }


	public function index()
	{
		$data['title']  = 'vendor Renewal | shaadibaraati';
		$data['result'] = $this->m_vdiscount->getDiscount();
		$this->load->view('vendors/discount', $data, FALSE);
	}

	public function approve($id='')
	{

        $data['result'] = $this->m_vdiscount->getVendor($id);
        $data['rpid'] = $id;
		$status = '1';
		// send to model
        if($this->m_vdiscount->status_change($id,$status)){
        	if($this->invoice($data))
            {
                $this->session->set_flashdata('success', 'Vendor discount request approved Successfully');
                redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
            }
       	}else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
       	}
		
	}

    public function invoice($data='')
    {
        
        $data['invoice'] = $this->m_vdiscount->getDiscount();
        $this->session->set_flashdata('success', 'Vendor discount request approved Successfully');
        $this->load->view('vendors/invoice_send',$data);
    }


    public function insert_invoice($value='')
    {
        $insert = array(
            'c_name'        => $this->input->post('c_name'), 
            'c_gstin'       => $this->input->post('c_gstin'), 
            'invoice_no'    => $this->input->post('invoice_no'), 
            'in_date'       => $this->input->post('in_date'), 
            'c_address'     => $this->input->post('c_address'), 
            'package'       => $this->input->post('package'), 
            'pa_cost'       => $this->input->post('pa_cost'), 
            'discount'      => $this->input->post('discount'), 
            'cgst'          => $this->input->post('cgst'), 
            'sgst'          => $this->input->post('sgst'), 
            'igst'          => $this->input->post('igst'), 
            'total'         => $this->input->post('total'), 
            'w_amount'      => $this->input->post('w_amount'), 
            'b_name'        => $this->input->post('b_name'), 
            'b_account'     => $this->input->post('b_account'), 
            'ifsc'          => $this->input->post('ifsc'), 
            'b_address'     => $this->input->post('b_address'), 
            'uniq_id'       => $this->input->post('uniq_id'), 
            'renewal_id'    => $this->input->post('rpid') 
        );

        // send to model
        if($this->m_vdiscount->invoiceInsert($insert)){

            $data['result'] = $insert;
            $this->load->library('pdf');
            // Get output html
            $html = $this->output->get_output($this->load->view('vendors/invoice',$data));
            $pdf = $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A3', 'Potrait');
            $this->pdf->render();
            // Output the generated PDF (1 = download and 0 = preview)
            // $this->pdf->stream("welcome.pdf", array("Attachment"=>1));
            $fileName = random_string('alnum',10);
            file_put_contents('pdf/invoice-'.$fileName.'.pdf',$this->pdf->output());
            $pdfFile = 'pdf/invoice-'.$fileName.'.pdf';
            $this->send_invoice($insert,$pdfFile);
            // if you are redirect to list of the data add controller name here
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }
    }



    public function send_invoice($data='',$pdfFile='')
    {

        $data['result'] = $data;
        $added = $this->db->select('vendor_id,added_by')->where('id', $data['renewal_id'])->get('renew_package')->row();
        $admin = $this->db->select('manager,email')->where('id', $added->added_by)->get('admin')->row();
        $vendor = $this->db->select('email')->where('id', $added->vendor_id)->get('vendor')->row();
        if (!empty($admin->manager)) {
            $data['manager'] = $this->m_vdiscount->getManager($admin->manager);
        }
        $this->load->config('email');
        $this->load->library('email');
        $to = $this->config->item('vr_to');
        $cc = $this->config->item('vr_cc');
        $from = $this->config->item('smtp_user');
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($vendor->email,$admin->email);
        if (!empty($data['manager'])) {
            $this->email->cc($data['manager']->email);
        }
        $msg = $this->load->view('email/discount_approve', $data, true);
        $this->email->subject('Vendor Package Invoice');
        $this->email->message($msg);
        $this->email->attach($_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/admin-panel/'.$pdfFile);
        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Successfully invoice sent to vendor');
           redirect('vendors-discount','refresh');
        } else {
            $this->session->set_flashdata('success', 'Successfully invoice sent to vendor');
           redirect('vendors-discount','refresh');
        }
        
    }




    public function sendreject($id='')
    {
        $data['result'] = $this->m_vdiscount->getVendor($id);
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/discount_reject', $data, true); 
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($data['result']->email);
        if ($this->type != '2') {
            $data['manager'] = $this->m_vdiscount->getManager($data['result']->manager);
            $this->email->cc($data['manager']->email);
        }
        $this->email->subject('Vendor Discount Request');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }


    public function reject($value='')
    {
        $status = '2';
        // send to model
        if($this->m_vdiscount->status_change($id,$status)){
            $this->sendreject($id);
            if ($this->type != '2') {
                $this->sendmanager($id);
            }
           $this->session->set_flashdata('success', 'Vendor discount request rejected Successfully');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }
    }







}

/* End of file Vendor_discount.php */
/* Location: ./application/controllers/Vendor_discount.php */