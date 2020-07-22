<button class="btn btn-outline-info" data-toggle="modal" data-target="#Detail<?php echo $customer->id_customer ?>">
    <i class="fa fa-eye" title="Detail"></i>
</button>
<div class="modal fade" id="Detail<?php echo $customer->id_customer ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Customer : <?= $customer->nama?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><?php echo $customer->nama ?></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <th><?php echo $customer->email?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?php echo $customer->alamat?></th>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <th>:</th>
                            <th><?php echo $customer->nama_kecamatan?></th>
                        </tr>
                        <tr>
                            <th>Kelurahan</th>
                            <th>:</th>
                            <th><?php echo $customer->nama_kelurahan?></th>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <th>:</th>
                            <th><?php if($customer->foto != "") { ?>
                            <img src="<?php echo base_url('assets/upload/customer/'.$customer->foto) ?>" class="img img-thumbnail" width="600">
                            <?php } else { echo 'Tidak Ada'; } ?>
                            </th>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <th>:</th>
                            <th><?php echo $customer->nohp ?></th>
                        </tr>                     
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
