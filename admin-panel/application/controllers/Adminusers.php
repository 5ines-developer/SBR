<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->aid = $this->session->userdata('sha_id');
        $this->load->model('m_adminusers');
    }

    /**
     * manage employees
     * @url : employees 
     **/ 
    public function index($id='')
    {

        $data['title']  = 'Emplpoyee - Shaadibaraati';
        $data['result'] = $this->m_adminusers->getEmployees();     
        $this->load->view('employee/manage', $data, FALSE);  
    }

    /**
     * add employees
     * @url : employees/add
    **/ 
    public function add($var = null)
    {
        $data['title']  = 'Emplpoyee - Shaadibaraati';
        $data['manager'] = $this->m_adminusers->getManager();
        $data['menues'] = $this->m_adminusers->getMenu();
        $this->load->view('employee/add', $data, FALSE); 
    }


    /**
     * add employees
     * @url : employees/insert
    **/ 
    public function insert($value='')
    {
        $this->form_validation->set_rules('name', 'Username', 'required|is_unique[admin.name]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[admin.email]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.')); 
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('employees/add');
        }else{

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('phone');
            $type       =   $this->input->post('Ad_type');
            $ref_id     =   $this->input->post('ref_id');
            $manager    =   $this->input->post('manager');
            $menu       =   $this->input->post('menu');
            $discount   =   $this->input->post('discount');

            $mens='';
            foreach ($menu as $menus => $men) {
               $mens .= $men.',';               
            }           

            $insert = array(
                'name'          =>  $name,
                'email'         =>  $email,
                'is_active'     =>  '0',
                'phone'         =>  $phone,
                'reference_d'   =>  $ref_id,
                'admin_type'    =>  $type,
                'added_by'      =>  $this->aid ,
                'manager'       =>  $manager,
                'discount'      =>  $discount,
                'menu'          =>  substr($mens,0,-1) ,
            );
            $result = $this->m_adminusers->insert($insert);
            if(!empty($result)){
                $this->userEmail($insert);
                $this->session->set_flashdata('success', 'Employee added Successfully');
               redirect('employees');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('employees/add');
            }

        }


    }


    function userEmail($insert='')
    {
        $data['result'] = $insert;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');        
        $msg = $this->load->view('email/adminusers', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'Rajahousing');
        $this->email->to($data['result']['email']);
        $this->email->subject('Registration verification'); 
        $this->email->message($msg);
        if($this->email->send())  
        { 
            return true;
        } 
        else
        {
            return false;
        }
        
    }

    


    public function edit($id = null)
    {
        $data['result'] = $this->m_adminusers->singleEmp($id);
        $data['manager'] = $this->m_adminusers->getManager();
        $data['menues'] = $this->m_adminusers->getMenu(); 
        $this->load->view('employee/edit', $data, FALSE); 
    }


    public function update($value='')
    {
        $id = $this->input->post('id');  

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('phone');
            $type       =   $this->input->post('Ad_type');
            $manager    =   $this->input->post('manager');
            $menu       =   $this->input->post('menu');
            $discount   =   $this->input->post('discount');
            

            $mens='';
            foreach ($menu as $menus => $men) {
               $mens .= $men.',';               
            }           

            $update = array(
                'name'          =>  $name,
                'email'         =>  $email,
                'phone'         =>  $phone,
                'admin_type'    =>  $type,
                'added_by'      =>  $this->aid ,
                'manager'       =>  $manager,
                'discount'      =>  $discount,
                'menu'          =>  substr($mens,0,-1) ,
            );

            
           
            
            $result = $this->m_adminusers->update($update,$id);
            if(!empty($result)){
                $this->session->set_flashdata('success', 'Employee Updated Successfully');
                redirect('employees/edit/'.$id);
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('employees/edit/'.$id);
            }



    }
}

/* End of file Controllername.php */
