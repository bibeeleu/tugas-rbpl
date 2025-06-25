<?php
include 'koneksi.php';

// Tangkap id_jadwal dari POST (misalnya setelah pembayaran selesai)
$id_jadwal = isset($_POST['id_jadwal']) ? (int)$_POST['id_jadwal'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #c2cbdb;
        }
        .header {
            background-color: #4b6aa1;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .container {
            text-align: center;
            padding: 50px 20px;
        }
        .success-icon {
            width: 100px;
            height: 100px;
            background-color: #33cc66;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }
        .success-icon::before {
            content: '✔';
            font-size: 50px;
            color: white;
        }
        .message {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }
        .thanks {
            font-size: 18px;
            color: #000;
            margin-bottom: 30px;
        }
        .button {
            background-color: #e47070;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>JELITA Travel</h2>
    </div>

    <div class="container">
        <div class="success-icon"></div>
        <div class="message">Payment successful</div>
        <div class="thanks">Thank you !</div>

        <!-- Tombol menuju tiket.php dengan membawa id_jadwal -->
        <a href="tiket.php?id_jadwal=<?= $id_jadwal ?>" class="button">Lihat Tiket Saya</a>

    </div>

</body>
</html>
