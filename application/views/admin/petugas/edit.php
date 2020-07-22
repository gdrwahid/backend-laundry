<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/petugas/edit/'.$petugas->id) ?>" method="post" enctype="multipart/form-data">
<h3>Edit data petugas : <?= $petugas->nama?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $petugas->nama ?>">
		<?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="text" name="nohp" class="form-control" value="<?php echo $petugas->nohp ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control"><?php echo $petugas->alamat ?></textarea>
	</div>
	<div class="form-group">
		<label>Level</label>
		<select name="level_petugas" class="form-control">
		<option value="Pencuci">Pencuci</option>
		<option value="Kurir" <?php if($petugas->level=="Kurir"){ echo "selected"; } ?>>Kurir</option>	
		</select>
	</div>
	<div class="form-group">
	<label>Upload Foto</label>
		<input type="file" name="foto" class="form-control" placeholder="Foto">
		<small class="text-danger">Max size : 2 mb | Format file : jpg, jpeg, png, pdf</small><br>
		<?php if(!empty($petugas->foto)) { ?>
		<img src="<?php echo base_url('assets/upload/petugas/'.$petugas->foto)?>" class="img img-thumbnail" width="450"> <br>
		<?php } ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/petugas') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>