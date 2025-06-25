<?php
include 'koneksi.php';

$id_jadwal = isset($_GET['id_jadwal']) ? (int)$_GET['id_jadwal'] : 0;
$kursi_terpilih = isset($_GET['selected']) ? explode(',', $_GET['selected']) : [];

if ($id_jadwal && !empty($kursi_terpilih)) {
    foreach ($kursi_terpilih as $no_kursi) {
        $no_kursi = (int)$no_kursi;
        $cek = mysqli_query($connect, "SELECT * FROM kursi_terpesan WHERE id_jadwal = $id_jadwal AND no_kursi = $no_kursi");
        if (mysqli_num_rows($cek) == 0) {
            mysqli_query($connect, "INSERT INTO kursi_terpesan (id_jadwal, no_kursi) VALUES ($id_jadwal, $no_kursi)");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Passenger - Jelita Travel</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      color: #333;
    }

    .header {
      background-color: #3d5a80;
      padding: 20px;
      text-align: center;
      color: white;
    }

    .nav-tabs {
      display: flex;
      justify-content: center;
      gap: 40px;
      background-color: #e0e5ec;
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
    }

    .nav-tabs a {
      text-decoration: none;
      color: #3d5a80;
      padding-bottom: 5px;
      border-bottom: 3px solid transparent;
      font-weight: 500;
    }

    .nav-tabs a.active {
      border-color: #ee6c4d;
      color: #ee6c4d;
    }

    .main-content {
      max-width: 700px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .passenger-card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .passenger-card h2 {
      margin-top: 0;
    }

    .subtitle {
      color: #888;
      margin-bottom: 15px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      font-size: 15px;
    }

    .btn-save {
      background-color: #ee6c4d;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-save:hover {
      background-color: #e85b3c;
    }

    .action-center {
      text-align: center;
      margin-top: 20px;
    }

    .btn-payment {
      background-color: #ee6c4d;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-payment:hover {
      background-color: #e85b3c;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <header class="header">
    <h1>JELITA Travel</h1>
  </header>

  <nav class="nav-tabs">
    <a href="time.php">Time</a>
    <a href="seat.php?id=<?= $id_jadwal ?>">Seat</a>
    <a href="#" class="active">Passenger</a>
    <a href="payment.php">Payment</a>
  </nav>

  <main class="main-content">
    <form action="proses_booking.php" method="POST" id="mainForm">
      <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
      <div id="passenger-container">
        <?php foreach ($kursi_terpilih as $index => $no_kursi): ?>
        <section class="passenger-card">
          <h2>Passenger No <?= $index + 1 ?></h2>
          <p class="subtitle">New Passenger (Kursi No <?= $no_kursi ?>)</p>
          <input type="hidden" name="no_kursi[]" value="<?= $no_kursi ?>">
          <div class="form-group">
            <input type="text" name="first_name[]" placeholder="First Name" required />
            <input type="text" name="last_name[]" placeholder="Last Name" required />
            <input type="text" name="nik[]" placeholder="NIK" required />
            <input type="email" name="email[]" placeholder="Email" required />
            <input type="text" name="phone[]" placeholder="No. Handphone" required />
          </div>
        </section>
        <?php endforeach; ?>
      </div>
      <div class="action-center">
        <button class="btn-payment" type="submit">Proceed to Payment</button>
      </div>
    </form>
  </main>

  <footer class="footer">
    <p>&copy; 2025 Jelita Travel. All rights reserved.</p>
  </footer>

  <script>
    let passengerCount = <?= count($kursi_terpilih) ?>;

    function addPassenger() {
      passengerCount++;
      const container = document.getElementById('passenger-container');

      const section = document.createElement('section');
      section.classList.add('passenger-card');

      section.innerHTML = `
        <h2>Passenger No ${passengerCount}</h2>
        <p class="subtitle">New Passenger</p>
        <input type="hidden" name="no_kursi[]" value="0">
        <div class="form-group">
          <input type="text" name="first_name[]" placeholder="First Name" required />
          <input type="text" name="last_name[]" placeholder="Last Name" required />
          <input type="text" name="nik[]" placeholder="NIK" required />
          <input type="email" name="email[]" placeholder="Email" required />
          <input type="text" name="phone[]" placeholder="No. Handphone" required />
        </div>
      `;

      container.appendChild(section);
    }
  </script>
</body>
</html>