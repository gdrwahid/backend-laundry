<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->order_by('nama_kecamatan','ASC');	
		$query = $this->db->get();
		return $query->result();
	}

	//jumlah kecamatan
	function jumlah_kecamatan(){
		$query = $this->db->query("SELECT * FROM kecamatan");
		$total = $query->num_rows();
		return $total;
	}

	//Detail
	public function detail($id_kecamatan)
	{
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->where('id_kecamatan',$id_kecamatan);
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('kecamatan',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_kecamatan', $data['id_kecamatan']);
		$this->db->update('kecamatan',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_kecamatan', $data['id_kecamatan']);
		$this->db->delete('kecamatan',$data);
	}
}

/* End of file Kecamatan_model.php */
/* Location: ./application/models/Kecamatan_model.php */