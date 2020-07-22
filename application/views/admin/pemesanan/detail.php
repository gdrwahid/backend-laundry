<button class="btn btn-outline-info" data-toggle="modal" data-target="#Detail<?php echo $pemesanan->id_pemesanan ?>">
    <i class="fa fa-eye" title="Detail"></i>
</button>
<div class="modal fade" id="Detail<?php echo $pemesanan->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Pemesanan : <?= $pemesanan->nama?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/pemesanan/update_status/'.$pemesanan->id_pemesanan)?>" method="post">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>:</th>
                            <th>Pskg-<?php echo $pemesanan->id_pemesanan ?></th>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <th>:</th>
                            <th><?php echo $pemesanan->nama ?></th>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <th>:</th>
                            <th><?php echo $pemesanan->nama_jenis?> | <?php echo 'Rp.'.number_format($pemesanan->harga_jenis,0,',','.') ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?php echo $pemesanan->nama_paket?> | <?php echo 'Rp.'.number_format($pemesanan->harga_paket,0,',','.') ?></th>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th>:</th>
                            <th><?php echo $pemesanan->jumlah?></th>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <th>:</th>
                            <th><?php echo 'Rp.'.number_format($pemesanan->total_harga,0,',','.') ?></th>
                        </tr>                        
                        <tr>
                            <th>Status Pesanan</th>
                            <th>:</th>
                            <th>
                                <select name="status_pesanan" class="form-control">
                                <option value="Masuk">Masuk</option>
                                <option value="Diproses" <?php if($pemesanan->status_pesanan=="Diproses"){ echo "selected"; } ?>>Diproses</option>                                 
                                <option value="Selesai" <?php if($pemesanan->status_pesanan=="Selesai"){ echo "selected"; } ?>>Selesai</option> 
                                </select>
                            </th>
                        </tr>    
                         <tr>
                            <th>Tgl Masuk</th>
                            <th>:</th>
                            <th><?php echo date('d-m-Y H:i:s', strtotime($pemesanan->tgl_masuk)); ?></th>
                        </tr> 
                        <tr>
                            <th>Tgl Keluar</th>
                            <th>:</th>
                            <th><?php echo date('d-m-Y H:i:s', strtotime($pemesanan->tgl_keluar)); ?></th>
                        </tr>                  
                    </thead>
                </table>
                <button type="submit" class="btn btn-success">Update Status</button>
                </form>                
            </div>
        </div>
    </div>
</div>
