<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

    		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_leads');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();        
        $this->acces = explode (",", $accs->menu);      

    }

    public function index()
    {
        $data['category']   = $this->m_leads->getCategory();
        $data['city']       = $this->m_leads->getCity();
        $this->load->view('leads/lead-assign', $data, FALSE);        
    }


    public function getvendors($var = null)
    {
        $output     = '';
        $city        = $this->input->get('city');
        $category    = $this->input->get('category');
        $v_type      = $this->input->get('v_type');
        $data['vendors']    = $this->m_leads->getVendors($city,$category,$v_type); 
        if (!empty($data['vendors'])) {
           foreach ($data['vendors'] as $key => $value) {
            $output .=  '<p>
                    <label>
                    <input type="checkbox" class="filled-in" value="'.$value->vid.'" name="vendor[]"/>
                    <span>'.$value->name.'</span>
                    </label>
                    &nbsp;&nbsp;&nbsp;<span> - '.($this->m_leads->getleadcount($value->vid,$value->lvn_name) .'/'.$value->leads).'</span>
                </p>';               
           }           
        }
        echo $output; 
    }

    public function lead_insert($var = null)
    {
        $name       = $this->input->post('name');
        $email      = $this->input->post('email');
        $phone      = $this->input->post('phone');
        $budget     = $this->input->post('budget');
        $message    = $this->input->post('message');
        $city       = $this->input->post('city');
        $category   = $this->input->post('category');
        $vendor     = $this->input->post('vendor');
        

        for($i=0; $i < count($vendor); $i++ ){

            $insert = array(
                'name'      => $name, 
                'email'     => $email,  
                'phone'     => $phone,  
                'budget'    => $budget,  
                'message'   => $message, 
                'city'      => $city,  
                'category'  => $category,  
                'vendor_id' => $vendor[$i],  
            ); 
            if($this->m_leads->lead_insert($insert))
            {
                $output = $this->mailSend($insert);
            }   
        }

        if (!empty($output)) {
            $this->session->set_flashdata('succes','sucessfully Leads assigned to vendors!'); 
        }else{
            $this->session->set_flashdata('error','Something went wrong <br> Please try again later!');
        }
        redirect('leads','refresh');  
    }


    public function mailSend($insert = null)
    {
            $data['cit']    = $this->db->where('id',$insert['city'])->get('city')->row('city');
            $data['categ']  = $this->db->where('id',$insert['category'])->get('category')->row('category');      
            $data['vendo']  = $this->db->select('name,email')->where('id',$insert['vendor_id'])->get('vendor')->row();      
            $data['result'] = $insert;
            $this->load->config('email');
            $this->load->library('email');            
            $to = $data['vendo']->email;
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/leads', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to($to);
            $this->email->subject('Leads');
            $this->email->message($msg);
            if ($this->email->send()) {
                return true;
            } else {
                return false;
            }
        
    }


    public function manage($id = '')
    {
        $data['title'] = 'Leads - Shaadibaraati';
        $data['result'] = $this->m_leads->getLeads(); 
        $this->load->view('leads/manage', $data, FALSE);        
    }


}

/* End of file Controllername.php */
