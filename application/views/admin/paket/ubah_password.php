<form action="<?php echo base_url('admin/user/ubah_password/'.$user->id) ?>" method="post">
<h3>Ubah Password user : <?php echo $user->nama ?></h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Password Baru</label>
		<input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>">
		<?php echo form_error('password','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Ulangi Password</label>
		<input type="password" name="password2" class="form-control" value="<?php echo set_value('password2') ?>">
		<?php echo form_error('password2','<small class="text-danger">','</small>'); ?>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>