<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		$this->db->select('customer.*, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan');
 		$this->db->from('customer');
 		$this->db->join('kecamatan','kecamatan.id_kecamatan=customer.id_kecamatan','LEFT');
 		$this->db->join('kelurahan','kelurahan.id_kelurahan=customer.id_kelurahan','LEFT');
 		$this->db->order_by('nama', 'ASC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id_customer)
 	{
 		$this->db->select('*');
		$this->db->from('customer');
		$this->db->join('kecamatan','kecamatan.id_kecamatan=customer.id_kecamatan','LEFT');
 		$this->db->join('kelurahan','kelurahan.id_kelurahan=customer.id_kelurahan','LEFT');
		$this->db->where('customer.id_customer',$id_customer);
		$query = $this->db->get();
		return $query->row();
 	}
 	
 	public function tambah($data)
 	{
 		$this->db->insert('customer',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id_customer', $data['id_customer']); //where id -> yg didapat dari pelemparan id di form edit ke controller
		$this->db->update('customer',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_customer', $data['id_customer']);
		$this->db->delete('customer',$data);
	}

 	// login
 	public function login($customername, $password)
 	{
 		$this->db->select('*');
 		$this->db->from('customer');
 		$this->db->where(array('customername'=>$customername,
 							   'password'=>md5($password)));
 		$query = $this->db->get();
 		return $query->row();
 	}
	

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */