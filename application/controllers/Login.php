<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('user_model','user');
 		$this->load->model('petugas_model','petugas');
 	}

 	public function test()
 	{
 		echo 'test';
 	}

	public function index()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','trim|required',
			array(
				'required' => 'Username harus diisi'
			));

		$valid->set_rules('password','Password','trim|required',
			array(
				'required' => 'Password harus diisi'
			));

		if($valid->run()===FALSE){
		$data = array('title'=>'Halaman Login');
		$this->load->view('admin/login_view',$data);
		//cek username dan password
	 	} else {
	 		$i = $this->input;
	 		$username = $i->post('username');
	 		$password = $i->post('password');
	 		$check_login = $this->user->login($username,$password);
	 		if(count($check_login)==1){
	 			$this->session->set_userdata('username',$username);
	 			$this->session->set_userdata('id',$check_login->id);
	 			$this->session->set_userdata('nama',$check_login->nama);
	 			$this->session->set_userdata('level',$check_login->level);
	 			redirect('admin/dasbor','refresh');
	 		}else{
	 			$this->session->set_flashdata('gagal',' Username atau Password Salah');
	 			redirect('login','refresh');
	 		}
	 	}
	}

	public function loginkurir()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('email_petugas','Email','trim|required',
			array(
				'required' => '%s harus diisi'
			));

		$valid->set_rules('pass_petugas','Password','trim|required',
			array(
				'required' => '%s harus diisi'
			));

		if($valid->run()===FALSE){
		$data = array('title'=>'Halaman Login');
		$this->load->view('kurir/login_kurir',$data);
		//cek username dan password
	 	} else {
	 		$i = $this->input;
	 		$email_petugas = $i->post('email_petugas');
	 		$pass_petugas = $i->post('pass_petugas');
	 		$check_login = $this->petugas->loginkurir($email_petugas,$pass_petugas);
	 		if(count($check_login)==1){
	 			$this->session->set_userdata('email_petugas',$email_petugas);
	 			$this->session->set_userdata('id',$check_login->id);
	 			$this->session->set_userdata('nama',$check_login->nama);
	 			$this->session->set_userdata('level_petugas',$check_login->level_petugas);
	 			redirect('kurir/dasbor','refresh');
	 		}else{
	 			$this->session->set_flashdata('gagal',' Username atau Password Salah');
	 			redirect('loginkurir','refresh');
	 		}
	 	}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		redirect('login','refresh');

	}

	public function logoutkurir()
	{
		$this->session->unset_userdata('email_petugas');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level_petugas');
		redirect('loginkurir','refresh');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */