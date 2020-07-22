<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
	}
	public function index()
	{
		$data['buku'] = $this->buku_model->getBuku();
		$this->load->view('buku_view', $data);
	}
}