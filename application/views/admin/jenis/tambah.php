<form action="<?php echo base_url('admin/jenis/tambah') ?>" method="post">
<h3>Tambah data jenis</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_jenis" class="form-control" value="<?php echo set_value('nama_jenis') ?>">
		<?php echo form_error('nama_jenis','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control" value="<?php echo set_value('harga') ?>">
		<?php echo form_error('harga','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/jenis') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>