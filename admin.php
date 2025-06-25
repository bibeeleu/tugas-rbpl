<?php
include 'koneksi.php'; // file koneksi ke database

// Ambil data jadwal dari database
$query = "SELECT * FROM jadwal ORDER BY jam_berangkat ASC";
$result = mysqli_query($connect, $query);

// Simpan hasil query ke array
$jadwal = [];
while ($row = mysqli_fetch_assoc($result)) {
    $id_jadwal = $row['id'];

    // Hitung jumlah kursi terpesan dari tabel kursi_terpesan
    $query_kursi = mysqli_query($connect, "SELECT COUNT(*) as terpesan FROM kursi_terpesan WHERE id_jadwal = $id_jadwal");
    $data_kursi = mysqli_fetch_assoc($query_kursi);

    $total_kursi = $row['kursi']; // ambil dari field kursi di tabel jadwal
    $kursi_tersisa = $total_kursi - $data_kursi['terpesan'];

    $row['kursi_tersisa'] = $kursi_tersisa;
    $jadwal[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Jadwal - Jelita Travel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c2cbdb;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #4b6aa1;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .nav-menu {
            display: flex;
            justify-content: center;
            background-color: #9cacc4;
            padding: 10px 0;
            gap: 30px;
            border-bottom: 2px solid #4b6aa1;
        }

        .nav-item {
            font-size: 14px;
            color: #0a3183;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            position: relative;
        }

        .nav-item::after {
            content: '';
            display: block;
            width: 80%;
            height: 2px;
            background: #0a3183;
            margin: 4px auto 0 auto;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .nav-item:hover::after {
            opacity: 1;
        }

        .nav-item.active {
            background-color: #e47070;
            color: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .nav-item.active::after {
            opacity: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }

        .jadwal-box {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .jadwal-info {
            font-size: 16px;
        }

        .lokasi-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: bold;
            margin-top: 5px;
        }

        .tipe {
            font-size: 14px;
            color: #555;
            margin-top: 3px;
        }

        .harga-kursi {
            margin-top: 6px;
            color: #333;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .edit-button {
            background-color: #e47070;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #d45555;
        }

        .tambah-button {
            background-color: #e47070;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .tambah-button:hover {
            background-color: #d45555;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }

        .bottom-nav a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>JELITA Travel - Admin</h2>
</div>
<div class="nav-menu">
    <a href="admin.php" class="nav-item active">Jadwal Keberangkatan</a>
    <a href="pesananmasuk.php" class="nav-item">Pemesanan</a>
</div>
<div class="container">
    <?php foreach ($jadwal as $j) : ?>
        <?php
            $jam_berangkat = date('H:i', strtotime($j['jam_berangkat']));
            $jam_tiba = date('H:i', strtotime($j['jam_tiba']));
        ?>
        <div class="jadwal-box">
            <div class="jadwal-info">
                <strong><?= $jam_berangkat ?> - <?= $jam_tiba ?></strong><br>
                <div class="lokasi-wrapper">
                    <span><?= $j['lokasi_berangkat'] ?></span>
                    <span>→</span>
                    <span><?= $j['tujuan'] ?></span>
                </div>
                <div class="tipe"><?= $j['tipe'] ?></div>
                <div class="harga-kursi">
                    Rp <?= number_format($j['harga'], 0, ',', '.') ?> - <?= $j['kursi_tersisa'] ?> kursi tersedia
                </div>
            </div>

            <div class="action-buttons">
                <form action="form_edit_jadwal.php" method="get">
                    <input type="hidden" name="id" value="<?= $j['id'] ?>">
                    <button class="edit-button">Edit ✏️</button>
                </form>
                <form action="hapus_jadwal.php" method="post" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                    <input type="hidden" name="id" value="<?= $j['id'] ?>">
                    <button class="edit-button" style="background-color: #e57373;">Hapus 🗑️</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <form action="form_tambah_jadwal.php" method="get">
        <button class="tambah-button">+ Tambah Jadwal</button>
    </form>
</div>

</body>
</html>
