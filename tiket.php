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

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .ticket-title {
      color: #3C5B8B;
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .ticket-list {
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .ticket-card {
      background-color: #f9f9f9;
      border: 1px solid #d6d6d6;
      border-radius: 10px;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .ticket-info {
      display: flex;
      flex-direction: column;
    }

    .ticket-info strong {
      font-size: 18px;
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .ticket-info img {
      margin-right: 8px;
    }

    .ticket-time {
      font-size: 14px;
      color: #555;
    }

    .ticket-price {
      color: #0077cc;
      font-weight: bold;
      font-size: 18px;
      margin-top: 8px;
    }

    .ticket-arrow {
      font-size: 22px;
      color: #888;
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

    footer {
      text-align: center;
      margin-top: 50px;
      color: #aaa;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <header>JELITA Travel</header>

  <div class="container">
    <div class="ticket-title">Tiket Saya</div>

    <div class="ticket-list">
      <!-- Ticket 1 -->
      <div class="ticket-card">
        <div class="ticket-info">
          <strong><img src="https://img.icons8.com/ios-filled/20/bus.png"/> Semarang - Yogyakarta</strong>
          <span class="ticket-time">10:00 - 12:00 | 01 Maret 2025</span>
          <div class="ticket-price">Rp 75.000</div>
        </div>
        <div class="ticket-arrow">&#8594;</div>
      </div>

      <!-- Ticket 2 -->
      <div class="ticket-card">
        <div class="ticket-info">
          <strong><img src="https://img.icons8.com/ios-filled/20/bus.png"/> Yogyakarta - Ungaran</strong>
          <span class="ticket-time">13:00 - 15:00 | 02 Maret 2025</span>
          <div class="ticket-price">Rp 80.000</div>
        </div>
        <div class="ticket-arrow">&#8594;</div>
      </div>

      <!-- Ticket 3 -->
      <div class="ticket-card">
        <div class="ticket-info">
          <strong><img src="https://img.icons8.com/ios-filled/20/bus.png"/> Ungaran - Semarang</strong>
          <span class="ticket-time">17:00 - 18:30 | 03 Maret 2025</span>
          <div class="ticket-price">Rp 50.000</div>
        </div>
        <div class="ticket-arrow">&#8594;</div>
      </div>
    </div>

    <div class="button-group">
      <button class="btn btn-green">E-Ticket</button>
      <button class="btn btn-red">Refund</button>
    </div>
  </div>

  <footer>
    &copy; 2025 Jelita Travel. All rights reserved.
  </footer>
  <br> <br>
</body>
</html>
