<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KARYAWAN</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('karyawan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
            </div>
            <div class=' col-md-3'>
                                    <form action="<?php echo site_url('karyawan/index'); ?>" class="form-inline" method="get">
                                        
                                    </form>
                                </div>
                            </div>


                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4 text-center">
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-md-1 text-right">
                                </div>
                                <div class="col-md-3 text-right">

                                </div>
                            </div>
                            <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Address</th>
                                    <th>Place</th>
                                    <th>Date</th>
                                    <th>Id Jabatan</th>
                                    <th>Salary</th>
                                    <th>Id Devisi</th>
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($karyawan_data as $karyawan) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $karyawan->nama ?></td>
                                        <td><?php if ($karyawan->sex == 1) {
                                                echo "Laki-laki";
                                            } else {
                                                echo "Perempuan";
                                            } ?></td>
                                        <td><?php echo $karyawan->address ?></td>
                                        <td><?php echo $karyawan->place ?></td>
                                        <td><?php echo $karyawan->date ?></td>
                                        <td><?php $x = $karyawan->id_jabatan;
                                                 $query = $this->db->query("SELECT jabatan FROM karyawan_jabatan WHERE id_jabatan = $x");
                                                 print_r($query->result());
                                            ?></td>
                                        <td><?php echo $karyawan->salary ?></td>
                                        <td><?php echo $karyawan->id_devisi ?></td>
                                        <td style="text-align:center" width="200px">
                                            <?php
                                            echo anchor(site_url('karyawan/read/' . $karyawan->id_karyawan), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('karyawan/update/' . $karyawan->id_karyawan), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('karyawan/delete/' . $karyawan->id_karyawan), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6 text-right">
                                    <?php echo $pagination ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>