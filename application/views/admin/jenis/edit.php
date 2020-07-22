<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/jenis/edit/'.$jenis->id_jenis) ?>" method="post">
<h3>Edit data jenis : <?= $jenis->nama_jenis?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_jenis" class="form-control" value="<?php echo $jenis->nama_jenis ?>">
		<?php echo form_error('nama_jenis','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $jenis->harga ?>">
		<?php echo form_error('harga','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/jenis') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>