<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/paket/edit/'.$paket->id_paket) ?>" method="post">
<h3>Edit data paket : <?= $paket->nama_paket?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_paket" class="form-control" value="<?php echo $paket->nama_paket ?>">
		<?php echo form_error('nama_paket','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $paket->harga ?>">
		<?php echo form_error('harga','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Lama Proses <small class="text-danger">Input berapa jam</small></label>
		<input type="text" name="lama_proses" class="form-control" value="<?php echo $paket->lama_proses ?>">
		<?php echo form_error('lama_proses','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/paket') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>