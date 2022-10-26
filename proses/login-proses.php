<?php
include '../helpers/koneksi.php';

$login = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
if (mysqli_num_rows($login) > 0) {
  session_start();

  $data = mysqli_fetch_assoc($login);
  $_SESSION['username'] = $data['username'];
  header("location:../");
} else {
  header("location:../login.php?f");
}
