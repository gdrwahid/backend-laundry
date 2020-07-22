<div class="card shadow mb-4">
<form action="<?php echo base_url('admin/customer/edit/'.$customer->id_customer) ?>" method="post" enctype="multipart/form-data">
<h3>Edit data customer : <?= $customer->nama?></h3>
<div class="card-body">
<div class="col-md-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $customer->nama ?>">
		<?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?php echo $customer->email ?>" readonly>
		<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control"><?php echo $customer->alamat ?></textarea>
		<?php echo form_error('alamat','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Kecamatan</label>
		<select name="id_kecamatan" id="kecamatan" class="form-control js-example-basic-single" >
			<option value="">--Pilih--</option>
			<?php foreach ($kecamatan as $kecamatan) { ?>
			<option value="<?php echo $kecamatan->id_kecamatan ?>" <?php if($customer->id_kecamatan==$kecamatan->id_kecamatan){ echo "selected";} ?>><?php echo $kecamatan->nama_kecamatan ?>	
			</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Kelurahan</label>
		<select name="id_kelurahan" id="kelurahan" class="form-control js-example-basic-single" >
			<option value="">--Pilih--</option>
			<?php foreach ($kelurahan as $kelurahan) { ?>
			<option value="<?php echo $kelurahan->id_kelurahan ?>" <?php if($customer->id_kelurahan==$kelurahan->id_kelurahan){ echo "selected";} ?>><?php echo $kelurahan->nama_kelurahan ?>	
			</option>
			<?php } ?>		
		</select>
		<div id="loading" style="margin-top: 15px;">
          <img src="<?php echo base_url('images/loading.gif') ;?>" width="18"> <small>Loading...</small>
        </div>
	</div>
	<div class="form-group">
		<label>No HP/WA/Telegram</label>
		<input type="text" name="nohp" class="form-control" value="<?php echo $customer->nohp ?>">
		<?php echo form_error('nohp','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
	<label>Upload Foto</label><br>
		<input type="file" name="foto" placeholder="Foto"><br>
		<small class="text-danger">Max size : 2 mb | Format file : jpg, jpeg, png, pdf</small><br>
		<?php if(!empty($customer->foto)) { ?>
		<img src="<?php echo base_url('assets/upload/customer/'.$customer->foto)?>" class="img img-thumbnail" width="450"> <br>
		<?php } ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/customer') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#kecamatan").change(function(){ // Ketika customer mengganti atau memilih data kecamatan
      $("#kelurahan").hide(); // Sembunyikan dulu combobox kelurahan nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url('index.php/admin/customer/listKelurahan'); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kecamatan : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox kelurahan
          // lalu munculkan kembali combobox kelurahannya
          $("#kelurahan").html(response.list_kelurahan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
</form>
</div>
</div>