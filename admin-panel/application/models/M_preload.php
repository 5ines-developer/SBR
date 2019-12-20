<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_preload extends CI_Model {

    public function testimonial()
    {
        return $this->db->where('status', '3')->get('feedback')->num_rows();
    }
    
    public function feedback()
    {
        return $this->db->where('status', '2')->get('user_feedback')->num_rows();
    }

    public function bypackage()
    {
    	return $this->db->where('status', '0')->get('v_buypackage')->num_rows();
    }

    public function getaccess()
    {
        $aid =  $this->session->userdata('sha_id');
        return $this->db->where('id',$aid)->get('admin')->row();
    }

    public function getDisccount()
    {
        if ($this->session->userdata('sha_type') == '2' ) {
            $addedby = $this->db->select('id')->where('manager',$this->session->userdata('sha_id'))->get('admin')->result();
            foreach ($addedby as $key ) {
                $val[] = $key->id;
            }
            $this->db->group_start();
                $this->db->where_in('added_by',$val);
            $this->db->group_end();
        }
        return $this->db->where('discount_status', '0')->get('vendor')->num_rows();
    }

    public function newProposal($value='')
    {
        return $this->db->where('rp.added_by', $this->session->userdata('sha_id'))
        ->where('rp.seen !=',1)
        ->where('rp.approved !=',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }
    

    public function approvedProposal($value='')
    {
        return $this->db->where('rp.added_by', $this->session->userdata('sha_id'))
        ->where('rp.seen !=',1)
        ->where('rp.approved',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function rejectProposal($value='')
    {
        return $this->db->where('rp.added_by', $this->session->userdata('sha_id'))
        ->where('rp.status', '2')
		->where('rp.approved !=',1)
		->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function allProposal($value='')
    {
        return $this->db->from('renew_package rp')
        ->get()->result();
    }

    public function payProposal($value='')
    {
        return $this->db->where('rp.approved',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function liveProposal($value='')
    {
        return $this->db->where('rp.live',1)
        ->from('renew_package rp')
        ->get()->result();
    }
}

/* End of file m_preload.php */
