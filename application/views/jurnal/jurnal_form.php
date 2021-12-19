<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA JURNAL</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>

					<tr>
						<td width='200'>Tanggal <?php echo form_error('id_presensi') ?></td>
						<td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Isi <?php echo form_error('isi') ?></td>
						<td> <input class="form-control" rows="3" name="isi" id="isi" placeholder="Isi" value="<?php echo $isi; ?>"></input></td>
					</tr>

					<tr>
						<td></td>
						<td>
							<input type="hidden" class="form-control" name="id_presensi" id="id_presensi" value="<?php echo $_SESSION['id_users'] . '-' . date('Y-m-d') ?>" />
							<input type="hidden" name="id_jurnal" value="<?php echo $id_jurnal; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('jurnal') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>

				</table>
			</form>
		</div>
	</section>
</div>