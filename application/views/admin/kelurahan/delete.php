<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $kelurahan->id_kelurahan ?>">
    <i class="fa fa-trash-o" title="Hapus"></i> Hapus
</button>
<div class="modal fade" id="Delete<?php echo $kelurahan->id_kelurahan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus data kelurahan : <?php echo $kelurahan->nm_kelurahan ?></h4>
            </div>
            <div class="modal-body">
                <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('admin/kelurahan/delete/'.$kelurahan->id_kelurahan) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes</a>
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
            </div>
        </div>
    </div>
</div>
