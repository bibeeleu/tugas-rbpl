<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Select Travel Time - Jelita Travel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #f4f6f8;
      color: #333;
    }

    header {
      background-color: #3C5B8B;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      position: relative;
    }

    /* Toggle menu */
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
      font-size: 14px;
      letter-spacing: 0.5px;
      font-weight: 500;
      border-bottom: 1px solid #eee;
    }

    .nav-menu a.no-border {
      border-bottom: none;
    }

    .menu-icon {
      vertical-align: middle;
      margin-right: 8px;
    }

    .nav-tabs {
      display: flex;
      justify-content: center;
      background: #e7ecf3;
      padding: 10px;
    }

    .nav-tabs a {
      padding: 10px 20px;
      text-decoration: none;
      color: #3C5B8B;
      font-weight: 600;
      border-bottom: 3px solid transparent;
      margin: 0 10px;
    }

    .nav-tabs a.active {
      border-bottom: 3px solid #e86f6f;
      color: #e86f6f;
    }

    .container {
      max-width: 700px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .time-label {
      font-weight: bold;
      margin: 25px 0 10px;
      font-size: 18px;
      color: #3C5B8B;
    }

    .card {
      background: white;
      padding: 20px;
      margin-bottom: 15px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .card-info {
      flex: 1;
      min-width: 200px;
    }

    .card-info h4 {
      font-size: 18px;
      margin-bottom: 5px;
      color: #3C5B8B;
    }

    .card-info div {
      font-size: 14px;
      margin-bottom: 4px;
    }

    .card-info span {
      font-size: 14px;
      color: #888;
    }

    .card-action {
      margin-top: 10px;
      text-align: right;
      min-width: 140px;
    }

    .btn-detail, .btn-take {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 10px;
      font-size: 14px;
      text-decoration: none;
      margin-top: 5px;
    }

    .btn-detail {
      background-color: #f0f0f0;
      color: #555;
      margin-right: 10px;
    }

    .btn-take {
      background-color: #e86f6f;
      color: white;
    }

    .btn-take:hover {
      background-color: #d75d5d;
    }

    footer {
      margin-top: 40px;
      text-align: center;
      color: #aaa;
      font-size: 14px;
      padding: 20px 0;
    }

    @media (max-width: 600px) {
      .card {
        flex-direction: column;
        align-items: flex-start;
      }

      .card-action {
        width: 100%;
        text-align: left;
        margin-top: 15px;
      }
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
    <a href="home.php">
      <img src="https://img.icons8.com/ios-filled/20/000000/home.png" alt="Home Icon" class="menu-icon"> Home
    </a>
    <a href="tiket.php">
      <img src="https://img.icons8.com/ios-filled/20/000000/ticket.png" alt="Ticket Icon" class="menu-icon"> Ticket
    </a>
    <a href="login.php" class="no-border">
      <img src="https://img.icons8.com/ios-filled/20/000000/user.png" alt="Login Icon" class="menu-icon"> Login
    </a>
  </div>
</header>

<nav class="nav-tabs">
  <a href="#" class="active">Time</a>
  <a href="#">Seat</a>
  <a href="#">Passenger</a>
  <a href="#">Payment</a>
</nav>

<div class="container">
  <div class="time-label">🕘 09:45</div>

  <div class="card">
    <div class="card-info">
      <h4>09:50 - 12:45</h4>
      <div>Semarang (Reguler) → Yogyakarta (Reguler)</div>
      <span>Rp 95.000 | 3 Seats Left</span>
    </div>
    <div class="card-action">
      <a href="#" class="btn-detail">Details</a>
      <a href="seat.php" class="btn-take">Take it</a>
    </div>
  </div>

  <div class="card">
    <div class="card-info">
      <h4>10:50 - 13:55</h4>
      <div>Semarang (Reguler) → Yogyakarta (Reguler)</div>
      <span>Rp 95.000 | 4 Seats Left</span>
    </div>
    <div class="card-action">
      <a href="#" class="btn-detail">Details</a>
      <a href="seat.php" class="btn-take">Take it</a>
    </div>
  </div>

  <div class="time-label">🕛 12:00</div>

  <div class="card">
    <div class="card-info">
      <h4>12:00 - 15:00</h4>
      <div>Semarang (Premium) → Yogyakarta (Premium)</div>
      <span>Rp 110.000 | 2 Seats Left</span>
    </div>
    <div class="card-action">
      <a href="#" class="btn-detail">Details</a>
      <a href="seat.php" class="btn-take">Take it</a>
    </div>
  </div>
</div>

<footer>
  &copy; 2025 Jelita Travel. All rights reserved.
</footer>

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
