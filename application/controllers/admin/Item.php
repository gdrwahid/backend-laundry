<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('item_model','item');
 	}

	public function index()
	{
		$item = $this->item->tampil();
		$data = array('title' => 'Data Item ('.count($item).')',
					  'item' => $item,
					  'isi' => 'admin/item/list'
					 );
		$this->load->view('admin/layout/wrapper', $data);	
	}

	public function tambah()
	{
		//memberikan validasi pada form
		$valid = $this->form_validation;

		$valid->set_rules('nama_item','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga_item','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));
		

		if($valid->run()===FALSE){
		$data = array('title' => 'Tambah Item',
					  'isi' => 'admin/item/tambah'
					 );
		$this->load->view('admin/layout/wrapper', $data);
		}else{		
			$i = $this->input;
			$data = array(
						'nama_item' => htmlspecialchars($i->post('nama_item',true)),						
						'harga_item' => htmlspecialchars($i->post('harga_item',true)),
			);
			$this->item->tambah($data);
			$this->session->set_flashdata('sukses','Data telah disimpan');
			redirect(base_url('admin/item'));

		}		
	}

	public function edit($id_item)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_item','Nama','trim|required',
			array(
				'required' => 'Nama harus diisi'
			));

		$valid->set_rules('harga_item','Harga','trim|required|is_numeric',
			array(
				'required' => 'Harga harus diisi',
				'is_numeric' => 'Harga harus angka'
			));

		if($valid->run()===FALSE){
		$item = $this->item->detail($id_item); //memanggil fungsi detail yg ada pada item_model. berfungsi utk menampilkan data sesuai id yg dipilih
		$data = array('title' => 'Edit Item: '.$item->nama_item,
					  'item' => $item,
					  'isi' => 'admin/item/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data);
	} else {
		$i = $this->input;
				$data = array(
						'id_item' => $id_item,
						'nama_item' => $i->post('nama_item'),
						'harga_item' => $i->post('harga_item'),
					);
			$this->item->edit($data); //memanggil fungsi edit yg ada di item_model utk update data yg dipilih
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/item'),'refresh');
		}
	}

//Delete
	public function delete($id_item)
	{
		
		$data = array('id_item' => $id_item);
		$this->item->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/item'),'refresh');
	}

}

/* End of file Item.php */
/* Location: ./application/controllers/admin/Item.php */