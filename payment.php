<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment - Jelita Travel</title>
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
    }

    .nav-tabs {
      display: flex;
      justify-content: center;
      background: #e7ecf3;
      padding: 10px;
    }

    .nav-tabs .tab {
      padding: 10px 20px;
      text-decoration: none;
      color: #3C5B8B;
      font-weight: 600;
      border-bottom: 3px solid transparent;
      margin: 0 10px;
    }

    .nav-tabs .tab.active {
      border-bottom: 3px solid #e86f6f;
      color: #e86f6f;
    }

    .container {
      max-width: 700px;
      margin: 30px auto;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      padding: 25px;
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

    .date-section {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      color: #555;
      margin-top: 10px;
    }

    .user-info {
      font-size: 14px;
      margin-top: 10px;
      display: flex;
      align-items: center;
      color: #444;
    }

    .user-info::before {
      content: '👤';
      margin-right: 6px;
    }

    .payment-methods {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .payment-btn {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 12px 16px;
      background-color: white;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.2s ease;
    }

    .payment-btn:hover {
      background-color: #f1f1f1;
    }

    .payment-btn img {
      height: 24px;
      margin-right: 12px;
    }

    footer {
      margin-top: 40px;
      text-align: center;
      color: #aaa;
      font-size: 14px;
      padding: 20px 0;
    }

    @media (max-width: 600px) {
      .ticket-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
      }

      .date-section {
        flex-direction: column;
        gap: 5px;
      }

      .payment-btn {
        justify-content: center;
        size: 20px;
      }
    }
  </style>
</head>
<body>

<header>JELITA Travel</header>

<div class="nav-tabs">
  <div class="tab">Time</div>
  <div class="tab">Seat</div>
  <div class="tab">Passenger</div>
  <div class="tab active">Payment</div>
</div>

<div class="container">
  <h3>Your Tickets</h3>
  <div class="ticket-box">
    <div class="ticket-row">
      <div class="ticket-info">
        <strong>10:50</strong><br>
        Semarang<br>
        <small>Regular</small>
      </div>
      <div class="seat-tag">Seat 9</div>
    </div>
    <div class="ticket-row">
      <div class="ticket-info">
        <strong>13:55</strong><br>
        Yogyakarta<br>
        <small>Regular</small>
      </div>
      <div class="seat-tag">Seat 10</div>
    </div>
    <div class="date-section">
      <span><strong>9 June</strong>, Friday</span>
      <span>One Way</span>
    </div>
    <div class="user-info" id="user-info">Loading...</div>
  </div>

  <h3>Payment Methods</h3>
  <div class="payment-methods">
    <div class="payment-btn">
      <img src="img/gopay.png" alt="Gopay">
      Gopay
    </div>
    <div class="payment-btn">
      <img src="img/Logo-BCA-PNG.png" alt="BCA">
      BCA
    </div>
  </div>
</div>

<footer>
  &copy; 2025 Jelita Travel. All rights reserved.
</footer>

<script>
  // Get the name from localStorage and update the user-info element
  const userName = localStorage.getItem('userName');
  if (userName) {
    document.getElementById('user-info').textContent = userName;
  } else {
    document.getElementById('user-info').textContent = 'Guest';
  }
</script>

</body>
</html>
