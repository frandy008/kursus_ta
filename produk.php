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
  <?php
  include 'komponen/navbar.php';
  ?>

  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <a href="form-produk.php"><button class="btn btn-sm btn-success">Tambah Produk</button></a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $select_data = mysqli_query($koneksi, "SELECT * FROM tbl_produk ORDER BY nama_produk ASC");
            while ($data = mysqli_fetch_assoc($select_data)) {
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_produk'] ?></td>
                <td>Rp.<?= number_format($data['harga']) ?></td>
                <td>
                  <a href="form-produk.php?id=<?= $data['id_produk'] ?>"><button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button></a>
                  <a href="proses/hapus-produk.php?id=<?= $data['id_produk'] ?>" onclick="return confirm('Yakin hapus data ?')"><button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include 'komponen/modals.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>