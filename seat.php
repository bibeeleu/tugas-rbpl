<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      position: relative;
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
      font-size: 14px;
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
      background-color: #e7ecf3;
      padding: 10px;
    }

    .nav-tabs a {
      text-decoration: none;
      color: #3C5B8B;
      font-weight: 600;
      margin: 0 10px;
      padding: 10px;
      border-bottom: 3px solid transparent;
    }

    .nav-tabs a.active {
      border-color: #e86f6f;
      color: #e86f6f;
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
      grid-template-columns: 60px 60px 30px 60px;
      justify-content: center;
      gap: 15px;
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
      margin: 70px;
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
      <a href="home.php">
        <img src="https://img.icons8.com/ios-filled/20/000000/home.png" class="menu-icon" alt="home"> Home
      </a>
      <a href="tiket.php">
        <img src="https://img.icons8.com/ios-filled/20/000000/ticket.png" class="menu-icon" alt="ticket"> Ticket
      </a>
      <a href="login.php" class="no-border">
        <img src="https://img.icons8.com/ios-filled/20/000000/user.png" class="menu-icon" alt="login"> Login
      </a>
    </div>
  </header>

  <nav class="nav-tabs">
    <a href="time.php">Time</a>
    <a href="#" class="active">Seat</a>
    <a href="#">Passenger</a>
    <a href="#">Payment</a>
  </nav>

  <main class="main-content">
    <div class="seat-info">
      <h3>Pick Your Seat</h3>

      <div class="legend">
        <div><div class="box" style="background-color:#d9534f"></div>Sold</div>
        <div><div class="box" style="background-color:#5bc0de"></div>Available</div>
        <div><div class="box" style="background-color:#f0ad4e"></div>Your Pick</div>
      </div>

      <div class="seat-grid" id="seatGrid"></div>

      <div class="seat-output">
        Your seats: <span id="selectedSeats">9 👵 10 👵</span>
      </div>

      <a href="booking.php" class="btn-next">Passenger Details</a>
    </div>
  </main>

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

    // Seat Selection Logic
    const seatGrid = document.getElementById('seatGrid');
    const selectedSeatsSpan = document.getElementById('selectedSeats');

    const seatMap = [
      1, 2, null, 3,
      4, 5, null, 6,
      7, 8, null, 9,
      null, null, null, 10
    ];

    const seatStatus = {
      1: 'available',
      2: 'available',
      3: 'sold',
      4: 'sold',
      5: 'available',
      6: 'sold',
      7: 'available',
      8: 'sold',
      9: 'selected',
      10: 'selected'
    };

    const selected = [];

    seatMap.forEach((num) => {
      const seatDiv = document.createElement('div');
      if (num === null) {
        seatDiv.style.visibility = 'hidden';
      } else {
        const status = seatStatus[num] || 'available';
        seatDiv.className = 'seat ' + status;
        seatDiv.innerText = num;

        if (status !== 'sold') {
          seatDiv.addEventListener('click', () => {
            if (seatDiv.classList.contains('selected')) {
              seatDiv.classList.remove('selected');
              seatDiv.classList.add('available');
              selected.splice(selected.indexOf(num), 1);
            } else {
              seatDiv.classList.remove('available');
              seatDiv.classList.add('selected');
              selected.push(num);
            }
            selectedSeatsSpan.textContent = selected.join(', ') || 'None';
          });
        }

        if (status === 'selected') {
          selected.push(num);
        }
      }
      seatGrid.appendChild(seatDiv);
    });
  </script>
</body>
</html>
