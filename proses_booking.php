<?php
include 'koneksi.php';

$id_jadwal   = $_POST['id_jadwal'];
$kursi       = $_POST['no_kursi'];
$first_name  = $_POST['first_name'];
$last_name   = $_POST['last_name'];
$nik         = $_POST['nik'];
$email       = $_POST['email'];
$phone       = $_POST['phone'];


for ($i = 0; $i < count($first_name); $i++) {
    $no_kursi = mysqli_real_escape_string($connect, $kursi[$i]);
    $fname    = mysqli_real_escape_string($connect, $first_name[$i]);
    $lname    = mysqli_real_escape_string($connect, $last_name[$i]);
    $nik_val  = mysqli_real_escape_string($connect, $nik[$i]);
    $email_val= mysqli_real_escape_string($connect, $email[$i]);
    $phone_val= mysqli_real_escape_string($connect, $phone[$i]);

    mysqli_query($connect, "INSERT INTO penumpang (id_jadwal, no_kursi, first_name, last_name, nik, email, phone) 
                            VALUES ('$id_jadwal', '$no_kursi', '$fname', '$lname', '$nik_val', '$email_val', '$phone_val')");
}

header("Location: payment.php?id_jadwal=$id_jadwal");
exit;
?>
