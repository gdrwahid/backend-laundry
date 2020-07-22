<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
echo form_open(base_url('admin/kecamatan/edit/'.$kecamatan->id_kecamatan));
?>
<div class="col-md-6">
	<div class="form-group">
		<label for="nm_kecamatan">Nama Kecamatan</label>
		<input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" placeholder="Nama Kecamatan" value="<?php echo $kecamatan->nama_kecamatan ?>" >
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default" value="Reset">
		<a href="<?php echo base_url('admin/kecamatan') ?>" class="btn btn-danger"> Kembali</a>
	</div>
</div>

<?php
// form close
echo form_close();
?>