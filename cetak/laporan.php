<?php
include '../helpers/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan</title>
  <style>
    .kertas {
      width: 210mm;
    }

    table {
      border-collapse: collapse;
    }

    th {
      padding: 5px;
    }

    td {
      padding: 3px;
    }
  </style>
</head>

<body onload="print()">
  <center>
    <div class="kertas">
      <h2>Laporan Penjualan</h2>

      <table width="100%" border="1">
        <thead>
          <tr>
            <th width="20px">No</th>
            <th>Tanggal</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $select = mysqli_query($koneksi, "SELECT *, SUM(total_bayar) AS total_bayar FROM tbl_pesanan WHERE status = '1' AND tanggal BETWEEN '$_GET[dari]' AND '$_GET[sampai]' GROUP BY tanggal");
          while ($data = mysqli_fetch_assoc($select)) {
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['tanggal'] ?></td>
              <td>Rp.<?= number_format($data['total_bayar']) ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </center>
</body>

</html>