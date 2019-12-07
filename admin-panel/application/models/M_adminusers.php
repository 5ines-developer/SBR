<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adminusers extends CI_Model {

    /**
     * get all employees
     * **/ 
    public function getEmployees($var = null)
    {
        if ($this->session->userdata('sha_type') == '2') {
            $this->db->where('manager', $this->session->userdata('sha_id'));
        }
        $this->db->where('id !=', $this->session->userdata('sha_id'));
        return $this->db->where('admin_type !=', '1')->get('admin')->result();        
    }

    /**
     * get all Subadmins/manager
     * **/ 
    public function getManager(Type $var = null)
    {
        return $this->db->where('admin_type', '2')->get('admin')->result();  
    }

    /**
     * get all menues
     * **/ 
    public function getMenu(Type $var = null)
    {
        return $this->db->get('menus')->result();
    }

    /**
     *insert employee 
     * **/ 
    public function insert($insert = null)
    {
        $query = $this->db->where('reference_d', $insert['reference_d'])->get('admin')->result();
        if(!empty($query)){
            return $this->db->where('reference_d', $insert['reference_d'])->update('admin',$insert);
        }else{
            return $this->db->insert('admin',$insert);
        }      
        
    }

    /**
     *get single employee 
     * **/ 
    public function singleEmp($id = null)
    {
        return $this->db->where('id', $id)->get('admin')->row();        
    }

    public function update($update='',$id='')
    {
        $query = $this->db->where('id', $id)->get('admin')->result();
        if(!empty($query)){
            return $this->db->where('id', $id)->update('admin',$update);
        }else{
            return $this->db->insert('admin',$update);
        } 
    }

    public function delete($id='')
    {
        return $this->db->where('id', $id)->delete('admin');
    }

    public function block($id='',$status='')
    {
        $this->db->where('id', $id);
        $this->db->set('is_active', $status);
        $this->db->update('admin');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

        //  account activation
    public function activateAccount($regid='', $newRegid='',$regmail='')
    {
        $this->db->where('reference_d', $regid);
        $this->db->where('email', $regmail);
        $result = $this->db->get('admin');
        if($result->num_rows() > 0){
            $this->db->where('reference_d', $regid);
            $this->db->where('email', $regmail);
            $this->db->update('admin', array('reference_d' => $newRegid, 'is_active' => '1', 'updated_date' => date('Y-m-d H:i:s')));
            if($this->db->affected_rows() > 0){
            return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function setPassword($datas, $remail,$id)
    {
        $this->db->where('reference_d', $id);
        $this->db->where('email', $remail);
        $this->db->update('admin', $datas);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function reset_pass($pass='',$eid='')
    {
        return $this->db->where('id', $eid)->update('admin',array('password' => $pass ));
    }

}

/* End of file M_adminusers.php */
