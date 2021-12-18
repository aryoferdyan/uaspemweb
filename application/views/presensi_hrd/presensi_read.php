
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PRESENSI</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Karyawan</td>
				<td><?php echo $id_karyawan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Waktu Masuk</td>
				<td><?php echo $waktu_masuk; ?></td>
			</tr>
	
			<tr>
				<td>Waktu Keluar</td>
				<td><?php echo $waktu_keluar; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('presensi_hrd') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>