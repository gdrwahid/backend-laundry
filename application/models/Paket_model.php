<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {
	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		$this->db->select('*');
 		$this->db->from('paket');
 		$this->db->order_by('nama_paket', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id_paket)
 	{
 		$this->db->select('*');
		$this->db->from('paket');
		$this->db->where('id_paket',$id_paket);
		$query = $this->db->get();
		return $query->row();
 	}
 	
 	public function tambah($data)
 	{
 		$this->db->insert('paket',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id_paket', $data['id_paket']); //where id_paket -> yg did_paketapat dari pelemparan id_paket di form edit ke controller
		$this->db->update('paket',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_paket', $data['id_paket']);
		$this->db->delete('paket',$data);
	}
	

}

/* End of file Paket_model.php */
/* Location: ./application/models/Paket_model.php */