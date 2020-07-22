<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('jenis_model','jenis');
 	}

	public function index()
	{
		$jenis = $this->jenis->tampil();
		$data = array('title' => 'Data Jenis ('.count($jenis).')',
					  'jenis' => $jenis,
					  'isi' => 'admin/jenis/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));
		

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Jenis',
					  'isi' => 'admin/jenis/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		
			$a = $this->input->post('harga1');
			$b = $this->input->post('harga2');
			$c = $a + $b;
			$i = $this->input;
			$data = array(
						'nama_jenis' => htmlspecialchars($i->post('nama_jenis',true)),						
						'harga' => htmlspecialchars($i->post('harga',true)),
			);
			$this->jenis->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/jenis'));

		}		
	}

	public function edit($id_jenis)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));

		if($valid->run()===FALSE){
		$jenis = $this->jenis->detail($id_jenis); //memanggil fungsi detail yg ada pada jenis_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$data = array('title' => 'Edit Petugas: '.$jenis->nama_jenis,
					  'jenis' => $jenis,
					  'isi' => 'admin/jenis/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	} else {
		$i = $this->input;
				$data = array(
						'id_jenis' => $id_jenis,
						'nama_jenis' => $i->post('nama_jenis'),
						'harga' => $i->post('harga'),
					);
			$this->jenis->edit($data); //memanggil fungsi edit yg ada di jenis_model utk update data yg dipilih
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/jenis'),'refresh');
		}
	}

//Delete
	public function delete($id_jenis)
	{
		
		$data = array('id_jenis' => $id_jenis);
		$this->jenis->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/jenis'),'refresh');
	}

}

/* End of file Jenis.php */
/* Location: ./application/controllers/admin/Jenis.php */