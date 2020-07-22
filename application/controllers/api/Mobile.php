<?php

class Mobile extends CI_Controller {

    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function loadData() {
        $json['pesan'] = 'Pesan ini dipersembahakan oleh CI';
        echo json_encode($json);
    }

        public function getHome() {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
            $request = json_decode($postdata);
                $start = $request->start;
                $berita = $this->getAllBerita($start);
                if ($berita != null) {
                    $json['berita'] = $berita;
                   // $json['banner'] = 'banner1.png';
                    echo json_encode($json);
                } else {
                    $json['pesan'] = 'Maaf, data tidak ditemukan!';
                    echo json_encode($json);
                }
            } 
        }
        
    // private function getAllBerita($start) {
    //     $this->load->model('Berita_model');
    // return $this->Berita_model->allBerita($start);
    // }
	
	public function doLogin() {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
            $request = json_decode($postdata);
            //$version = $request->version;
            $version = "0.0.1";
            $cek = $this->cekVersion($version);
            if ($cek == TRUE) {
                $username = $request->email;
                $password = $request->password;
                $alert = $request->alert;

//                $username = "admin@gmail.com";
//                $password = "farhan";
//                $alert = "0";

                if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix ", $username)) {
                    $json[] = array(
                        'pesan' => 'Maaf format Email yang Anda masukkan Salah! Silahkan masukkan Email dengan format yang benar!',
                    );
                    echo json_encode($json);
                } else {
                    $this->login($username, $password, $alert);
                }
            } else if ($cek == FALSE) {
                return $this->updateApk();
            }
        }
    }

    public function login($username, $password, $alert) {
        $member = $this->loginMember($username, $password);
        if ($member != null) {
            if ($alert == 1) {
                $now = date("Y-m-d h:i:s");
                $this->saveToken($username, $now);
                $json[] = array(
                    'token' => md5($user . $now),
             
                );
                echo json_encode($json);
            } else {
                $token = $member[0]['token_id'];
                if ($token != 'x') {
                    $json[] = array(
                        'alert' => 'Akun anda sebelumnya telah digunakan pada perangkat lain. Jika anda login pada perangkat ini, maka akun anda pada perangkat sebelumnya akan logout secara otomatis. Apakah anda yakin ingin login di perangkat ini?'
                    );
                    echo json_encode($json);
                } else if ($token == 'x') {
                    $now = date("Y-m-d h:i:s");
                    $this->saveToken($username, $now);
                    $json[] = array(
                        'token' => md5($username . $now),
                        'id_masyarakat' => $member[0]['id_masyarakat']
                       
                    );
                    echo json_encode($json);
                }
            }
        } else {
            $json[] = array(
                'pesan' => 'Maaf kombinasi Email dan Password yang Anda masukkan Salah!',
            );
            echo json_encode($json);
        }
    }

}