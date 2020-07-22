<form action="<?php echo base_url('admin/user/tambah') ?>" method="post" enctype="multipart/form-data">
<h3>Tambah data user</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
		<?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>">
		<?php echo form_error('username','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
		<?php echo form_error('password','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Level</label>
		<select name="level" class="form-control">
		<option value="Administrator">Administrator</option>
		<option value="Owner">Owner</option>	
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>