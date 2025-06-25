<?php
include 'koneksi.php';
$id = $_POST['id'];

// Hapus penumpang yang terkait terlebih dahulu
mysqli_query($connect, "DELETE FROM penumpang WHERE id_jadwal = '$id'");

// Kemudian hapus jadwal
$query = "DELETE FROM jadwal WHERE id='$id'";

if (mysqli_query($connect, $query)) {
    header("Location: admin.php");
    exit;
} else {
    echo "Gagal menghapus jadwal: " . mysqli_error($connect);
}
?>
