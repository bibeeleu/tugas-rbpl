<?php
include 'koneksi.php';

// Validasi ID jadwal
if (!isset($_GET['id'])) {
    echo "ID jadwal tidak ditemukan!";
    exit;
}
$id_jadwal = (int)$_GET['id'];

// Ambil data jadwal
$q_total = mysqli_query($connect, "SELECT * FROM jadwal WHERE id = $id_jadwal");
if (mysqli_num_rows($q_total) == 0) {
    echo "Jadwal tidak ditemukan!";
    exit;
}
$data_jadwal = mysqli_fetch_assoc($q_total);
$total_kursi = (int)$data_jadwal['kursi']; // misal: 8

// Ambil kursi yang sudah dipesan
$q_terpesan = mysqli_query($connect, "SELECT no_kursi FROM kursi_terpesan WHERE id_jadwal = $id_jadwal");
$kursi_terpesan = [];
while ($row = mysqli_fetch_assoc($q_terpesan)) {
    $kursi_terpesan[] = (int)$row['no_kursi'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Seat Selection - Jelita Travel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
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
 .menu-toggle { width: 30px; height: 25px; position: absolute; top: 20px; left: 20px; cursor: pointer; z-index: 101; display: flex; flex-direction: column; justify-content: space-between; }
    .menu-toggle div { width: 100%; height: 4px; background-color: white; transition: 0.4s; border-radius: 2px; }
    .menu-toggle.open .bar1 { transform: rotate(-45deg) translate(-5px, 6px); }
    .menu-toggle.open .bar2 { opacity: 0; }
    .menu-toggle.open .bar3 { transform: rotate(45deg) translate(-5px, -6px); }
    .nav-menu {
      max-height: 0; overflow: hidden; position: absolute; top: 65px; left: 20px; background-color: white;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1); border-radius: 8px; transition: max-height 0.3s ease; width: 180px; z-index: 100;
    }
    .nav-menu.active { max-height: 300px; padding: 10px 0; }
    .nav-menu a {
      display: block; padding: 10px 18px; text-decoration: none; color: #333; font-size: 14px; font-weight: 500; border-bottom: 1px solid #eee;
    }
    .nav-menu a.no-border { border-bottom: none; }
    .nav-tabs {
      display: flex; justify-content: center; background: #e7ecf3; padding: 10px;
    }
    .nav-tabs a {
      padding: 10px 20px; text-decoration: none; color: #3C5B8B; font-weight: 600; border-bottom: 3px solid transparent; margin: 0 10px;
    }
    .nav-tabs a.active {
      border-bottom: 3px solid #e86f6f; color: #e86f6f;
    }
    .main-content {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .seat-info h3 {
      text-align: center;
      margin-bottom: 20px;
    }

    .legend {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .legend div {
      display: flex;
      align-items: center;
      font-size: 14px;
    }

    .legend .box {
      width: 20px;
      height: 20px;
      margin-right: 8px;
      border-radius: 5px;
    }

    .seat-grid {
      display: grid;
      grid-template-columns: 60px 60px 40px 60px;
      grid-auto-rows: 60px;
      justify-content: center;
      gap: 10px;
      margin-bottom: 25px;
    }

    .seat {
      width: 50px;
      height: 50px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: white;
      cursor: pointer;
    }

    .sold { background-color: #d9534f; cursor: not-allowed; }
    .available { background-color: #5bc0de; }
    .selected { background-color: #f0ad4e; }

    .seat-output {
      text-align: center;
      font-weight: 500;
      margin-bottom: 20px;
    }

    .btn-next {
      display: block;
      margin: 0 auto;
      background-color: #e86f6f;
      color: white;
      padding: 12px 20px;
      margin-top: 30px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
    }

    footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #777;
      margin-top: 40px;
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
    <a href="home.php"><img src="https://img.icons8.com/ios-filled/20/000000/home.png" /> Home</a>
    <a href="tiket.php"><img src="https://img.icons8.com/ios-filled/20/000000/ticket.png" /> Ticket</a>
    <a href="login.php" class="no-border"><img src="https://img.icons8.com/ios-filled/20/000000/user.png" /> Login</a>
  </div>
</header>

<nav class="nav-tabs">
  <a href="#">Time</a>
  <a href="#" class="active">Seat</a>
  <a href="#">Passenger</a>
  <a href="#">Payment</a>
</nav>
<main class="main-content">
  <div class="seat-info">
    <h3>Pilih Kursi Anda</h3>

    <div class="legend">
      <div><div class="box" style="background-color:#d9534f"></div>Sold</div>
      <div><div class="box" style="background-color:#5bc0de"></div>Available</div>
      <div><div class="box" style="background-color:#f0ad4e"></div>Selected</div>
    </div>

    <form action="booking.php" method="GET">
      <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
      <div class="seat-grid" id="seatGrid"></div>

      <div class="seat-output">
        Kursi yang dipilih: <span id="selectedSeats">None</span>
        <input type="hidden" name="selected" id="selectedInput">
      </div>

      <button type="submit" class="btn-next">Lanjut ke Penumpang</button>
    </form>
  </div>
</main>

<footer>
  &copy; 2025 Jelita Travel. All rights reserved.
</footer>

<script>
  const seatGrid = document.getElementById('seatGrid');
  const selectedSeatsSpan = document.getElementById('selectedSeats');
  const selectedInput = document.getElementById('selectedInput');

  const kursiTerpesan = <?= json_encode($kursi_terpesan) ?>;
  const totalKursiTersedia = <?= $total_kursi ?>;
  const selected = [];

  // Kursi layout tetap 10 seat dengan formasi bus
  const layout = [
    1, 2, null, 3,
    4, 5, null, 6,
    7, 8, null, 9,
    null, null, null, 10
  ];

  layout.forEach(no => {
    const div = document.createElement('div');

    if (no === null) {
      div.style.visibility = 'hidden';
    } else {
      div.className = 'seat';
      div.innerText = no;

      // Kursi di luar jangkauan total kursi = dianggap tidak tersedia
      const melebihiKapasitas = no > totalKursiTersedia;

      if (kursiTerpesan.includes(no) || melebihiKapasitas) {
        div.classList.add('sold');
      } else {
        div.classList.add('available');
        div.addEventListener('click', () => {
          if (div.classList.contains('selected')) {
            div.classList.remove('selected');
            div.classList.add('available');
            selected.splice(selected.indexOf(no), 1);
          } else {
            div.classList.remove('available');
            div.classList.add('selected');
            selected.push(no);
          }
          selectedSeatsSpan.textContent = selected.join(', ') || 'None';
          selectedInput.value = selected.join(',');
        });
      }
    }

    seatGrid.appendChild(div);
  });
</script>
<script>
  function toggleMenu(btn) {
    btn.classList.toggle("open");
    document.getElementById("navMenu").classList.toggle("active");
  }

  document.addEventListener("click", function (event) {
    const menu = document.getElementById("navMenu");
    const toggle = document.querySelector(".menu-toggle");
    if (!menu.contains(event.target) && !toggle.contains(event.target)) {
      menu.classList.remove("active");
      toggle.classList.remove("open");
    }
  });
</script>
</body>
</html>
