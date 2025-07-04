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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jelita Travel - Tiket Saya</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #eef1f5;
      color: #333;
    }

    header {
      background-color: #3C5B8B;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
    }

    .menu-toggle {
      width: 30px;
      height: 25px;
      position: absolute;
      top: 20px;
      left: 20px;
      cursor: pointer;
      z-index: 101;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .menu-toggle div {
      width: 100%;
      height: 4px;
      background-color: white;
      transition: 0.4s;
      border-radius: 2px;
    }

    .menu-toggle.open .bar1 {
      transform: rotate(-45deg) translate(-5px, 6px);
    }

    .menu-toggle.open .bar2 {
      opacity: 0;
    }

    .menu-toggle.open .bar3 {
      transform: rotate(45deg) translate(-5px, -6px);
    }

    .nav-menu {
      max-height: 0;
      overflow: hidden;
      position: absolute;
      top: 65px;
      left: 20px;
      background-color: white;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      border-radius: 8px;
      transition: max-height 0.3s ease;
      width: 180px;
      z-index: 100;
    }

    .nav-menu.active {
      max-height: 300px;
      padding: 10px 0;
    }

    .nav-menu a {
      display: block;
      padding: 10px 18px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
      font-size: 14px;
      font-weight: 500;
    }

    .nav-menu a:hover {
      background-color: #f1f1f1;
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
.barcode {
  margin-top: 1px;
  text-align: right;

}

.barcode img {
  height: 60px;
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
  </style>
</head>
<body>
  <header>
    <div class="menu-toggle" onclick="toggleMenu(this)">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
    JELITA Travel
    <div class="nav-menu" id="navMenu">
      <a href="home.php"><img src="https://img.icons8.com/ios-filled/20/000000/home.png"/> Home</a>
      <a href="tiket.php"><img src="https://img.icons8.com/ios-filled/20/000000/ticket.png"/> Ticket</a>
      <a href="login.php"><img src="https://img.icons8.com/ios-filled/20/000000/user.png"/> Login</a>
    </div>
  </header>

  <div class="container">
    <h3>Your Tickets</h3>
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
          <div class="barcode">
          <img src="https://barcode.tec-it.com/barcode.ashx?data=<?= urlencode($row['nik']) ?>&code=Code128&dpi=96" alt="Barcode Tiket" />
          </div>
          <hr style="margin: 15px 0;">
        <?php endforeach; ?>
      <?php else: ?>
        <p>Tidak ada data tiket yang ditemukan.</p>
      <?php endif; ?>
    </div>
  </div>

  <script>
    function toggleMenu(element) {
      element.classList.toggle('open');
      document.getElementById('navMenu').classList.toggle('active');
    }
  </script>
  <footer>
    &copy; 2025 Jelita Travel. All rights reserved.
  </footer>
</body>
</html>
