<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PRESENSI</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Karyawan <?php echo form_error('id_karyawan') ?></td><td><input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Id Karyawan" value="<?php echo $id_karyawan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Waktu Masuk <?php echo form_error('waktu_masuk') ?></td><td><input type="text" class="form-control" name="waktu_masuk" id="waktu_masuk" placeholder="Waktu Masuk" value="<?php echo $waktu_masuk; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Waktu Keluar <?php echo form_error('waktu_keluar') ?></td><td><input type="text" class="form-control" name="waktu_keluar" id="waktu_keluar" placeholder="Waktu Keluar" value="<?php echo $waktu_keluar; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_presensi" value="<?php echo $id_presensi; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('presensi_hrd') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>