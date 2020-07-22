<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('petugas_model','petugas');
 	}

	public function index()
	{
		$petugas = $this->petugas->tampil();
		$data = array('title' => 'Data Petugas ('.count($petugas).')',
					  'petugas' => $petugas,
					  'isi' => 'admin/petugas/list'
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

		$valid->set_rules('nohp','No HP','trim|required|is_numeric',
			array(
				'required' => 'No HP harus diisi',
				'is_numeric' => 'No HP harus angka'
			));

		$valid->set_rules('alamat','Alamat','trim|required',
			array(
				'required' => 'Alamat harus diisi'
			));

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Petugas',
					  'isi' => 'admin/petugas/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{	
			$config['upload_path']   	= './assets/upload/petugas/';
			$config['allowed_types']	= 'jpg|jpeg|png';
			$config['max_size']      	= '2048'; // KB 
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['file_name'] 	 	= $this->input->post('nama'); 
			$this->upload->initialize($config);
			if($this->upload->do_upload('foto')) {
			$upload_data   = array('uploads' =>$this->upload->data());

			$i = $this->input;
			$data = array(
						'nama' => $i->post('nama',true),
						'nohp' => $i->post('nohp',true),
						'alamat' => $i->post('alamat',true),
						'level_petugas' => $i->post('level_petugas',true),
						'foto' 	=> $upload_data['uploads']['file_name'],
			);
			$this->petugas->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/petugas'));

		}else{
			$i = $this->input;
			$data = array(
						'nama' => $i->post('nama',true),
						'nohp' => $i->post('nohp',true),
						'alamat' => $i->post('alamat',true),
						'level_petugas' => $i->post('level_petugas',true),
			);
			$this->petugas->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/petugas'));
		}	
	}}

	public function edit($id)
	{		
		$petugas  = $this->petugas->detail($id);
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('nohp','No HP','trim|required|is_numeric',
			array(
				'required' => 'No HP harus diisi',
				'is_numeric' => 'No HP harus angka'
			));

		$valid->set_rules('alamat','Alamat','trim|required',
			array(
				'required' => 'Alamat harus diisi'
			));


		if($valid->run()){
		$nama = $this->input->post('nama');
		if(!empty($_FILES['foto']['name'])){
		$config['upload_path']   = './assets/upload/petugas/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
		$config['max_size']      = '2048'; // KB  
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('foto'))  {
		// end validasi
		$data = array('title' => 'Edit Petugas',
					  'error' => $this->upload->display_errors(),		
					  'isi' => 'admin/petugas/edit',
					  'petugas' => $petugas,
					 );
		$this->load->view('admin/layout/wrapper', $data);
		//ga ada error, maka masuk database
		}else{
			//upload
			$upload_data        		= array('uploads' =>$this->upload->data());
			
			// Image Editor			
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['file_name'] 	    = $nama; 
			//hapus foto lama
			if($petugas->foto !=""){
				unlink('./assets/upload/petugas/'.$petugas->foto);
			}
			//end hapus foto lama
			
			$i = $this->input;
			$data = array(
						'id' => $id,
						'nama' => htmlspecialchars($i->post('nama',true)),
						'nohp' => $i->post('nohp',true),
						'alamat' => $i->post('alamat',true),
						'level_petugas' => $i->post('level_petugas',true),
						'foto' 	=> $upload_data['uploads']['file_name'],
					);
			$this->petugas->edit($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/petugas'),'refresh');
	} 
}else {
		$i = $this->input;
			$data = array(
						'id' => $id,
						'nama' => htmlspecialchars($i->post('nama',true)),
						'nohp' => $i->post('nohp',true),
						'alamat' => $i->post('alamat',true),
						'level_petugas' => $i->post('level_petugas',true),
					);
			$this->petugas->edit($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/petugas'),'refresh');
	}
}
		//end masuk database
		$data = array('title' => 'Edit Petugas',	
					  'isi' => 'admin/petugas/edit',
					  'petugas' => $petugas,
					 );
		$this->load->view('admin/layout/wrapper', $data);
}
//Delete
	public function delete($id)
	{
		
		$data = array('id' => $id);
		$this->petugas->delete($data);
		//$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/petugas'),'refresh');
	}

}

/* End of file Petugas.php */
/* Location: ./application/controllers/admin/Petugas.php */