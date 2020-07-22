<?php 
$level = $this->session->userdata('level');
?>
<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/user/edit/'.$user->id) ?>" method="post">
	
<?php if($this->uri->segment(3)=="profile") { ?>
<h3>My Profile</h3>
<?php } else { ?>
<h3>Edit data user : <?= $user->nama?></h3>
<?php } ?>

<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>">
		<?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" readonly>
		<?php echo form_error('username','<small class="text-danger">','</small>'); ?>
	</div>
	<?php if($level==="Administrator") { ?>
	<div class="form-group">
		<label>Level</label>
		<select name="level" class="form-control">
		<option value="Administrator">Administrator</option>
		<option value="Owner" <?php if($user->level=="Owner"){ echo "selected"; } ?>>Owner</option>	
		</select>
	</div>
	<?php } ?>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>
</form>
</div>
</div>