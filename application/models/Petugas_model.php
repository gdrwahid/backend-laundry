<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	// login
 	public function loginkurir($email_petugas, $pass_petugas)
 	{
 		$this->db->select('*');
 		$this->db->from('petugas');
 		$this->db->where(array('email_petugas'=>$email_petugas,
 							   'pass_petugas'=>md5($pass_petugas),
 							   'level_petugas' => 'Kurir'));
 		$query = $this->db->get();
 		return $query->row();
 	}

 	//jumlah
	function jumlah_kurir(){
		$query = $this->db->query("SELECT * FROM petugas WHERE level_petugas = 'Kurir'");
		$total = $query->num_rows();
		return $total;
	}

	function jumlah_pencuci(){
		$query = $this->db->query("SELECT * FROM petugas WHERE level_petugas = 'Pencuci'");
		$total = $query->num_rows();
		return $total;
	}

 	public function tampil()
 	{
 		$this->db->select('*');
 		$this->db->from('petugas');
 		$this->db->order_by('nama', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id)
 	{
 		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
 	}
 	
 	public function tambah($data)
 	{
 		$this->db->insert('petugas',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id', $data['id']); //where id -> yg didapat dari pelemparan id di form edit ke controller
		$this->db->update('petugas',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('petugas',$data);
	}

}

/* End of file Petugas_model.php */
/* Location: ./application/models/Petugas_model.php */