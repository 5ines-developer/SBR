<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adminusers extends CI_Model {

    /**
     * get all employees
     * **/ 
    public function getEmployees($var = null)
    {
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

}

/* End of file M_adminusers.php */
