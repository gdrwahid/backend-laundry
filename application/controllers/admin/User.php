<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('user_model','user');
 	}

	public function index()
	{
		$user = $this->user->tampil();
		$data = array('title' => 'Data User ('.count($user).')',
					  'user' => $user,
					  'isi' => 'admin/user/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('username','Username','trim|required|is_unique[user.username]',
			array(
				'required' => 'Username harus diisi',
				'is_unique' => 'Username sudah ada, gunakan username lain!'
			));

		$valid->set_rules('password','Password','trim|required',
			array(
				'required' => 'Password harus diisi'
			));

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah User',
					  'isi' => 'admin/user/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		
			$i = $this->input;
			$data = array(
						'nama' => htmlspecialchars($i->post('nama',true)),
						'username' => htmlspecialchars($i->post('username',true)),
						'password' => md5($i->post('password')),
						'level' => $i->post('level'),

			);
			$this->user->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/user'));

		}		
	}

	public function edit($id)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));
		if($valid->run()===FALSE){
		$user = $this->user->detail($id); //memanggil fungsi detail yg ada pada user_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$data = array('title' => 'Edit User: '.$user->nama,
					  'user' => $user,
					  'isi' => 'admin/user/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	} else {
		$i = $this->input;
				$data = array(
						'id' => $id,
						'nama' => $i->post('nama'),
						'level' => $i->post('level')
					);
			$this->user->edit($data); //memanggil fungsi edit yg ada di user_model utk update data yg dipilih
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	public function ubah_password($id)
	{
		$valid = $this->form_validation;


		$valid->set_rules('password', 'Password', 'required|trim|min_length[3]',array(
			
			'min_length' => 'password min 5 karakter'
		));

		$valid->set_rules('password2', 'Password', 'required|trim|matches[password]',array(
			'matches' => 'password tidak sama!',
		));
		
		if($valid->run()===FALSE){
		$user = $this->user->detail($id);
		$data = array('title' => 'Ubah Password User: '.$user->nama,
					  'user' => $user,
					  'isi' => 'admin/user/ubah_password'
					 );
		$this->load->view('admin/layout/wrapper', $data);

	} else {
		$i = $this->input;
		$data = array(
				'id' => $id,
				'password' => md5($i->post('password')),
			);
		$this->user->edit($data);
		$this->session->set_flashdata('sukses','Password telah diubah');
		redirect(base_url('admin/user'),'refresh');
		}
	}

	//Delete
	public function delete($id)
	{
		
		$data = array('id' => $id);
		$this->user->delete($data);
		//$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */