<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('user_model','user');
 		$this->load->model('petugas_model','petugas');
 		$this->load->model('pemesanan_model','pemesanan');

 	}

	public function index()
	{
		$jumlah_kurir = $this->petugas->jumlah_kurir();
		$jumlah_pencuci = $this->petugas->jumlah_pencuci();

		$totalblnini = $this->pemesanan->totalblnini();
		$data = array('title' => 'Halaman Dasbor',
					  'jumlah_kurir' => $jumlah_kurir,
					  'jumlah_pencuci' => $jumlah_pencuci,
					  'totalblnini' => $totalblnini,
					  'isi' => 'kurir/dasbor/list'
					 );
		$this->load->view('kurir/layout/wrapper',$data);
	}

	//Profile
	public function profile()
	{
		$id = $this->session->userdata('id');
		$user = $this->user->detail($id);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array( 
				'required' => 'Nama Harus diisi'));


		$valid->set_rules('password','Password','min_length[6]',
			array( 
				'min_length'=> 'Password minimal 6 karakter'));

		if($valid->run()===FALSE){
		// end validasi
		
		$data = array(	'title'	=> 'Update Profile: '.$user->nama,
						'user'  => $user,
						'isi'	=> 'admin/dasbor/profile');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//ga ada error, maka masuk database
		}else{
			$i = $this->input;
			// jika input password lebih dari 6 karakter		
		
			$data = array(
					'id' => $id,
					'nama' => $i->post('nama'),

				);
			
			// End if
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','Profile telah diupdate');
			redirect(base_url('admin/dasbor/profile'),'refresh');
		}
		//end masuk database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */