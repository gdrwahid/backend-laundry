<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('kategori_model','kategori');
 	}

	public function index()
	{
		$kategori = $this->kategori->tampil();
		$data = array('title' => 'Data Kategori ('.count($kategori).')',
					  'kategori' => $kategori,
					  'isi' => 'admin/kategori/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));
		

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Kategori',
					  'isi' => 'admin/kategori/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		

			$i = $this->input;
			$data = array(
						'nama_kategori' => $i->post('nama_kategori',true),						

			);
			$this->kategori->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/kategori'));

		}		
	}

	public function edit($id)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));
		if($valid->run()===FALSE){
		$kategori = $this->kategori->detail($id); //memanggil fungsi detail yg ada pada kategori_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$data = array('title' => 'Edit Petugas: '.$kategori->nama_kategori,
					  'kategori' => $kategori,
					  'isi' => 'admin/kategori/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	} else {
		$i = $this->input;
				$data = array(
						'id' => $id,
						'nama_kategori' => $i->post('nama_kategori'),
					);
			$this->kategori->edit($data); //memanggil fungsi edit yg ada di kategori_model utk update data yg dipilih
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/kategori'),'refresh');
		}
	}
//Delete
	public function delete($id)
	{
		
		$data = array('id' => $id);
		$this->kategori->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */