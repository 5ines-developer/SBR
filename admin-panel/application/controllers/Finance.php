<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	/*--construct--*/
	public function __construct()
	{
	    parent::__construct();
	    if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
	    $this->aid = $this->session->userdata('sha_id');
      	$this->type = $this->session->userdata('sha_type');
	    $this->load->model('m_finance');
	}

	public function newProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->newProposal($this->aid);
		$this->load->view('finance/new-proposal', $data, FALSE);
	}

	public function approvedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->approvedProposal($this->aid);
		$this->load->view('finance/approved-proposal', $data, FALSE);
	}

	public function rejectedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->rejectedProposal($this->aid);
		$this->load->view('finance/rejected-proposal', $data, FALSE);
	}


	public function view_proposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->view_proposal($this->aid,$id);

		if($this->type == '1'){
			$this->m_finance->seenChange($id);
		}
		$this->load->view('finance/view-proposal', $data, FALSE);
	}

	public function allProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->allProposal($this->aid,$id);
		$this->load->view('finance/all-proposal', $data, FALSE);
	}
	
	public function clearedProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->clearedProposal($this->aid,$id);
		$this->load->view('finance/cleared-proposal', $data, FALSE);
	}

	public function liveProposal($id = null)
	{
		$data['title']   = 'Vendors - Shaadibaraati';
		$data['result'] = $this->m_finance->liveProposal($this->aid,$id);
		$this->load->view('finance/live-proposal', $data, FALSE);
	}

	public function makeLive($id='')
	{
		if ($this->m_finance->makeLive($id)) {
			$this->session->set_flashdata('success', 'Proposal has been made live successfully');
		}else{
			$this->session->set_flashdata('error', 'Something went wrong please try again later!');
		}
		redirect('finance/approved-proposal','refresh');
	}

}

/* End of file Finance.php */
/* Location: ./application/controllers/Finance.php */