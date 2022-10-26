<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
include 'helpers/koneksi.php';
?>
<nav class="navbar navbar-expand-lg bg-success navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Aplikasi Kios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-clipboard-data"></i> Master Data
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="produk.php">Produk</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#modalLaporan"><i class="bi bi-printer"></i> Laporan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>