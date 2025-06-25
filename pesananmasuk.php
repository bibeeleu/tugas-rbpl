<?php
include 'koneksi.php';

$data = [];
$pesan_error = '';

$query = "SELECT 
            j.jam_berangkat, 
            j.jam_tiba, 
            j.lokasi_berangkat, 
            j.tujuan, 
            j.tipe,
            p.no_kursi,
            p.first_name,
            p.last_name,
            p.nik,
            p.email,
            p.phone
          FROM penumpang p
          JOIN jadwal j ON j.id = p.id_jadwal
          ORDER BY j.id ASC, p.no_kursi ASC";

$result = mysqli_query($connect, $query);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
} else {
  echo "<p style='color:red; text-align:center;'>Query Error: " . mysqli_error($connect) . "</p>";
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
      margin: 40px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h3 {
      margin-bottom: 15px;
      color: #3C5B8B;
    }

    .ticket-box {
      background-color: #f9f9f9;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      border: 1px solid #ddd;
    }

    .ticket-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }

    .ticket-info {
      font-size: 16px;
    }

    .ticket-info strong {
      color: #3C5B8B;
      font-size: 18px;
    }

    .seat-tag {
      background-color: #e86f6f;
      color: white;
      border-radius: 20px;
      padding: 6px 12px;
      font-size: 14px;
    }

    .user-info {
      font-size: 14px;
      margin-top: 5px;
      color: #444;
    }

    .button-group {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
    }

    .btn {
      padding: 10px 25px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      font-size: 16px;
      transition: 0.3s ease;
    }

    .btn-green {
      background-color: #6fcf97;
      color: white;
    }

    .btn-red {
      background-color: #eb5757;
      color: white;
    }
.ticket-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.btn-status {
  background-color: #eb5757;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-status.success {
  background-color: #6fcf97;
}


    .error {
      color: red;
      text-align: center;
      margin-bottom: 20px;
    }

    footer {
      text-align: center;
      margin-top: 50px;
      color: #aaa;
      font-size: 14px;
    }
    .barcode img {
  height: 60px;
  width: auto;
}

  </style>
<div class="header">
    <h2>JELITA Travel - Admin</h2>
</div>
<div class="nav-menu">
    <a href="admin.php" class="nav-item">Jadwal Keberangkatan</a>
    <a href="pesananmasuk.php" class="nav-item active">Pemesanan</a>
</div>
  <div class="container">
    <h3>Pesanan Berhasil</h3>
    <div class="ticket-box">
      <?php if (!empty($pesan_error)): ?>
        <p class="error"><?= $pesan_error ?></p>
      <?php elseif (!empty($data)): ?>
        <?php foreach ($data as $row): ?>
          <div class="ticket-row">
            <div class="ticket-info">
              <strong>
              <?= date('H:i', strtotime($row['jam_berangkat'])) ?> - 
              <?= date('H:i', strtotime($row['jam_tiba'])) ?>
              </strong><br>
              <?= $row['lokasi_berangkat'] ?> → <?= $row['tujuan'] ?><br>
              <small><?= $row['tipe'] ?></small>
            </div>
            <div class="seat-tag">Seat <?= $row['no_kursi'] ?></div>
          </div>
          <div class="user-info">
            <?= $row['first_name'] ?> <?= $row['last_name'] ?> | NIK: <?= $row['nik'] ?> | <?= $row['email'] ?> | <?= $row['phone'] ?>
          </div>
          <div class="ticket-actions">
  <div class="barcode">
    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?= urlencode($row['nik']) ?>&code=Code128&dpi=96" alt="Barcode Tiket" />
  </div>
  <button class="btn-status" onclick="toggleStatus(this)">Konfirmasi</button>
</div>
          <hr style="margin: 15px 0;">
        <?php endforeach; ?>
      <?php else: ?>
        <p>Tidak ada data tiket yang ditemukan.</p>
      <?php endif; ?>
    <script>
  function toggleStatus(button) {
    button.classList.toggle('success');
    if (button.classList.contains('success')) {
      button.innerText = 'Berhasil';
    } else {
      button.innerText = 'Konfirmasi';
    }
  }
</script>
    </div>
  </div>
</body>
</html>
