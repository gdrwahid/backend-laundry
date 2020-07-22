<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		$this->db->select('*');
 		$this->db->from('kategori');
 		$this->db->order_by('nama_kategori', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id)
 	{
 		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
 	}
 	
 	public function tambah($data)
 	{
 		$this->db->insert('kategori',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id', $data['id']); //where id -> yg didapat dari pelemparan id di form edit ke controller
		$this->db->update('kategori',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('kategori',$data);
	}
	

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */