<form action="<?php echo base_url('admin/petugas/tambah') ?>" method="post" enctype="multipart/form-data">
<h3>Tambah data petugas</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
		<?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="text" name="nohp" class="form-control" value="<?php echo set_value('nohp') ?>">
		<?php echo form_error('nohp','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control"></textarea>
		<?php echo form_error('alamat','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Level</label>
		<select name="level_petugas" class="form-control">
		<option value="Pencuci">Pencuci</option>
		<option value="Kurir">Kurir</option>	
		</select>
	</div>
	<div class="form-group">
	<label>Upload Foto</label>
		<input type="file" name="foto" class="form-control" placeholder="Foto">
		<small class="text-danger">Max size : 2 mb | Format file : jpg, jpeg, png, pdf</small>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/petugas') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>