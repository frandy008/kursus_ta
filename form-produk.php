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
  if (isset($_GET['id'])) {
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$_GET[id]'"));
    $id_produk = $data['id_produk'];
    $nama_produk = $data['nama_produk'];
    $harga = $data['harga'];
  } else {
    $id_produk = '';
    $nama_produk = '';
    $harga = '';
  }
  ?>

  <div class="container">
    <h4 class="text-center mt-5">Form Produk</h4>
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <form action="proses/simpan-produk.php" method="POST">
          <input type="hidden" name="id" value="<?= $id_produk ?>">
          <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" autocomplete="off" class="form-control" value="<?= $nama_produk ?>">
          </div>
          <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" autocomplete="off" class="form-control" value="<?= $harga ?>">
          </div>
          <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-sm btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'komponen/modals.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>