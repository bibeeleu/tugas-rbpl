<?php
include 'koneksi.php';

$id = $_POST['id'];
$lokasi_berangkat = $_POST['lokasi_berangkat'];
$tujuan = $_POST['tujuan'];
$jam_berangkat = $_POST['jam_berangkat'];
$jam_tiba = $_POST['jam_tiba'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$kursi = $_POST['kursi'];

$query = "UPDATE jadwal SET 
    lokasi_berangkat='$lokasi_berangkat', 
    tujuan='$tujuan', 
    jam_berangkat='$jam_berangkat', 
    jam_tiba='$jam_tiba', 
    tipe='$tipe', 
    harga='$harga', 
    kursi='$kursi' 
    WHERE id='$id'";

if (mysqli_query($connect, $query)) {
    header("Location: admin.php");
} else {
    echo "Gagal mengupdate jadwal: " . mysqli_error($connect);
}
?>
