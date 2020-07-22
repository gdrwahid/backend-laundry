<?php
// proteksi halaman
if($this->session->userdata('email_petugas') == "") {
	redirect('loginkurir','refresh');
}
require_once('header.php');
require_once('sidebar.php');
require_once('topbar.php');
require_once('content.php');
require_once('footer.php');
?>