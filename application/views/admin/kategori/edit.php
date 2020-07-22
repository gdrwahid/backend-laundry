<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/kategori/edit/'.$kategori->id) ?>" method="post">
<h3>Edit data kategori : <?= $kategori->nama_kategori?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_kategori" class="form-control" value="<?php echo $kategori->nama_kategori ?>">
		<?php echo form_error('nama_kategori','<small class="text-danger">','</small>'); ?>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/kategori') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>