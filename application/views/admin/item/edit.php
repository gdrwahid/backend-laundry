<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/item/edit/'.$item->id_item) ?>" method="post">
<h3>Edit data item : <?= $item->nama_item?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_item" class="form-control" value="<?php echo $item->nama_item ?>">
		<?php echo form_error('nama_item','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga_item" class="form-control" value="<?php echo $item->harga_item ?>">
		<?php echo form_error('harga_item','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/item') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>