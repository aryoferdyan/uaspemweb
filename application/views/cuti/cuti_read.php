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
					<td>Nama</td>
					<td><?php echo $nama; ?></td>
				</tr>

				<tr>
					<td>Tanggal Mulai Cuti</td>
					<td><?php echo $tanggal1; ?></td>
				</tr>

				<tr>
					<td>Tanggal Masuk</td>
					<td><?php echo $tanggal2; ?></td>
				</tr>

				<tr>
					<td>Jenis</td>
					<td><?php echo $jenis; ?></td>
				</tr>

				<tr>
					<td>Validasi</td>
					<td><?php
						if ($validasi == 1) {
							echo "Disetujui";
						} else {
							echo "Ditolak";
						}
						?></td>
				</tr>

				<tr>
					<td></td>
					<td><a href="<?php echo site_url('cuti') ?>" class="btn btn-default">Kembali</a></td>
				</tr>

			</table>
		</div>
	</section>
</div>