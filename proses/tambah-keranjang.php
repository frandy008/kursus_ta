<?php
include '../helpers/koneksi.php';

$data_produk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$_GET[id]'"));
$cek = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE status = '0'");
if (mysqli_num_rows($cek) > 0) {
  $pesanan = mysqli_fetch_assoc($cek);
  $id_pesanan = $pesanan['id_pesanan'];
} else {
  $tanggal = date('Y-m-d');
  $insert = mysqli_query($koneksi, "INSERT INTO tbl_pesanan(tanggal) VALUES('$tanggal')");
  $cek_lagi = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE status = '0'");
  $pesanan = mysqli_fetch_assoc($cek_lagi);
  $id_pesanan = $pesanan['id_pesanan'];
}

$cek_keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_produk = '$_GET[id]' AND id_pesanan = '$id_pesanan'");
if (mysqli_num_rows($cek_keranjang) > 0) {
  $data_keranjang = mysqli_fetch_assoc($cek_keranjang);
  $jumlah = $data_keranjang['jumlah'] + 1;
  $total_harga = $jumlah * $data_produk['harga'];
  mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah = '$jumlah', total_harga = '$total_harga' WHERE id_keranjang = '$data_keranjang[id_keranjang]'");
} else {
  mysqli_query($koneksi, "INSERT INTO tbl_keranjang(id_pesanan,id_produk,jumlah,total_harga) VALUES('$id_pesanan','$_GET[id]','1','$data_produk[harga]')");
}
header("location:../");
