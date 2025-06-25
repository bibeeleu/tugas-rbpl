<?php
session_start();
require_once "managerkoneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi konfirmasi password
if ($password !== $confirm_password) {
    header("Location: managerregistrasi.php?error=password_mismatch");
    exit();
}

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: managerregistrasi.php?error=invalid_email");
    exit();
}

// Cek username/email
$query = "SELECT * FROM manager WHERE username = ? OR email = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: managerregistrasi.php?error=admin_exists");
    exit();
}

// Simpan data tanpa enkripsi password
$insert_query = "INSERT INTO manager (username, email, password) VALUES (?, ?, ?)";
$insert_stmt = $connect->prepare($insert_query);
$insert_stmt->bind_param("sss", $username, $email, $password); // Simpan password dalam bentuk asli

if ($insert_stmt->execute()) {
    $_SESSION['registration_success'] = true;
    header("Location: managerlogin.php");
    exit();
} else {
    header("Location: managerregistrasi.php?error=registration_failed");
    exit();
}
?>
