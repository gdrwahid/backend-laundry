<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
 	
 	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		$this->db->select('*');
 		$this->db->from('user');
 		$this->db->order_by('nama', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id)
 	{
 		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
 	}
 	
 	public function tambah($data)
 	{
 		$this->db->insert('user',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id', $data['id']); //where id -> yg didapat dari pelemparan id di form edit ke controller
		$this->db->update('user',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('user',$data);
	}

 	// login
 	public function login($username, $password)
 	{
 		$this->db->select('*');
 		$this->db->from('user');
 		$this->db->where(array('username'=>$username,
 							   'password'=>md5($password)));
 		$query = $this->db->get();
 		return $query->row();
 	}
	
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */