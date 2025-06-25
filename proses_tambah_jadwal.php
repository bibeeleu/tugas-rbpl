<?php
include 'koneksi.php'; // koneksi ke MySQL

$jam_berangkat = $_POST['jam_berangkat'];
$jam_tiba = $_POST['jam_tiba'];
$lokasi_berangkat = $_POST['lokasi_berangkat'];
$tujuan = $_POST['tujuan'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$kursi = $_POST['kursi'];

$query = "INSERT INTO jadwal (jam_berangkat, jam_tiba, lokasi_berangkat, tujuan, tipe, harga, kursi) 
          VALUES ('$jam_berangkat', '$jam_tiba', '$lokasi_berangkat', '$tujuan', '$tipe', '$harga', '$kursi')";

mysqli_query($connect, $query);
header("Location: admin.php");
?>
