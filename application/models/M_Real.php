<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_real extends CI_Model
{

    

    /*
     *Real wedding-> get profile
     **/
    public function getProfile($per_page='',$page='')
    {
        $this->db->limit($per_page, $page);

        $query = $this->db->get('real_wed');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    public function getCount(Type $var = null)
    {
        $query = $this->db->get('real_wed');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }
    public function getGallery($rid)
    {
        $this->db->where('real_id',$rid);
        $query = $this->db->get('real_gallery');
        if(($query->num_rows()>0)){
            return $query->result();
        }else{
            return false;
        }
    }
    public function relatedWedding($id)
    {
        $this->db->where('id!=',$id);
        $this->db->limit(3); 
        $query = $this->db->get('real_wed');
        if(($query->num_rows()>0)){
            return $query->result();
        }else{
            return false;
        }
    }
   
}

/* End of file ModelName.php */
