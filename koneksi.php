<?php
session_start();

  // Menghubungkan ke database
  $koneksi = mysqli_connect('localhost','root','','ukk_perpus');

  // Memeriksa koneksi
  if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
  }


?>