<?php
include '../helpers/koneksi.php';

$data_keranjang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_keranjang = '$_GET[id]'"));
$produk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$data_keranjang[id_produk]'"));

$jumlah = $data_keranjang['jumlah'] + 1;
$total_harga = $jumlah * $produk['harga'];

mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah = '$jumlah', total_harga = '$total_harga' WHERE id_keranjang = '$data_keranjang[id_keranjang]'");
header("location:../");
