<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {
	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelurahan_model','kelurahan');
		$this->load->model('kecamatan_model','kecamatan');
	}

	public function index()
	{
		$kelurahan = $this->kelurahan->listing();
		$kecamatan = $this->kecamatan->listing();
		$data = array('title' => 'Data Kelurahan ('.count($kelurahan).')', 
					  'kelurahan' => $kelurahan,
					  'kecamatan' => $kecamatan,
				      'isi' => 'admin/kelurahan/list');
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Halaman tambah
	public function tambah() 
	{
		$kecamatan = $this->kecamatan->listing();
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kelurahan','Nama','required',
			array( 
				'required' => 'Nama Kelurahan Harus diisi!'));

		if($valid->run()===FALSE){
		// end validasi
		
		$data = array(	'title'	=> 'Tambah Kelurahan',
						'kecamatan' => $kecamatan,
						'isi'	=> 'admin/kelurahan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//ga ada error, maka masuk database
		}else{
			$i = $this->input;
			$data = array(
						'id_kecamatan' => $i->post('id_kecamatan'),
						'nama_kelurahan' => $i->post('nama_kelurahan'),
					);
			$this->kelurahan->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/kelurahan'),'refresh');
		}
		//end masuk database
	}

	public function edit($id_kelurahan)
	{
		$kelurahan = $this->kelurahan->detail($id_kelurahan); //untuk menampilkan data yg dipilih ke form edit
		$kecamatan = $this->kecamatan->listing();
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kelurahan','Nama','required',
			array( 
				'required' => 'Nama Harus diisi!'));

		if($valid->run()===FALSE){
		// end validasi
		
		$data = array(	'title'	=> 'Edit Kelurahan: '.$kelurahan->nama_kelurahan,
						'kelurahan'  => $kelurahan,
						'kecamatan'  => $kecamatan,
						'isi'	=> 'admin/kelurahan/edit');
		$this->load->view('admin/layout/wrapper', $data);
		//ga ada error, maka masuk database
		}else{
			$i = $this->input;
				$data = array(
						'id_kelurahan' => $id_kelurahan,
						'id_kecamatan' => $i->post('id_kecamatan'),
						'nama_kelurahan' => $i->post('nama_kelurahan'),
					);
			$this->kelurahan->edit($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/kelurahan'),'refresh');
		}
		//end masuk database
	}

	//Delete
	public function delete($id_kelurahan)
	{
		
		//proteksi hapus di sini
		if($this->session->userdata('email_user')=="" && $this->session->userdata('lev_user')==""){
		   $this->session->set_flashdata('gagal', 'Silahkan Login dahulu');
			redirect(base_url('login'),'refresh');
		}
		//end proteksi
		$data = array('id_kelurahan' => $id_kelurahan);
		$this->kelurahan->delete($data);
			$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/kelurahan'),'refresh');
	}

}

/* End of file Kelurahan.php */
/* Location: ./application/controllers/admin/Kelurahan.php */