<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">PRESENSI MASUK</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>


					<!-- <td width='200'>ID Presensi <?php echo form_error('id_presensi') ?></td> -->
					<input readonly type="hidden" class="form-control" name="id_presensi" id="id_presensi" placeholder="ID Presensi" value="<?php echo $_SESSION['id_users'] . '-' . date('Y-m-d') ?>" />

					<tr>
						<td width='200'>Tanggal <?php echo form_error('id_presensi')  ?></td>
						<td><input readonly type="text" class="form-control" name="tanggal" id="tanggal" placeholder="dd/mm/yyyy" value="<?php if ($tanggal == '') {
																																				echo date("Y-m-d");
																																			} else {
																																				echo $tanggal;
																																			} ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Waktu Masuk <?php echo form_error('waktu_masuk') ?></td>
						<td><input readonly type="text" class="form-control" name="waktu_masuk" id="waktu_masuk" placeholder="Waktu Masuk" value="<?php if ($tanggal == '') {
																																						echo date('H:i:s', strtotime('+6 hour'));
																																					} else {
																																						echo $waktu_masuk;
																																					} ?>" /></td>
					</tr>


					<tr>
						<td></td>
						<td>
						<input readonly type="hidden" name="waktu_keluar" id="waktu_keluar" value="00:00:00"/>
							<input type="hidden" name="id_karyawan" id="id_karyawan" value="<?php echo  $_SESSION['id_users'] ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
								PRESENSI</button>
							<a href="<?php echo site_url('presensi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>

				</table>
			</form>
		</div>
	</section>
</div>