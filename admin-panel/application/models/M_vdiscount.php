<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vdiscount extends CI_Model {


	public function getDiscount($value='')
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
		return $this->db->where('discount_status', '0')->get('vendor')->result();
	}

	public function status_change($id='',$status='')
	{
		return $this->db->where('id', $id)->update('vendor',array('discount_status' => $status));
	}

	public function getVendor($id='')
	{
		$query = $this->db->where('ve.id', $id)
				->select('ve.name,ve.email,pc.title as package,ad.email as adminMail,ad.manager')
				->from('vendor ve')
				->join('admin ad','ad.id = ve.added_by','left')
				->join('package pc','pc.id = ve.package','left')
				->get()->row();

				return $query;
	}

	public function getManager($id='')
	{
		return $this->db->select('email,name,phone,')->where('id', $id)->get('admin')->row();
	}


	public function invoiceInsert($insert='')
	{
		$query = $this->db->where('uniq_id', $insert['uniq_id'])->get('package_invoice');
		if ($query->num_rows() > 0) {
			return $this->db->where('uniq_id', $insert['uniq_id'])->get('package_invoice',$insert);
		}else{
			return $this->db->insert('package_invoice', $insert);
		}
	}
	

}

/* End of file m_vdiscount.php */
/* Location: ./application/models/m_vdiscount.php */