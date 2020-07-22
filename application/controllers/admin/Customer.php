<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('customer_model','customer');
 		$this->load->model('kecamatan_model','kecamatan');
		$this->load->model('kelurahan_model','kelurahan');
 	}

	public function index()
	{
		$customer = $this->customer->tampil();
		$kecamatan = $this->kecamatan->listing();
		$kelurahan = $this->kelurahan->listing();
		$data = array('title' => 'Data Customer ('.count($customer).')',
					  'customer' => $customer,
					  'kecamatan' => $kecamatan,
					  'kelurahan' => $kelurahan,
					  'isi' => 'admin/customer/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function listKelurahan(){
    // Ambil data ID Kota yang dikirim via ajax post
	    $id_kecamatan = $this->input->post('id_kecamatan');
	    
	    $kelurahan = $this->kelurahan->viewByKecamatan($id_kecamatan);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value=''>Pilih</option>";
	    
	    foreach($kelurahan as $data){
	      $lists .= "<option value='".$data->id_kelurahan."'>".$data->nama_kelurahan."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_kelurahan'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
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

		$valid->set_rules('email','Email','trim|required|is_unique[customer.email]',
			array(
				'required' => 'Email harus diisi',
				'is_unique' => 'Email sudah ada, gunakan email lain!'
			));

		$valid->set_rules('password','Password','trim|required',
			array(
				'required' => 'Password harus diisi'
			));

		$valid->set_rules('id_kecamatan','Kecamatan','trim|required',
			array(
				'required' => 'Kecamatan harus diisi'
			));

		$valid->set_rules('id_kelurahan','Kelurahan','trim|required',
			array(
				'required' => 'Kelurahan harus diisi'
			));

		if($valid->run()===FALSE){
		$kecamatan = $this->kecamatan->listing();
		$kelurahan = $this->kelurahan->listing();
		$data = array('title' => 'Tambah Customer',
					  'isi' => 'admin/customer/tambah',
					  'kecamatan' => $kecamatan,
					  'kelurahan' => $kelurahan,
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		
			$config['upload_path']   	= './assets/upload/customer/';
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
						'nama' => htmlspecialchars($i->post('nama',true)),
						'email' => htmlspecialchars($i->post('email',true)),
						'password' => md5($i->post('password')),
						'alamat' => $i->post('alamat'),
						'id_kecamatan' => $i->post('id_kecamatan'),
						'id_kelurahan' => $i->post('id_kelurahan'),
						'nohp' => $i->post('nohp'),
						'foto' 	=> $upload_data['uploads']['file_name'],
			);
			$this->customer->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/customer'));
		}else{
			$i = $this->input;
			$data = array(
						'nama' => htmlspecialchars($i->post('nama',true)),
						'email' => htmlspecialchars($i->post('email',true)),
						'password' => md5($i->post('password')),
						'alamat' => $i->post('alamat'),
						'id_kecamatan' => $i->post('id_kecamatan'),
						'id_kelurahan' => $i->post('id_kelurahan'),
						'nohp' => $i->post('nohp'),
			);
			$this->customer->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/customer'));
		}

		}		
	}


	public function edit($id_customer)
	{		
		$customer  = $this->customer->detail($id_customer);
		$kecamatan = $this->kecamatan->listing();
		$kelurahan = $this->kelurahan->listing();
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

		$valid->set_rules('id_kecamatan','Kecamatan','trim|required',
			array(
				'required' => 'Kecamatan harus diisi'
			));

		$valid->set_rules('id_kelurahan','Kelurahan','trim|required',
			array(
				'required' => 'Kelurahan harus diisi'
			));

		if($valid->run()){
			$nama = $this->input->post('nama');
			if(!empty($_FILES['foto']['name'])){
			$config['upload_path']   = './assets/upload/customer/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
			$config['max_size']      = '2048'; // KB  
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('foto'))  {
			// end validasi
			$data = array('title' => 'Edit Customer',
						  'error' => $this->upload->display_errors(),		
						  'isi' => 'admin/customer/edit',
						  'customer' => $customer,
						  'kecamatan' => $kecamatan,
						  'kelurahan' => $kelurahan,
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
				if($customer->foto !=""){
					unlink('./assets/upload/customer/'.$customer->foto);
				}
				//end hapus foto lama
				
				$i = $this->input;
				$data = array(
							'id_customer' => $id_customer,
							'nama' => htmlspecialchars($i->post('nama',true)),
							'email' => htmlspecialchars($i->post('email',true)),
							'password' => md5($i->post('password')),
							'alamat' => $i->post('alamat'),
							'id_kecamatan' => $i->post('id_kecamatan'),
							'id_kelurahan' => $i->post('id_kelurahan'),
							'nohp' => $i->post('nohp'),
							'foto' 	=> $upload_data['uploads']['file_name'],
						);
				$this->customer->edit($data);
				$this->session->set_flashdata('sukses','Data telah diupdate');
				redirect(base_url('admin/customer'),'refresh');
			} 
		}else {
				$i = $this->input;
					$data = array(
								'id_customer' => $id_customer,
								'nama' => htmlspecialchars($i->post('nama',true)),
								'email' => htmlspecialchars($i->post('email',true)),
								'password' => md5($i->post('password')),
								'alamat' => $i->post('alamat'),
								'id_kecamatan' => $i->post('id_kecamatan'),
								'id_kelurahan' => $i->post('id_kelurahan'),
								'nohp' => $i->post('nohp'),
							);
					$this->customer->edit($data);
					$this->session->set_flashdata('sukses','Data telah diupdate');
					redirect(base_url('admin/customer'),'refresh');
			}
		}
		//end masuk database
		$data = array('title' => 'Edit Customer',	
					  'isi' => 'admin/customer/edit',
					  'customer' => $customer,
					  'kecamatan' => $kecamatan,
					  'kelurahan' => $kelurahan,
					 );
		$this->load->view('admin/layout/wrapper', $data);
}
	

	public function detail($id_customer)
	{

		$customer = $this->customer->detail($id_customer); //memanggil fungsi detail yg ada pada customer_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$kecamatan = $this->kecamatan->listing();
		$kelurahan = $this->kelurahan->listing();
		
		$data = array('title' => 'Detail Customer: '.$customer->nama,
					  'customer' => $customer,
					  'kecamatan' => $kecamatan,
					  'kelurahan' => $kelurahan,
					  'isi' => 'admin/customer/detail'
					 );
		$this->load->view('admin/layout/wrapper', $data);
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
		$customer = $this->customer->detail($id);
		$data = array('title' => 'Ubah Password Customer: '.$customer->nama,
					  'customer' => $customer,
					  'isi' => 'admin/customer/ubah_password'
					 );
		$this->load->view('admin/layout/wrapper', $data);

	} else {
		$i = $this->input;
		$data = array(
				'id' => $id,
				'password' => md5($i->post('password')),
			);
		$this->customer->edit($data);
		$this->session->set_flashdata('sukses','Password telah diubah');
		redirect(base_url('admin/customer'),'refresh');
		}
	}

	//Delete
	public function delete($id_customer)
	{
		// Delete Gambar
		$customer = $this->customer->detail($id_customer);
		if($customer->foto != ""){
			unlink('./assets/upload/customer/'.$customer->foto);
		}
		$data = array('id_customer' => $id_customer);
		$this->customer->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/customer'),'refresh');
	}
}

/* End of file Customer.php */
/* Location: ./application/controllers/admin/Customer.php */