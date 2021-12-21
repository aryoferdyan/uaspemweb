<script src='code/highcharts.js'></script>
<script src='code/modules/exporting.js'></script>
<script src='code/modules/export-data.js'></script>
<script src='code/modules/accessibility.js'></script>
<script src="<?php echo base_url() ?>assets/code/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/code/modules/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/code/modules/export-data.js"></script>
<script src="<?php echo base_url() ?>assets/code/modules/accessibility.js"></script>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning box-solid">

          <div class="box-header">
            <h3 class="box-title">Infografis</h3>
          </div>
        </div>
      </div>
    </div>

    <?php require_once "config.php" ?>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php
                $tma = ($connect->query('SELECT COUNT(*) AS hasil FROM karyawan'));
                $karyawan = $tma->fetch();
                echo $karyawan['hasil'];  ?>
              </h3>

              <p>Jumlah Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="karyawan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                $tma = ($connect->query('SELECT COUNT(cuti.id_cuti) AS hasil FROM cuti WHERE cuti.validasi = 1'));
                $hasil = $tma->fetch();
                echo $hasil['hasil'];  ?>
              </h3>

              <p>Jumlah Karyawan Cuti</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="cuti_hrd" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php
                $tma = ($connect->query('SELECT COUNT(karyawan.id_karyawan) AS hasil FROM karyawan, presensi WHERE karyawan.id_karyawan = presensi.id_karyawan'));
                $Masuk = $tma->fetch();
                $tdkMasuk = $karyawan['hasil'] - $Masuk['hasil'];
                echo "$tdkMasuk" ?>
              </h3>

              <p>Jumlah Karyawan Tidak Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php
                $tma = ($connect->query('SELECT COUNT(id_devisi) AS hasil FROM karyawan_devisi'));
                $hasil = $tma->fetch();
                echo $hasil['hasil'];  ?>
              </h3>

              <p>Jumlah Divisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <div class='row'>

        <div class="container">

          <div class="card">
            <center>
              <hr>
              <div id='container'>
                <hr>
                <?php
                include 'config.php';
                $tma = ($connect->query('SELECT tanggal1, COUNT(*) FROM cuti GROUP BY tanggal1 ORDER BY tanggal1'));
                while ($item = $tma->fetch()) {
                  $data[] = array($item['tanggal1'], floatval($item['COUNT(*)']));
                }
                $json = json_encode($data);
                echo $json;
                ?>
                <script type="text/javascript">
                  Highcharts.chart('container',

                    {
                      chart: {
                        type: 'areaspline',
                        zoomType: 'x'

                      },

                      title: {
                        text: 'Rekapitulasi Data Cuti Pegawai'
                      },

                      subtitle: {
                        text: 'Berikut ialah grafik rekapitulasi data cuti pekerja yang telah diambil'
                      },
                      yAxis: {
                        title: {
                          text: 'Jumalah Pegawai Cuti'
                        }
                      },
                      xAxis: {
                        type: 'category',
                        accessibility: {
                          rangeDescription: 'Waktu'
                        }
                      },
                      tooltip: {
                        pointFormat: '{point.y} Pegawai'
                      },
                      legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                      },
                      plotOptions: {
                        series: {
                          label: {
                            connectorAllowed: false
                          }
                        }
                      },
                      series: [{
                        name: 'Jumlah Cuti',
                        lineWidth: 2,
                        color: '#f89c14',
                        data: <?= $json ?>
                      }],
                      responsive: {
                        rules: [{
                          condition: {
                            maxWidth: 500
                          },
                          chartOptions: {
                            legend: {
                              layout: 'horizontal',
                              align: 'center',
                              verticalAlign: 'bottom'
                            }
                          }
                        }]
                      }
                    });
                </script>
              </div>
            </center>
          </div>
        </div>


        <div class="container">

          <div class="card p-3">

            <center>
              <div id='container2'>
                <hr>
                <?php
                include 'config.php';
                $hello = ($connect->query('SELECT tanggal, COUNT(*) FROM presensi GROUP BY tanggal ORDER BY tanggal'));
                while ($item = $hello->fetch()) {
                  $absen[] = array($item['tanggal'], floatval($item['COUNT(*)']));
                }
                $json3 = json_encode($absen);
                echo $json3;
                ?>
                <script type="text/javascript">
                  Highcharts.chart('container2',

                    {
                      chart: {
                        type: 'areaspline',
                        zoomType: 'x'

                      },

                      title: {
                        text: 'Rekapitulasi Data Presensi Pekerja'
                      },

                      subtitle: {
                        text: 'Berikut ialah grafik rekapitulasi data presensi yang telah dilaksanakan'
                      },
                      yAxis: {
                        title: {
                          text: 'Jumlah Presensi'
                        }
                      },
                      xAxis: {
                        type: 'category',
                        accessibility: {
                          rangeDescription: 'Waktu'
                        }
                      },
                      tooltip: {
                        pointFormat: '{point.y} Pegawai'
                      },
                      legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                      },
                      plotOptions: {
                        series: {
                          label: {
                            connectorAllowed: false
                          }
                        }
                      },
                      series: [{
                        name: 'Jumalah Presensi',
                        color: '#08a45c',
                        lineWidth: 2,
                        data: <?= $json3 ?>
                      }],
                      responsive: {
                        rules: [{
                          condition: {
                            maxWidth: 500
                          },
                          chartOptions: {
                            legend: {
                              layout: 'horizontal',
                              align: 'center',
                              verticalAlign: 'bottom'
                            }
                          }
                        }]
                      }
                    });
                </script>
              </div>
            </center>
          </div>
        </div>
      </div>
</div>