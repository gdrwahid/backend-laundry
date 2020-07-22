<form action="<?php echo base_url('admin/kecamatan/tambah') ?>" method="post">
<div class="col-md-6">
	<div class="form-group">
		<label for="nama_kecamatan">Nama Kecamatan</label>
		<input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" placeholder="Nama Kecamatan" value="<?php echo set_value('nama_kecamatan') ?>" autofocus>
		<?php echo form_error('nama_kecamatan','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		<a href="<?php echo base_url('admin/kecamatan') ?>" class="btn btn-danger"> Kembali</a>
	</div>
</div>