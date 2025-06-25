<?php
session_start();
require "koneksimanager.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT * FROM manager WHERE username = ?";
$stmt = $connect->prepare($query_sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $login = $result->fetch_assoc();
    if($password === $login['password']) {
        $_SESSION["username"] = $login["username"];
        $_SESSION["password"] = $login["password"];
        header("location:manager.php");
        exit();
    } else {
        $_SESSION['notif'] = "Password Anda salah!";
        header("location:managerlogin.php");
        exit();
    }
}
else{
    $_SESSION['notif'] = "Username tidak ditemukan!";
    header("location:managerlogin.php");
    exit();
}
?>
