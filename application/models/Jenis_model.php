<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {
	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		$this->db->select('*');
 		$this->db->from('jenis');
 		$this->db->order_by('nama_jenis', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id_jenis)
 	{
 		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->where('id_jenis',$id_jenis);
		$query = $this->db->get();
		return $query->row();
 	}

 	
 	public function tambah($data)
 	{
 		$this->db->insert('jenis',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']); //where id_jenis -> yg did_jenisapat dari pelemparan id_jenis di form edit ke controller
		$this->db->update('jenis',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']);
		$this->db->delete('jenis',$data);
	}
	

}

/* End of file Jenis_model.php */
/* Location: ./application/models/Jenis_model.php */