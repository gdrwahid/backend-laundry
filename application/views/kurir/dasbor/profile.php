<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//Notifikasi
if($this->session->flashdata('sukses')){
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//Open Form
echo form_open(base_url('admin/dasbor/profile'));
?>
<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" >
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default" value="Reset">
		<a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-danger"> Kembali</a>
	</div>
</div>

<?php
// form close
echo form_close();
?>