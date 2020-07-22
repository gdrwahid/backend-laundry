<?php 
$id = $this->session->userdata('id');
$user_aktif = $this->user_model->detail($id);
$level = $this->session->userdata('level');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title?></title>
  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <!-- select2 -->
    <link href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/select2/dist/js/select2.min.js"></script>

</head>

<body id="page-top">
<!-- preloader -->
<div class="preloader">
    <div class="animate">
    <div class="loader"></div>
    </div>
</div>
  <!-- Page Wrapper -->
  <div id="wrapper">