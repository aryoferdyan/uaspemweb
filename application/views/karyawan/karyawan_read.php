
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA KARYAWAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Sex</td>
				<td><?php echo $sex; ?></td>
			</tr>
	
			<tr>
				<td>Address</td>
				<td><?php echo $address; ?></td>
			</tr>
	
			<tr>
				<td>Place</td>
				<td><?php echo $place; ?></td>
			</tr>
	
			<tr>
				<td>Date</td>
				<td><?php echo $date; ?></td>
			</tr>
	
			<tr>
				<td>Id Jabatan</td>
				<td><?php echo $id_jabatan; ?></td>
			</tr>
	
			<tr>
				<td>Salary</td>
				<td><?php echo $salary; ?></td>
			</tr>
	
			<tr>
				<td>Id Devisi</td>
				<td><?php echo $id_devisi; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>