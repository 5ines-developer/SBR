<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {

	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function getcategory($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('category')->result();
	}

	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function insert_category($insert)
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) 
		{
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('category', $insert);
		}
		else
		{
			return $this->db->insert('category',$insert);
		}
    }



    /**
    * Users -> delete users
    * delete single user from db
    * url : users/delete/id
    * @param : id
    */
    public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('category');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_category($id='')
	{
		$this->db->where('id', $id);
		$query =  $this->db->get('category');

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_category($update,$id)
	{

		$this->db->where('id', $id);
		$this->db->update('category', $update);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	
	

}