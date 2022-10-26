<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Kios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
  <?php include 'komponen/navbar.php' ?>

  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalCP">Cari Produk</button>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Jumlah</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $status_keranjang = false;
            $pesanan_pending = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE status = '0'");
            if (mysqli_num_rows($pesanan_pending) > 0) {
              $no = 1;
              $total = 0;
              $data_pesanan = mysqli_fetch_assoc($pesanan_pending);
              $select_keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang k JOIN tbl_produk p ON p.id_produk = k.id_produk WHERE id_pesanan = '$data_pesanan[id_pesanan]'");
              if (mysqli_num_rows($select_keranjang) > 0) {
                while ($k = mysqli_fetch_assoc($select_keranjang)) {
                  $status_keranjang = true;
                  $total = $total + $k['total_harga'];
            ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['nama_produk'] ?></td>
                    <td>
                      <a href="proses/min-keranjang.php?id=<?= $k['id_keranjang'] ?>">
                        <button class="btn btn-sm btn-success">
                          <i class="bi bi-dash-lg"></i>
                        </button>
                      </a>
                      <?= $k['jumlah'] ?>
                      <a href="proses/plus-keranjang.php?id=<?= $k['id_keranjang'] ?>">
                        <button class="btn btn-sm btn-success">
                          <i class="bi bi-plus-lg"></i>
                        </button>
                      </a>
                    </td>
                    <td>Rp.<?= number_format($k['total_harga']) ?></td>
                  </tr>
                <?php } ?>
                <tr>
                  <td colspan="3" align="center">Total</td>
                  <td>Rp.<?= number_format($total) ?></td>
                </tr>
              <?php } else { ?>
                <tr>
                  <td colspan="4">Tidak ada data !</td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="4">Tidak ada data !</td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
    if ($status_keranjang == true) {
    ?>
      <div class="row mt-3">
        <div class="col-12 d-flex justify-content-end">
          <a href="proses/proses-pesanan.php" onclick="return confirm('Yakin proses pesanan ?')"><button class="btn btn-sm btn-success">Proses Pesanan</button></a>
        </div>
      </div>
    <?php } ?>
  </div>

  <?php include 'komponen/modals.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>