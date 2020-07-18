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
        
        if(in_array("13", $acces))
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
        $update = array('status' => $status,'approved' =>$status);

		// send to model
        if($this->m_vdiscount->status_change($id,$update)){
            $this->session->set_flashdata('success', 'Vendor discount request approved Successfully');
            redirect('vendors-discount','refresh');
       	}else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh');
       	}
	}

    public function invoice($id='')
    {
        $data['result'] = $this->m_vdiscount->getVendor($id);
        $data['rpid'] = $id;
        $data['invoice'] = $this->m_vdiscount->getDiscount($data['rpid']);
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
            'pay_mode'      => $this->input->post('pay_mode'), 
            'inst_no'       => $this->input->post('inst_no'), 
            'pay_date'      => $this->input->post('pay_date'), 
            'amount'        => $this->input->post('amount'), 
            'uniq_id'       => $this->input->post('uniq_id'), 
            'renewal_id'    => $this->input->post('rpid') 
        );

        $data['price'] = $this->m_vdiscount->prices($insert['renewal_id']);

        // send to model
        if($this->m_vdiscount->invoiceInsert($insert)){

            $data['result'] = $insert;

            require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
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
            $html = $this->load->view('vendors/invoice', $data, TRUE);
            $mpdf->WriteHTML($html);
            $content = $mpdf->Output('', 'S');
            $filename = "vendor-propsal".random_string('alnum',10).".pdf";
            $pdfFile = 'pdf/invoice-'.$filename.'.pdf';
            $this->send_invoice($insert,$content,$pdfFile);
            // if you are redirect to list of the data add controller name here
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }
    }

    public function invoiceDownload($id='')
    {
        $data['result'] = $this->m_vdiscount->invoiceDownload($this->aid,$id);
        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
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
        $html = $this->load->view('vendors/invoiceDownload', $data, TRUE);
        $pdfFilePath ="vendor-invoice-".date('Y-m-h H:i:s')."-.pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, "D");
    }



    public function send_invoice($data='',$content,$pdfFile='')
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
        // $this->email->to('prathwi@5ine.in');
        $this->email->to($vendor->email,$admin->email,$to);
        if (!empty($data['manager'])) {
            $this->email->cc($data['manager']->email);
        }
        $msg = $this->load->view('email/discount_approve', $data, true);
        $this->email->subject('Vendor Package Invoice');
        $this->email->message($msg);
        $this->email->attach($content, 'attachment', $pdfFile, 'application/pdf');
        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Successfully invoice sent to vendor');
           redirect('vendors-discount','refresh');
        } else {
            $this->session->set_flashdata('success', 'Successfully invoice sent to vendor');
           redirect('vendors-discount','refresh');
        }
        
    }

    public function reject($id='')
    {
        
        $status = '2';
        $update = array('status' => $status,'approved' =>$status,'live' =>0,'reject_reson' => $this->input->post('reason'));
        // send to model
        if($this->m_vdiscount->status_change($id,$update)){
            $this->sendreject($id);
            // if ($this->type != '2') {
            //     $this->sendmanager($id);
            // }
           $this->session->set_flashdata('success', 'Vendor discount request rejected Successfully');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
           redirect('vendors-discount','refresh'); // if you are redirect to list of the data add controller name here
        }
    }

    public function sendreject($id='')
    {
        $data['result'] = $this->m_vdiscount->getVendor($id);

        $added = $this->db->select('vendor_id,added_by')->where('id', $id)->get('renew_package')->row();
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
        $msg = $this->load->view('email/discount_reject', $data, true); 
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($data['result']->email,$to);
        if (!empty($data['manager'])) {
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

    public function make_live($id='')
    {
        $validity= '';
        $valid = $this->m_vdiscount->getTenure($id);
        if (!empty($valid->tenure)) {
            $validity = $valid->tenure + (!empty($valid->add_mon)?$valid->add_mon:'');
        }
        $validity = date('Y-m-d', strtotime("+".$validity." months", strtotime(date('Y-m-d'))));
        
        $this->load->model('m_finance');
        if ($this->m_finance->makeLive($id,$validity)) {
            $this->session->set_flashdata('success', 'Proposal has been made live successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later!');
        }
        redirect('vendors/view-proposal/'.$id,'refresh');
    }








}

/* End of file Vendor_discount.php */
/* Location: ./application/controllers/Vendor_discount.php */