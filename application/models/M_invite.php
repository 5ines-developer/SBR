<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invite extends CI_Model {

	// insert theme
	public function themeinsert($insert='')
	{
		
		$result = $this->db->where('user_id', $insert['user_id'])->where('status',0)->get('einvite')->row();
		if (!empty($result)) {
			return $this->db->where('user_id', $insert['user_id'])->where('status',0)->update('einvite',$insert);
		}else{
			return $this->db->insert('einvite', $insert);
		}
	}

	// get theme
	public function getThemeselect($value='')
	{
		return $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('theme');
	}

	public function brdeGroom($value='')
	{
		return $this->db->select('groom,bride')->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row();
	}

	public function getEvents($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		$query = $this->db->where('invite_id',$result)->get('einvite_event')->result();
		return $query;
	}

	public function eventInsert($insert='')
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('status',0)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			$query = $this->db->where('invite_id',$result)->get('einvite_event')->result();
			if ((count($query)) < 2) {
				if($this->db->insert('einvite_event', $insert))
				{
					return $query;
				}else{
					return false;
				}
			}else{
				return $query;
			}
			
		}else{
			return false;
		}
	}

	public function getfamily($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invite_family')->result();
	}

	public function familyInsert($insert='')
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('status',0)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			if($this->db->insert('e_invite_family', $insert))
			{
				return $this->db->where('invite_id',$result)->get('e_invite_family')->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function insertGallery($insert='')
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('status',0)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			if($this->db->insert('e_invitegallery', $insert)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function getGlary($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invitegallery')->result();
	}

	public function getWebsite($user_id='')
	{
		return $this->db->where('user_id', $user_id)->where('status',1)->get('einvite')->result();
	}

	public function myWebsite($id='')
	{
		return $this->db->where('id', $id)->where('status',1)->get('einvite')->row();
	}

	public function getGallery($id='')
	{
		return $this->db->where('invite_id',$id)->get('e_invitegallery')->result();
	}

	public function getEvent($id='')
	{
		return $this->db->where('invite_id',$id)->get('einvite_event')->result();
	}

	public function getFam($id='')
	{
		return $this->db->where('invite_id',$id)->get('e_invite_family')->result();
	}




	

}

/* End of file M_invite.php */
/* Location: ./application/models/M_invite.php */