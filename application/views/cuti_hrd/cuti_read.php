
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA CUTI</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Karyawan</td>
				<td><?php echo $id_karyawan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal1</td>
				<td><?php echo $tanggal1; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal2</td>
				<td><?php echo $tanggal2; ?></td>
			</tr>
	
			<tr>
				<td>Id Jenis</td>
				<td><?php echo $id_jenis; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td>Validasi</td>
				<td><?php echo $validasi; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('cuti_hrd') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>