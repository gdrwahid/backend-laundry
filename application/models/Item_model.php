<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

 	public function tampil()
 	{
 		// $this->db->select('*');
 		// $this->db->from('item');
 		$this->db->order_by('nama_item', 'ASC');
 		$query = $this->db->get('item');

 		return $query->result();
 	}

 	// public function tampil()
 	// {
 	// 	$query = $this->db->get('item');
 	// 	return $query->result();
 	// }

 	public function detail($id_item)
 	{	
 		$this->db->where('id_item',$id_item);
 		$query = $this->db->get('item');
 		return $query->row();
 	}

 	// public function detail($id_item)
 	// {
 	// 	$this->db->select('*');
		// $this->db->from('item');
		// $this->db->where('id_item',$id_item);
		// $query = $this->db->get();
		// return $query->row();
 	// }

 	
 	public function tambah($data)
 	{
 		$this->db->insert('item',$data);
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id_item', $data['id_item']); //where id_item -> yg did_itemapat dari pelemparan id_item di form edit ke controller
		$this->db->update('item',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_item', $data['id_item']);
		$this->db->delete('item',$data);
	}

}

/* End of file Item_model.php */
/* Location: ./application/models/Item_model.php */