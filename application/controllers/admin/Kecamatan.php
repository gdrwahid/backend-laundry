<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kecamatan_model');
	}

	public function index()
	{
		$kecamatan = $this->kecamatan_model->listing();
		$data = array('title' => 'Data Kecamatan ('.count($kecamatan).')', 
					  'kecamatan' => $kecamatan,
				      'isi' => 'admin/kecamatan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Halaman tambah
	public function tambah() 
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kecamatan','Nama','required',
			array( 
				'required' => 'Nama Kecamatan Harus diisi!'));

		if($valid->run()===FALSE){
		// end validasi
		
		$data = array(	'title'	=> 'Tambah Kecamatan',
						'isi'	=> 'admin/kecamatan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//ga ada error, maka masuk database
		}else{
			$i = $this->input;
			$data = array(
						'nama_kecamatan' => $i->post('nama_kecamatan'),
					);
			$this->kecamatan_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/kecamatan'),'refresh');
		}
		//end masuk database
	}

	public function edit($id_kecamatan)
	{
		$kecamatan = $this->kecamatan_model->detail($id_kecamatan);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kecamatan','Nama','required',
			array( 
				'required' => 'Nama Harus diisi!'));

		if($valid->run()===FALSE){
		// end validasi
		
		$data = array(	'title'	=> 'Edit Kecamatan: '.$kecamatan->nama_kecamatan,
						'kecamatan'  => $kecamatan,
						'isi'	=> 'admin/kecamatan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//ga ada error, maka masuk database
		}else{
			$i = $this->input;
				$data = array(
						'id_kecamatan' => $id_kecamatan,
						'nama_kecamatan' => $i->post('nama_kecamatan'),
					);
			$this->kecamatan_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/kecamatan'),'refresh');
		}
		//end masuk database
	}

	//Delete
	public function delete($id_kecamatan)
	{
		
		//proteksi hapus di sini
		if($this->session->userdata('email_user')=="" && $this->session->userdata('lev_user')==""){
		   $this->session->set_flashdata('gagal', 'Silahkan Login dahulu');
			redirect(base_url('login'),'refresh');
		}
		//end proteksi
		$data = array('id_kecamatan' => $id_kecamatan);
		$this->kecamatan_model->delete($data);
			$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/kecamatan'),'refresh');
	}

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/admin/Kecamatan.php */