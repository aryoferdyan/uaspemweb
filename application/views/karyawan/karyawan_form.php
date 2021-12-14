<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KARYAWAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td>
						<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jenis Kelamin <?php echo form_error('sex') ?></td>
						<td>
							<select class="form-control" name="sex" id="sex">
								<option value="0" <?php if($sex == 0){echo "selected";}?>>Perempuan</option>
								<option value="1" <?php if($sex == 1){echo "selected";}?>>Laki-laki</option>
							</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Alamat <?php echo form_error('address') ?></td>
						<td><input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Lahir <?php echo form_error('place') ?></td>
						<td><input type="text" class="form-control" name="place" id="place" placeholder="Place" value="<?php echo $place; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Lahir <?php echo form_error('date') ?></td>
						<td><input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jabatan <?php echo form_error('id_jabatan') ?></td>
						<td><?php echo cmb_dinamis('id_jabatan', 'karyawan_jabatan', 'jabatan', 'id_jabatan', $id_jabatan,'DESC') ?>
						<!-- <td><input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" /></td> -->
					</tr>
	
					<tr>
						<td width='200'>Salary <?php echo form_error('salary') ?></td>
						<td><input type="text" class="form-control" name="salary" id="salary" placeholder="Salary" value="<?php echo $salary; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Devisi <?php echo form_error('id_devisi') ?></td>
						<!-- <td><input type="text" class="form-control" name="id_devisi" id="id_devisi" placeholder="Id Devisi" value="<?php echo $id_devisi; ?>" /></td> -->
						<td><?php echo cmb_dinamis('id_devisi', 'karyawan_devisi', 'devisi', 'id_devisi', $id_devisi,'ASC') ?>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('karyawan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>