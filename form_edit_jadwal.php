<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM jadwal WHERE id='$id'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal - Jelita Travel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #c2cbdb;
        }

        .header {
            background-color: #4b6aa1;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 15px;
        }

        .container {
            max-width: 500px;
            background-color: #c2cbdb;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        select, input[type="text"], input[type="time"], input[type="number"] {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background: #fff;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            color: white;
        }

        .btn-update {
            background-color: #81c784;
        }

        .btn-update:hover {
            background-color: #66bb6a;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>JELITA Travel - Admin</h2>
</div>

<div class="container">
    <h2 style="text-align:center; color:#2f4f7f;">Edit Jadwal</h2>

    <form action="proses_edit_jadwal.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="form-group">
            <label for="lokasi_berangkat">Lokasi Berangkat</label>
            <select id="lokasi_berangkat" name="lokasi_berangkat" required>
                <?php
                $lokasi = [
                    "Semarang Ungaran (SMG)",
                    "Semarang Srondol (SMG)",
                    "Yogyakarta Seturan (YK)",
                    "Yogyakarta Jombor (YK)"
                ];
                foreach ($lokasi as $l) {
                    echo "<option value=\"$l\" " . ($data['lokasi_berangkat'] == $l ? "selected" : "") . ">$l</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tujuan">To</label>
            <select id="tujuan" name="tujuan" required>
                <?php
                foreach ($lokasi as $l) {
                    echo "<option value=\"$l\" " . ($data['tujuan'] == $l ? "selected" : "") . ">$l</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jam_berangkat">Jam Berangkat</label>
            <input type="time" id="jam_berangkat" name="jam_berangkat" value="<?= $data['jam_berangkat'] ?>" required>
        </div>

        <div class="form-group">
            <label for="jam_tiba">Jam Tiba</label>
            <input type="time" id="jam_tiba" name="jam_tiba" value="<?= $data['jam_tiba'] ?>" required>
        </div>

        <div class="form-group">
            <label for="tipe">Type</label>
            <select id="tipe" name="tipe" required>
                <option value="Reguler" <?= $data['tipe'] == 'Reguler' ? 'selected' : '' ?>>Reguler</option>
                <option value="Premium" <?= $data['tipe'] == 'Premium' ? 'selected' : '' ?>>Premium</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga">Price (Rp)</label>
            <input type="number" id="harga" name="harga" value="<?= $data['harga'] ?>" required>
        </div>

        <div class="form-group">
            <label for="kursi">Jumlah Kursi</label>
            <input type="number" id="kursi" name="kursi" min="1" value="<?= $data['kursi'] ?>" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-update">Simpan Perubahan</button>
        </div>
    </form>
</div>

</body>
</html>