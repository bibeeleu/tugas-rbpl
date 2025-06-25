<?php 
include 'koneksi.php';
$id_jadwal = isset($_GET['id_jadwal']) ? (int)$_GET['id_jadwal'] : 0;
$data = [];

if ($id_jadwal) {
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
            WHERE p.id_jadwal = $id_jadwal
            ORDER BY p.no_kursi ASC";

  $result = mysqli_query($connect, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment - Jelita Travel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {margin: 0;padding: 0;box-sizing: border-box;font-family: 'Inter', sans-serif;}
    body {background-color: #f4f6f8;color: #333;}
    header {background-color: #3C5B8B;color: white;padding: 20px;text-align: center;font-size: 28px;font-weight: bold;}
    .nav-tabs {display: flex;justify-content: center;background: #e7ecf3;padding: 10px;}
    .nav-tabs .tab {padding: 10px 20px;text-decoration: none;color: #3C5B8B;font-weight: 600;border-bottom: 3px solid transparent;margin: 0 10px;}
    .nav-tabs .tab.active {border-bottom: 3px solid #e86f6f;color: #e86f6f;}
    .container {max-width: 700px;margin: 30px auto;background-color: white;border-radius: 12px;box-shadow: 0 4px 10px rgba(0,0,0,0.05);padding: 25px;}
    h3 {margin-bottom: 15px;color: #3C5B8B;}
    .ticket-box {background-color: #f9f9f9;border-radius: 12px;padding: 20px;margin-bottom: 30px;border: 1px solid #ddd;}
    .ticket-row {display: flex;justify-content: space-between;align-items: center;margin-bottom: 12px;}
    .ticket-info {font-size: 16px;}
    .ticket-info strong {color: #3C5B8B;font-size: 18px;}
    .seat-tag {background-color: #e86f6f;color: white;border-radius: 20px;padding: 6px 12px;font-size: 14px;}
    .user-info {font-size: 14px;margin-top: 5px;color: #444;}
    .payment-methods {display: flex;flex-direction: column;gap: 15px;}
    .payment-btn {display: flex;align-items: center;justify-content: flex-start;border: 1px solid #ccc;border-radius: 10px;padding: 12px 16px;background-color: white;cursor: pointer;font-size: 16px;transition: background-color 0.2s ease;}
    .payment-btn:hover {background-color: #f1f1f1;}
    .payment-btn img {height: 24px;margin-right: 12px;}
    footer {margin-top: 40px;text-align: center;color: #aaa;font-size: 14px;padding: 20px 0;}
    @media (max-width: 600px) {
      .ticket-row {flex-direction: column;align-items: flex-start;gap: 5px;}
      .payment-btn {justify-content: center;}
    }
  </style>
</head>
<body>

<header>JELITA Travel</header>

<div class="nav-tabs">
  <a href="time.php" class="tab">Time</a>
  <a href="seat.php?id=<?= $id_jadwal ?>" class="tab">Seat</a>
  <a href="booking.php?id_jadwal=<?= $id_jadwal ?>" class="tab">Passenger</a>
  <a href="#" class="tab active">Payment</a>
</div>

<div class="container">
  <h3>Your Tickets</h3>
  <div class="ticket-box">
    <?php if (!empty($data)): ?>
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
        <hr style="margin: 15px 0;">
      <?php endforeach; ?>
    <?php else: ?>
      <p>Tidak ada data tiket yang ditemukan.</p>
    <?php endif; ?>
  </div>

  <h3>Payment Methods</h3>
  <form action="gopay.php" method="post" class="payment-methods">
    <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
    <button type="submit" name="payment" value="gopay" class="payment-btn">
      <img src="img/gopay.png" alt="Gopay">
      Gopay
    </button>
  </form>
  <br>
  <form action="bca.php" method="post" class="payment-methods">
    <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
    <button type="submit" name="payment" value="bca" class="payment-btn">
      <img src="img/Logo-BCA-PNG.png" alt="BCA">
      BCA
    </button>
  </form>
</div>

<footer>
  &copy; 2025 Jelita Travel. All rights reserved.
</footer>
</body>
</html>
