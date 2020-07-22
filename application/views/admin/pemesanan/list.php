<?php
// Notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title?> <a href="<?= base_url('admin/pemesanan/tambah')?>" title="" class="btn btn-outline-primary" style="float: right;">Tambah Data</a></h6>
    </div>
    <div class="card-body">
<div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Jenis</th>
        <th>Paket</th>        
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Tgl Masuk</th>
        <th>Opsi</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i=1;
        foreach($pemesanan as $pemesanan){
    ?>
    <tr class="">
        <td><?php echo $i ?></td>
        <td><?php echo $pemesanan->nama ?></td> 
        <td><?php echo $pemesanan->nama_jenis ?></td>         
        <td><?php echo $pemesanan->nama_paket ?></td> 
        <th><?php echo $pemesanan->jumlah ?></th>
        <td><?= 'Rp.'.number_format($pemesanan->total_harga,0,',','.') ?><br>
            <?php if($pemesanan->status_pesanan == "Masuk") { ?>
            <span class="badge badge-primary"><?php echo $pemesanan->status_pesanan ?></span>
            <?php } else if($pemesanan->status_pesanan == "Diproses") { ?>
            <span class="badge badge-warning"><?php echo $pemesanan->status_pesanan ?></span>
           <?php } else if($pemesanan->status_pesanan == "Selesai") { ?>
            <span class="badge badge-success"><?php echo $pemesanan->status_pesanan ?></span>
           <?php } ?>
           
        </td>
        <td><?php echo date('d-m-Y H:i:s', strtotime($pemesanan->tgl_masuk)); ?></td>       
        <td>
            <!-- <a href="<?php echo base_url('admin/pemesanan/edit/'.$pemesanan->id_pemesanan) ?>" class="btn btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a> -->
            <?php include 'detail.php'; ?>
            <a href="<?php echo base_url('admin/pemesanan/delete/'.$pemesanan->id_pemesanan) ?>" class='btn btn-outline-danger' onclick="return confirm('Yakin Hapus data ini?')" title="Hapus"><i class='fa fa-trash'></i></a>
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