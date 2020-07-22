<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('pemesanan_model','pemesanan');
 		$this->load->model('customer_model','customer');
 		$this->load->model('jenis_model','jenis');
 		$this->load->model('paket_model','paket');
 		$this->load->model('item_model','item');
 	}

	public function index()
	{
		$pemesanan = $this->pemesanan->tampil();
		$data = array('title' => 'Data Pemesanan ('.count($pemesanan).')',
					  'pemesanan' => $pemesanan,
					  'isi' => 'kurir/pemesanan/list'
					 );
		$this->load->view('kurir/layout/wrapper', $data);
	}


	public function tambah()
	{
		$customer = $this->customer->tampil();
		$jenis = $this->jenis->tampil();
		$paket = $this->paket->tampil();
		$item = $this->item->tampil();
		$customer2 = $this->customer->tampil();
		$paket2 = $this->paket->tampil();
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('id_customer','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));
		$valid->set_rules('id_jenis','Jenis','required',
			array(
				'required' => 'Jenis harus diisi'
			));
		$valid->set_rules('id_paket','Paket','required',
			array(
				'required' => 'Paket harus diisi'
			));

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Pemesanan',
					  'customer' => $customer,
					  'jenis' => $jenis,
					  'item' => $item,
					  'paket' => $paket,
					  'customer2' => $customer2,
					  'paket2' => $paket2,
					  'isi' => 'kurir/pemesanan/tambah'
					 );
		$this->load->view('kurir/layout/wrapper', $data);
		}else{	

			
			// ambil field harga berdasarkan id paket yg ada di view
			$id_paket = $this->input->post('id_paket');			
			$paket1 = $this->db->get_where('paket', ['id_paket'=> $id_paket ])->row_array();
			$lama_proses = $paket1['lama_proses'];
			// ambil field harga dan lama_proses berdasarkan id paket  yg ada di view
			
			$tgl_masuk = date('Y-m-d H:i:s');
			$tgl_keluar = date('Y-m-d H:i:s', strtotime('+'.$lama_proses. 'hour', strtotime($tgl_masuk)));
			
			$data = array(
						'id_customer' => $this->input->post('id_customer'),									
						'id_jenis' => $this->input->post('id_jenis'),
						'id_paket' => $this->input->post('id_paket'),
						
						'tgl_masuk' => $tgl_masuk,
						'tgl_keluar' => $tgl_keluar
			);
			$this->pemesanan->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('kurir/pemesanan'));

		}		
	}

	public function proses()
	{
		$this->pemesanan->id_customer=$_POST['id_customer'];
		$this->pemesanan->id_paket=$_POST['id_paket'];
		$this->pemesanan->tgl_masuk=date('Y-m-d H:i:s');
		
		// ambil field harga berdasarkan id paket yg ada di view			
		$paket1 = $this->db->get_where('paket', ['id_paket'=> $_POST['id_paket'] ])->row_array();
		$hrgpaket = $paket1['harga'];
		$lama_proses = $paket1['lama_proses'];

		$this->pemesanan->tgl_keluar=date('Y-m-d H:i:s', strtotime('+'.$lama_proses. 'hour', strtotime($this->pemesanan->tgl_masuk)));
		

		for($x=0;$x<count($_POST['id_item']);$x++)
		{
			// ambil field harga berdasarkan id jenis yg ada di view				
			$item1 = $this->db->get_where('item', ['id_item'=> $_POST['id_item'][$x] ])->row_array();
			$hrgitem = $item1['harga_item'];			

			// ambil field harga berdasarkan id jenis yg ada di view
			$total_harga = ($_POST['jumlah_item'][$x] * $hrgitem) + $hrgpaket;
			
			$this->pemesanan->id_item=$_POST['id_item'][$x];
			$this->pemesanan->jumlah_item=$_POST['jumlah_item'][$x];
			$this->pemesanan->total_harga=$total_harga;
			$this->pemesanan->tambahSatuan();
		}
		$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('kurir/pemesanan'));
		
	}

	
	public function update_status($id_pemesanan)
	{
		$pemesanan  = $this->pemesanan->detail($id_pemesanan);		
		$status_pesanan = $this->input->post('status_pesanan');

		if($status_pesanan == 'Diproses') {
		$id_jenis = $this->input->post('id_jenis');			
		$jenis1 = $this->db->get_where('jenis', ['id_jenis'=> $id_jenis ])->row_array();
		$hrgjenis = $jenis1['harga'];			
		// ambil field harga berdasarkan id jenis yg ada di view
		
		// ambil field harga berdasarkan id paket yg ada di view
		$id_paket = $this->input->post('id_paket');			
		$paket1 = $this->db->get_where('paket', ['id_paket'=> $id_paket ])->row_array();
		$hrgpaket = $paket1['harga'];
		$lama_proses = $paket1['lama_proses'];
		// ambil field harga dan lama_proses berdasarkan id paket  yg ada di view
		
		$jumlah = $this->input->post('jumlah');
		$total = ($hrgjenis * $jumlah) + $hrgpaket;
		$tgl_masuk = date('Y-m-d H:i:s');
		$tgl_keluar = date('Y-m-d H:i:s', strtotime('+'.$lama_proses. 'hour', strtotime($tgl_masuk)));
		$data = array(
				'id_pemesanan' => $id_pemesanan,						
				'status_pesanan' => $status_pesanan,
				'id_jenis' => $this->input->post('id_jenis'),
				'id_paket' => $this->input->post('id_paket'),
				'jumlah' => $this->input->post('jumlah'),
				'total_harga' => $total
		);
		} else if($status_pesanan == 'Selesai') {
			$data = array(
					'id_pemesanan' => $id_pemesanan,						
					'status_pesanan' => 'Selesai',
			);
		}

		
		$this->pemesanan->edit($data);
		$this->session->set_flashdata('sukses','Data telah disimpan');
		redirect(base_url('kurir/pemesanan'));

	}

	public function edit($id_pemesanan)
	{
		$customer = $this->customer->tampil();
		$jenis = $this->jenis->tampil();
		$paket = $this->paket->tampil();
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('id_customer','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		
		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Pemesanan',
					  'customer' => $customer,
					  'jenis' => $jenis,
					  'paket' => $paket,
					  'isi' => 'kurir/pemesanan/edit'
					 );
		$this->load->view('kurir/layout/wrapper', $data);
		}else{	

			$data = array(
						'id_customer' => $this->input->post('id_customer'),						
						'id_jenis' => $this->input->post('id_jenis'),
						'id_paket' => $this->input->post('id_paket'),
						'jumlah' => $this->input->post('jumlah')
			);
			$this->pemesanan->edit($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('kurir/pemesanan'));

		}		
	}


	//Delete
	public function delete($id_pemesanan)
	{
		
		$data = array('id_pemesanan' => $id_pemesanan);
		$this->pemesanan->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('kurir/pemesanan'),'refresh');
	}

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/kurir/Pemesanan.php */