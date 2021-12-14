<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KARYAWAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Sex <?php echo form_error('sex') ?></td><td><input type="text" class="form-control" name="sex" id="sex" placeholder="Sex" value="<?php echo $sex; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Address <?php echo form_error('address') ?></td><td><input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Place <?php echo form_error('place') ?></td><td><input type="text" class="form-control" name="place" id="place" placeholder="Place" value="<?php echo $place; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Date <?php echo form_error('date') ?></td>
						<td><input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Jabatan <?php echo form_error('id_jabatan') ?></td><td><input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Salary <?php echo form_error('salary') ?></td><td><input type="text" class="form-control" name="salary" id="salary" placeholder="Salary" value="<?php echo $salary; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Devisi <?php echo form_error('id_devisi') ?></td><td><input type="text" class="form-control" name="id_devisi" id="id_devisi" placeholder="Id Devisi" value="<?php echo $id_devisi; ?>" /></td>
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