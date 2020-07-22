<?php
// Notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
$level = $this->session->userdata('level');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title?> <a href="<?= base_url('admin/customer/tambah')?>" title="" class="btn btn-outline-primary" style="float: right;">Tambah Data</a></h6>
    </div>
    <div class="card-body">
<div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Opsi</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i=1;
        foreach($customer as $customer){
    ?>
    <tr class="">
        <td><?php echo $i ?></td>
        <td><?php echo $customer->nama ?></td>
        <td><?php echo $customer->email ?></td>
        <td><?php echo $customer->nohp ?></td>        
        <td>
            <?php if($level === "Administrator") { ?>
            <a href="<?php echo base_url('admin/customer/edit/'.$customer->id_customer) ?>" class="btn btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="<?php echo base_url('admin/customer/delete/'.$customer->id_customer) ?>" class='btn btn-outline-danger' onclick="return confirm('Yakin Hapus data ini?')" title="Hapus"><i class='fa fa-trash'></i></a>     

            <!--<a href="<?php echo base_url('admin/customer/ubah_password/'.$customer->id_customer) ?>" class="btn btn-outline-success" title="Ubah Password"><i class="fa fa-key"></i></a>-->
            <?php include 'detail.php' ?>

            <?php } else { 
                include 'detail.php';
            }
            ?>

        </td>
    </tr>
    <?php
    $i++;
        }
    ?>
    
</tbody>
</table>
</div>
    </div>
</div>
<!-- <script>
      $(document).ready(function () {
          $('#dataTables-example').dataTable({
            "scrollX": true
          });
      });
</script> -->