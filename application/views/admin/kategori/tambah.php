<form action="<?php echo base_url('admin/kategori/tambah') ?>" method="post">
<h3>Tambah data kategori</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_kategori" class="form-control" value="<?php echo set_value('nama_kategori') ?>">
		<?php echo form_error('nama_kategori','<small class="text-danger">','</small>'); ?>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/kategori') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>