<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    /*
     *Home-> get cities
     **/
    public function getCity($var = null)
    {

        $query = $this->db->get('city');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    /*
     *Home-> get Category
     **/
    public function getCategory($var = null)
    {

        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    //vue js phone check exist or not
    public function email_check($email = '')
    {
        $this->db->where('email', $email);
        $result = $this->db->get('newsletter');
        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //newsletter subscribe
    public function subscribe($email = null)
    {
        
        $this->db->where('email !=', $email);
        $this->db->insert('newsletter', array('email' => $email));
        if ($this->db->affected_rows() > 0 ) {
            return true;
        }else{
            return false;
        }
    }

    //get user
    public function getuser($id='')
    {
       return $this->db->where('su_id', $id)->get('user')->row_array();
    }

    public function addenquiry($insert='')
    {
        $this->db->where('uniq', $insert['uniq']);
        $query = $this->db->get('contact');
        if ($query->num_rows() > 0) {
            $this->db->where('uniq',$insert['uniq']);
            $this->db->update('contact', $insert);
            if ($this->db->affected_rows() > 0) {
               return true;
            }else{
                return false;
            }
        }else{
            return $this->db->insert('contact', $insert);
        }
    }

}

/* End of file ModelName.php */
