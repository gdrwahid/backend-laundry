<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

  var $id_pesan_satuan='';
  var $id_customer='';
  var $id_paket='';
  var $id_item='';
  var $jumlah_item='';
  var $tgl_masuk='';
  var $tgl_keluar='';

	public function __construct()
 	{
 		parent::__construct();
	 	$this->load->database();
 	}

	public function totalblnini(){
		$totalbulanini = $this->db->query("SELECT SUM(total_harga) as total FROM pemesanan WHERE month(tgl_masuk)='".date('m')."'")->row_array();
		$totalblnini = $totalbulanini['total'];
		return $totalblnini;
	}

 	public function tampil()
 	{
 		$this->db->select('pemesanan.*, customer.nama, jenis.nama_jenis, jenis.harga as harga_jenis, paket.nama_paket, paket.harga as harga_paket');
 		$this->db->from('pemesanan');
 		$this->db->join('customer','customer.id_customer=pemesanan.id_customer','LEFT');
 		$this->db->join('jenis','jenis.id_jenis=pemesanan.id_jenis','LEFT');
 		$this->db->join('paket','paket.id_paket=pemesanan.id_paket','LEFT');
 		$this->db->order_by('id_pemesanan', 'DESC');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function detail($id_pemesanan)
 	{
 		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where('id_pemesanan',$id_pemesanan);
		$query = $this->db->get();
		return $query->row();
 	}

 	
 	public function tambah($data)
 	{
 		$this->db->insert('pemesanan',$data);
 	}

 	public function tambahSatuan()
 	{
 		 return $this->db->insert('pesan_satuan',array(

          'id_customer'=>$this->id_customer,
          'id_paket'=>$this->id_paket,
          'id_item'=>$this->id_item,
          'jumlah_item'=>$this->jumlah_item,
          'total_harga' => $this->total_harga,
          'tgl_masuk' => $this->tgl_masuk,
          'tgl_keluar' => $this->tgl_keluar

      ));
 	}

 	// Update data
	public function edit($data)
	{
		$this->db->where('id_pemesanan', $data['id_pemesanan']);
		$this->db->update('pemesanan',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_pemesanan', $data['id_pemesanan']);
		$this->db->delete('pemesanan',$data);
	}

}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */