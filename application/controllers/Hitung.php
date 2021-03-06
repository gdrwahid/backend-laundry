<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hitung extends CI_Controller {
   
   
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
    }
   
   
    function index()
    {
        $this->load->view('menu_hitung');
    }
   
   
    function perkalian()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('v1','Variabel 1','required|integer',
            array(
                'required' => 'Variabel 1 tidak boleh kosong!',
                'integer' => 'Variabel 1 harus berupa angka!'
            )
        );
        $this->form_validation->set_rules('v2','Variabel 2','required|integer');
        if($this->form_validation->run())
        {
            $data['v1']=(int)$this->input->post('v1',true);
            $data['v2']=(int)$this->input->post('v2',true);
            $data['hasil']=$data['v1']*$data['v2'];
        }
        else
        {
            $data['v1']=0;
            $data['v2']=0;
            $data['hasil']=0;
        }
        $this->load->view('perkalian',$data);
    }
   
   
    function pembagian()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('v1','Variabel 1','required|is_natural_no_zero');
        $this->form_validation->set_rules('v2','Variabel 2','required|is_natural_no_zero');
        if($this->form_validation->run())
        {
        $data['v1']=(int)$this->input->post('v1',true);
        $data['v2']=(int)$this->input->post('v2',true);
        $data['hasil']=$data['v1']/$data['v2'];
        }
        else
        {
            $data['v1']=0;
            $data['v2']=0;
            $data['hasil']=0;
        }
        $this->load->view('pembagian',$data)  ;  
    }

    function tampil()
    {
        $data['arr'] = array(['Apel', 'Belimbing', 'Cempedak'],['Besar','Sedang','Kecil']);
        $this->load->view('pengurangan',$data);
    }

    function pengurangan(){

        $data['v1']=(int)$this->input->post('v1');
        $data['v2']=(int)$this->input->post('v2');
        $data['hasil']=$data['v1'] - $data['v2'];
        $data['arr'] = array(['Apel', 'Belimbing', 'Cempedak'],['Besar','Sedang','Kecil']);
        $this->load->view('pengurangan',$data);
    }
}