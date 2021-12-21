<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>

    <title>Cetak Slip Gaji</title>
</head>
<body>
    <center>
        <h1 class="mt-2">PT. PERTAMINI</h1>
        <h2>SLIP GAJI</h2>
        <hr width="50%">
    </center>

    

    <div class="container">
        <table>
            <tr>
                <td style="width: 150px;">Nama Karyawan</td>
                <td>: <?= $nama; ?></td>
            </tr>
            <tr>
                <td>ID Karyawan</td>
                <td>: <?= $id_karyawan; ?> </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: <?= $jabatan; ?> </td>
            </tr>
            <tr>
                <td>No. Slip Gaji</td>
                <td>: <?= $no_slip; ?> </td>
            </tr>
        </table>

        <table class="table table-bordered table-striped mt-4 mb-4">
            <thead align="center">
                <th style="width: 70px;">No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </thead>
            <tbody>
                <tr>
                    <td align="center">1</td>
                    <td>Gaji Pokok</td>
                    <td>Rp. <?= number_format($salary,0,',','.'); ?></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td>Tunjangan</td>
                    <td>Rp. <?= number_format($tunjangan,0,',','.'); ?></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td>Potongan</td>
                    <td>Rp. <?= number_format($potongan,0,',','.'); ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">Total Gaji</td>
                    <td>Rp. <?= number_format($salary + $tunjangan - $potongan,0,',','.'); ?></td>
                </tr>
            </tbody>
        </table>

        <table width="100%" align="right">
            <tr>
                <td></td>
                <td>
                    <p>Pegawai</p>
                    <br>
                    <br>
                    <p><b><?= $nama; ?></b></p>
                </td>

                <td width="200px">
                    <p>Surakarta, <?= date("d M Y") ?> <br> Finance, </p>
                    <br>
                    <br>
                    <p>_________________________________</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        window.print();
    </script>
</body>
</html>