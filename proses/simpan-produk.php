<?php
include '../helpers/koneksi.php';

//Jika ID yang dikirimkan sama dengan '' atau kosong
if ($_POST['id'] == '') {
  //Buat baru atau Insert
  $simpan = mysqli_query($koneksi, "INSERT INTO tbl_produk(nama_produk,harga) VALUES('$_POST[nama_produk]','$_POST[harga]')");
} else {
  //Update data yang sudah ada berdasarkan ID
  $simpan = mysqli_query($koneksi, "UPDATE tbl_produk SET nama_produk = '$_POST[nama_produk]', harga = '$_POST[harga]' WHERE id_produk = '$_POST[id]'");
}

//Jika berhasil di simpan
if ($simpan) {
  //Tampilkan pesan berhasil
  echo '<script>alert("Berhasil menyimpan data !");window.location.href="../produk.php"</script>';
} else {
  //Tampilkan pesan gagal + error yang di maksud
  echo '<script>alert("Gagal menyimpan data ! ' + mysqli_error($koneksi) + '");window.location.href="../produk.php"</script>';
}
