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
                <form action="<?= base_url('kurir/pemesanan/update_status/'.$pemesanan->id_pemesanan)?>" method="post">
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
                            <th><?php echo $pemesanan->nama_jenis?> | <?php echo 'Rp.'.number_format($pemesanan->harga_jenis,0,',','.') ?>
                                <!-- kirim data id_jenis ke controller pemesanan -->
                                <input type="hidden" name="id_jenis" value="<?= $pemesanan->id_jenis?>">
                            </th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th>
                                <?php echo $pemesanan->nama_paket?> | <?php echo 'Rp.'.number_format($pemesanan->harga_paket,0,',','.') ?>
                                <input type="hidden" name="id_paket" value="<?= $pemesanan->id_paket?>">                                    
                                </th>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th>:</th>
                            <!-- jika jumlah tidak kosong maka tampilan nilai jumlahny dari database -->
                            <?php if($pemesanan->jumlah != 0 ) { ?>

                            <th><?php echo $pemesanan->jumlah?></th>

                            <!-- jika jumlah kosong, tampilkan inputan -->
                            <?php } else { ?>

                            <th><input type="number" name="jumlah" class="form-control"></th>

                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <th>:</th>
                            <th><?php echo 'Rp.'.number_format($pemesanan->total_harga,0,',','.') ?></th>
                        </tr>  

                        <?php if($pemesanan->status_pesanan!="Selesai") { ?>       

                        <tr>
                            <th>Status Pesanan</th>
                            <th>:</th>
                            <th>
                                <select name="status_pesanan" class="form-control">
                                <option value="">-Ubah Status-</option>

                                <?php if($pemesanan->status_pesanan=="Masuk") { ?>
                                <option value="Diproses" <?php if($pemesanan->status_pesanan=="Diproses"){ echo "selected"; } ?>>Diproses</option> 
                                 <?php } ?>

                                <?php if($pemesanan->status_pesanan=="Diproses") { ?>
                                <option value="Selesai" <?php if($pemesanan->status_pesanan=="Selesai"){ echo "selected"; } ?>>Selesai</option> 
                                <?php } ?>

                                
                                </select>
                            </th>                            
                        </tr>    
                        <?php } else { ?>
                        <tr>
                            <th>Status Pesanan</th>
                            <th>:</th>
                            <th><span class="badge badge-success">Selesai</span></th>
                        </tr>
                        <?php } ?>


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
