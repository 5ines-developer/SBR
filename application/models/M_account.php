<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {

	    // get profile detail
    public function account($uid)
    {
        return $this->db->where('su_id', $uid)->get('user')->row();
    }

        //  update profile
    public function updateProfile($insert, $uid)
    {
        $this->db->where('su_id', $uid)->where('su_email', $insert['su_email'])->update('user', $insert);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }    
    }

    // get the profile pic
    public function profile_pic($uid='')
    {
    	return$this->db->select('su_profile_file,su_name')->where('su_id', $uid)->get('user')->row();
    }


	

}

/* End of file M_account.php */
/* Location: ./application/models/M_account.php */