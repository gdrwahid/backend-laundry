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
      <h6 class="m-0 font-weight-bold text-primary"><?= $title?> <a href="<?= base_url('admin/kelurahan/tambah')?>" title="" class="btn btn-outline-primary" style="float: right;">Tambah Data</a></h6>
    </div>
    <div class="card-body">
<div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>#</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>Opsi</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i=1;
        foreach($kelurahan as $kelurahan){
    ?>
    <tr class="">
        <td><?php echo $i ?></td>
        <td><?php echo $kelurahan->nama_kecamatan ?></td>
        <td><?php echo $kelurahan->nama_kelurahan ?></td>        
        <td>
            <a href="<?php echo base_url('admin/kelurahan/edit/'.$kelurahan->id_kelurahan) ?>" class="btn btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a>

            <a href="<?php echo base_url('admin/kelurahan/delete/'.$kelurahan->id_kelurahan) ?>" class='btn btn-outline-danger' onclick="return confirm('Yakin Hapus data ini?')" title="Hapus"><i class='fa fa-trash'></i></a>
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