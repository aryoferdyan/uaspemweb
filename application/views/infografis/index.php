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
        <div class='row'>
            
            <div class="container">

 <div class="card p-3">
   
 <center>






<hr>
 
<div id='container'>
          <hr>
          <?php
          include 'config.php';
          $tma=($connect->query('SELECT tanggal1, COUNT(*) FROM cuti GROUP BY tanggal1 ORDER BY tanggal1'));
          while ($item=$tma->fetch()){
            $data[]=array($item['tanggal1'],floatval($item['COUNT(*)']));

          }
          $json=json_encode($data);
          echo $json;
          

          ?>

        
<script type="text/javascript">
 Highcharts.chart('container', 
 
 {
  chart:{
   
   zoomType:'x'

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
          $hello=($connect->query('SELECT tanggal, COUNT(*) FROM presensi GROUP BY tanggal ORDER BY tanggal'));
          while ($item=$hello->fetch()){
            $absen[]=array($item['tanggal'],floatval($item['COUNT(*)']));

          }
          $json3=json_encode($absen);
          echo $json3;
          

          ?>
<script type="text/javascript">
 Highcharts.chart('container2', 
 
 {
  chart:{
   
   zoomType:'x'

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