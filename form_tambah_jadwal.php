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

        .btn-delete {
            background-color: #e57373;
        }

        .btn-delete:hover {
            background-color: #ef5350;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>JELITA Travel - Admin</h2>
</div>

<div class="container">
    <h2 style="text-align:center; color:#2f4f7f;">Tambah Jadwal</h2>

    <form action="proses_tambah_jadwal.php" method="POST">
        <div class="form-group">
            <label for="lokasi_berangkat">Lokasi Berangkat</label>
            <select id="lokasi_berangkat" name="lokasi_berangkat" required>
               <option value="Semarang Ungaran (SMG)">Semarang Ungaran (SMG)</option>
               <option value="Semarang Srondol (SMG)">Semarang Srondol (SMG)</option>
               <option value="Yogyakarta Seturan (YK)">Yogyakarta Seturan (YK)</option>
            <option value="Yogyakarta Jombor (YK)">Yogyakarta Jombor (YK)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tujuan">To</label>
            <select id="tujuan" name="tujuan" required>
                <option value="Semarang Ungaran (SMG)">Semarang Ungaran (SMG)</option>
                <option value="Semarang Srondol (SMG)">Semarang Srondol (SMG)</option>
                <option value="Yogyakarta Seturan (YK)">Yogyakarta Seturan (YK)</option>
                <option value="Yogyakarta Jombor (YK)">Yogyakarta Jombor (YK)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jam_berangkat">Jam Berangkat</label>
            <input type="time" id="jam_berangkat" name="jam_berangkat" required>
        </div>

        <div class="form-group">
            <label for="jam_tiba">Jam Tiba</label>
            <input type="time" id="jam_tiba" name="jam_tiba" required>
        </div>

        <div class="form-group">
            <label for="tipe">Type</label>
            <select id="tipe" name="tipe" required>
                <option value="Reguler">Reguler</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga">Price (Rp)</label>
            <input type="number" id="harga" name="harga" placeholder="Contoh: 95000" required>
        </div>

        <div class="form-group">
            <label for="kursi">Jumlah Kursi</label>
            <input type="number" id="kursi" name="kursi" min="1" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-update">Tambah</button>
        </div>
    </form>
</div>

</body>
</html>
