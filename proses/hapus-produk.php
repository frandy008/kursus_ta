<?php  
include '../helpers/koneksi.php';

$hapus = mysqli_query($koneksi, "DELETE FROM tbl_produk WHERE id_produk = '$_GET[id]'");

//Jika berhasil di hapus
if ($hapus) {
  //Tampilkan pesan berhasil
  echo '<script>alert("Berhasil menghapus data !");window.location.href="../produk.php"</script>';
} else {
  //Tampilkan pesan gagal + error yang di maksud
  echo '<script>alert("Gagal menghapus data ! ' + mysqli_error($koneksi) + '");window.location.href="../produk.php"</script>';
}
