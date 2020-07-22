<form action="<?php echo base_url('admin/kelurahan/tambah') ?>" method="post">
<h3>Tambah data Kelurahan</h3>
<div class="col-md-6">
	<div class="form-group">
		<label>Kecamatan</label>
		<select name="id_kecamatan" class="form-control js-example-basic-single" >
			<option value="">--Pilih--</option>
			<?php foreach ($kecamatan as $kecamatan) { ?>
			<option value="<?php echo $kecamatan->id_kecamatan ?>">
				<?php echo $kecamatan->nama_kecamatan ?>
			</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="nama_kelurahan">Kelurahan</label>
		<input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" placeholder="Nama Kelurahan" value="<?php echo set_value('nama_kelurahan') ?>">
		<?php echo form_error('nama_kelurahan','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		<a href="<?php echo base_url('admin/kelurahan') ?>" class="btn btn-danger"> Kembali</a>
	</div>
</div>
</form>

<script>
// select2
$(document).ready(function() {
    $('.js-example-basic-single').select2({theme: "bootstrap"});
});
</script>