<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		// native code :
		// select kelurahan .*, kecamatan.nama_kecamatan from kelurahan LEFT JOIN kecamatan on kecamatan.id_kelurahan = kelurahan.id_kelurahan
		$this->db->select('kelurahan.*,kecamatan.nama_kecamatan');
		$this->db->from('kelurahan');
		$this->db->join('kecamatan','kecamatan.id_kecamatan=kelurahan.id_kecamatan','LEFT');
		$this->db->order_by('nama_kecamatan','ASC');	
		$query = $this->db->get();
		return $query->result();
	}

	public function viewByKecamatan($id_kecamatan){
        $this->db->where('id_kecamatan', $id_kecamatan);
        $result = $this->db->get('kelurahan')->result(); // Tampilkan semua data kecamatan berdasarkan id kelurahan
        return $result; 
    }

	//jumlah kelurahan
	function jumlah_kelurahan(){
		$query = $this->db->query("SELECT * FROM kelurahan");
		$total = $query->num_rows();
		return $total;
	}

	//Detail
	public function detail($id_kelurahan)
	{
		$this->db->select('*');
		$this->db->from('kelurahan');
		$this->db->where('id_kelurahan',$id_kelurahan);
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('kelurahan',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_kelurahan', $data['id_kelurahan']);
		$this->db->update('kelurahan',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_kelurahan', $data['id_kelurahan']);
		$this->db->delete('kelurahan',$data);
	}
}

/* End of file Kelurahan_model.php */
/* Location: ./application/models/Kelurahan_model.php */