<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
echo form_open(base_url('admin/kelurahan/edit/'.$kelurahan->id_kelurahan));
?>
<div class="col-md-6">
	<div class="form-group">
		<label>Kecamatan</label>
		<select name="id_kecamatan" class="form-control js-example-basic-single" >
			<option value="">--Pilih--</option>
			<?php foreach ($kecamatan as $kecamatan) { ?>
			<option value="<?php echo $kecamatan->id_kecamatan ?>" 
				<?php if($kelurahan->id_kecamatan==$kecamatan->id_kecamatan){ echo "selected";} ?>><?php echo $kecamatan->nama_kecamatan ?>
			</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="nama_kelurahan">Nama Kelurahan</label>
		<input type="text" name="nm_kelurahan" id="nama_kelurahan" class="form-control" placeholder="NIK" value="<?php echo $kelurahan->nama_kelurahan ?>" >
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default" value="Reset">
		<a href="<?php echo base_url('admin/kelurahan') ?>" class="btn btn-danger"> Kembali</a>
	</div>
</div>

<?php
// form close
echo form_close();
?>