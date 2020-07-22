<div class="form-row">
    <div class="form-group col-md-12">
      <label for="jenis">Silahkan Pilih Jenis Cucian</label>
      <select class="form-control jenisCucian" name="jenis_cucian" id="jenis">
      	<option value="Default" id="default">--Pilih--</option>
      <option value="Kiloan" id="kiloan">Kiloan</option>
      <option value="Satuan" id="satuan">Satuan</option>
      </select>
    </div>
</div>
<div class="row">
<div class="col-md-12">
<form action="<?php echo base_url('admin/pemesanan/tambah') ?>" method="post" id="pilihanKiloan">
<h3>Tambah pemesanan Kiloan</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Customer</label>
		<select name="id_customer" id="" class="form-control" >
			<option value="">--Pilih--</option>
			<?php foreach ($customer as $customer) { ?>
			<option value="<?php echo $customer->id_customer ?>">
				<?php echo $customer->nama ?>
			</option>
			
			<?php } ?>
		</select>
		<?php echo form_error('id_customer','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select name="id_jenis" id="jenis" class="form-control" >
			<option value="">--Pilih--</option>
			<?php foreach ($jenis as $jenis) { ?>
			<option value="<?php echo $jenis->id_jenis ?>">
				<?php echo $jenis->nama_jenis ?> | <?php echo 'Rp.'.number_format($jenis->harga,0,',','.') ?>
			</option>
			
			<?php } ?>
		</select>
		<?php echo form_error('id_jenis','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<label>Paket</label>
		<select name="id_paket" id="jenis" class="form-control" >
			<option value="">--Pilih--</option>
			<?php foreach ($paket as $paket) { ?>
			<option value="<?php echo $paket->id_paket ?>">
				<?php echo $paket->nama_paket ?> | <?php echo 'Rp.'.number_format($paket->harga,0,',','.') ?>
			</option>
			<?php echo form_error('id_paket','<small class="text-danger">','</small>'); ?>
			<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label>Jumlah</label>
		<input type="text" name="jumlah" class="form-control" value="<?php echo set_value('jumlah') ?>">
		<?php echo form_error('jumlah','<small class="text-danger">','</small>'); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/pemesanan') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
</form>
<form action="<?php echo base_url('admin/pemesanan/proses') ?>" method="post" id="pilihanSatuan">
<h3>Tambah pemesanan Satuan</h3>
<div class="col-md-12">
	<div class="form-group">
		<label>Customer</label>
		<select name="id_customer" id="" class="form-control" required>
			<option value="">--Pilih--</option>
			<?php foreach ($customer2 as $customer2) { ?>
			<option value="<?php echo $customer2->id_customer ?>">
				<?php echo $customer2->nama ?>
			</option>
			
			<?php } ?>
		</select>
		<!-- <?php echo form_error('id_customer','<small class="text-danger">','</small>'); ?> -->
	</div>
	
	<div class="form-group">
		<label>Paket</label>
		<select name="id_paket" id="jenis" class="form-control" required>
			<option value="">--Pilih--</option>
			<?php foreach ($paket2 as $paket2) { ?>
			<option value="<?php echo $paket2->id_paket ?>">
				<?php echo $paket2->nama_paket ?> | <?php echo 'Rp.'.number_format($paket2->harga,0,',','.') ?>
			</option>
			<!-- <?php echo form_error('id_paket','<small class="text-danger">','</small>'); ?> -->
			<?php } ?>
		</select>
	</div>
	<label>Pilih Item</label>
	<?php foreach($item as $item) { ?>
	<div class="form-group col-md-12" >
      <div class="input-group" style="margin-bottom: 5px;">
        <div class="input-group-prepend">
        	<table>
        		<tr>
        			<td><label class="form-check-label" id="id_item" style="width: 300px"><input type="checkbox" name="id_item[]" value="<?=$item->id_item?>" id="id_item"><?= $item->nama_item ?> <?= 'Rp'.number_format($item->harga_item)?></label></td>
	        		<td><?php for($i=1; $i<=10; $i++) { ?>
	        			<label class="form-check-label">
			            <input type="radio" name="jumlah_item[]" value="<?=$i?>"><?= $i?></label>
			            <?php } ?></td>
        		</tr>
        		
        	</table>
        	
            
            <!-- <input type="number" min="1" name="jumlah_item[]" class="form-control" placeholder="Masukan Jumlah <?= $item->nama_item?>"> -->
            
        </div>
        <!-- <input type="hidden" name="id_item[]" value="<?=$item->id_item?>"> -->
               
      </div>
    </div>
     <?php } ?>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('admin/pemesanan') ?>" class="btn btn-warning">Kembali</a>
	</div>

</div>
      </form>
    </div>
  </div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  $('.preloader').delay(1000).hide('fast');
  })

  $(document).ready(function() {
      $('#alert').show();

      const $pilihanKiloan = $('#pilihanKiloan');
      const $pilihanSatuan = $('#pilihanSatuan');
      const $kiloan = $('#kiloan');
      const $satuan = $('#satuan');
      const $default = $('#default');
      const $select = $('select'); 

      $pilihanKiloan.hide();
      $pilihanSatuan.hide();

  function pilihan() {
      
      var pilih = $('#jenis').val();
      var a = pilih;

      switch (a) {
          case 'Satuan':
              $pilihanKiloan.hide();
              $pilihanSatuan.slideToggle();
              break;
          case 'Kiloan':
              $pilihanSatuan.hide();
              $pilihanKiloan.slideToggle();
              break;
          default:
          	  $pilihanKiloan.hide();
          	  $pilihanSatuan.hide();
              break;
      }
  }
  $('.jenisCucian').change(pilihan)
  pilihan();

  })
    
  </script>

