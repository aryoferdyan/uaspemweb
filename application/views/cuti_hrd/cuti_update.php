<div class="content-wrapper">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo strtoupper($button) ?> DATA CUTI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table table-bordered'>
                    <tr>
                        <td width='200'>Id Karyawan <?php echo form_error('id_karyawan') ?></td>
                        <td><input readonly type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Id Karyawan" value="<?php echo $id_karyawan; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Nama <?php echo form_error('nama') ?></td>
                        <td><input readonly type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Tanggal Mulai Cuti <?php echo form_error('tanggal1') ?></td>
                        <td><input type="date" class="form-control" name="tanggal1" id="tanggal1" placeholder="Tanggal1" value="<?php echo $tanggal1; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Tanggal Masuk <?php echo form_error('tanggal2') ?></td>
                        <td><input type="date" class="form-control" name="tanggal2" id="tanggal2" placeholder="Tanggal2" value="<?php echo $tanggal2; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Jenis <?php echo form_error('id_jenis') ?></td>
                        <td><?php echo cmb_dinamis('id_jenis', 'cuti_jenis', 'jenis', 'id_jenis', $id_jenis, 'DESC') ?>
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>Validasi <?php echo form_error('validasi') ?></td>
                        <td><?php echo cmb_dinamis('validasi', 'cuti_valid', 'pernyataan', 'validasi', $validasi, 'DESC') ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('cuti') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
</div>