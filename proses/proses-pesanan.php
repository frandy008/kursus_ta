<?php
include '../helpers/koneksi.php';

mysqli_query($koneksi, "UPDATE tbl_pesanan SET status = '1'");
echo '<script>alert("Berhasil memproses pesanan !");window.location.href="../"</script>';
