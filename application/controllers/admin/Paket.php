<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('paket_model','paket');
 	}

	public function index()
	{
		$paket = $this->paket->tampil();
		$data = array('title' => 'Data Paket ('.count($paket).')',
					  'paket' => $paket,
					  'isi' => 'admin/paket/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama_paket','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));
		$valid->set_rules('lama_proses','Lama Proses','trim|required|is_numeric',
			array(
				'required' => 'Lama Proses harus diisi',
				'is_numeric' => 'Lama Proses harus angka'
			));
		

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Kategori',
					  'isi' => 'admin/paket/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		
			$i = $this->input;
			$data = array(
						'nama_paket' => htmlspecialchars($i->post('nama_paket',true)),						
						'harga' => htmlspecialchars($i->post('harga',true)),
						'lama_proses' => htmlspecialchars($i->post('lama_proses',true)),

			);
			$this->paket->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/paket'));

		}		
	}

	public function edit($id_paket)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_paket','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));
		$valid->set_rules('lama_proses','Lama Proses','trim|required|is_numeric',
			array(
				'required' => 'Lama Proses harus diisi',
				'is_numeric' => 'Lama Proses harus angka'
			));

		if($valid->run()===FALSE){
		$paket = $this->paket->detail($id_paket); //memanggil fungsi detail yg ada pada paket_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$data = array('title' => 'Edit Petugas: '.$paket->nama_paket,
					  'paket' => $paket,
					  'isi' => 'admin/paket/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	} else {
		$i = $this->input;
				$data = array(
						'id_paket' => $id_paket,
						'nama_paket' => $i->post('nama_paket'),
						'harga' => $i->post('harga'),
						'lama_proses' => htmlspecialchars($i->post('lama_proses',true)),
					);
			$this->paket->edit($data); //memanggil fungsi edit yg ada di paket_model utk update data yg dipilih
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/paket'),'refresh');
		}
	}

//Delete
	public function delete($id_paket)
	{
		
		$data = array('id_paket' => $id_paket);
		$this->paket->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/paket'),'refresh');
	}

}

/* End of file Paket.php */
/* Location: ./application/controllers/admin/Paket.php */