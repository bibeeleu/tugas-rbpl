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

  <!-- Navigation -->
  <nav class="nav-tabs">
    <a href="time.php">Time</a>
    <a href="seat.php">Seat</a>
    <a href="#" class="active">Passenger</a>
    <a href="payment.html">Payment</a> <!-- Payment page link -->
  </nav>

  <!-- Main content -->
  <main class="main-content">
    <!-- Passenger 1 -->
    <section class="passenger-card">
      <h2>Passenger No 1</h2>
      <p class="subtitle">New Passenger</p>
      <form class="form-group">
        <input type="text" id="first-name" placeholder="First Name" required />
        <input type="text" id="last-name" placeholder="Last Name" required />
        <input type="text" id="nik" placeholder="NIK" required />
        <input type="email" id="email" placeholder="Email" required />
        <input type="text" id="phone" placeholder="No. Handphone" required />
        <button type="button" class="btn-save" onclick="savePassengerData()">+ Save This Passenger</button>
      </form>
    </section>

    <!-- Passenger 2 (optional) -->
    <section class="passenger-card">
      <h2>Passenger No 2</h2>
      <p class="subtitle">New Passenger</p>
      <form class="form-group">
        <input type="text" id="first-name2" placeholder="First Name" required />
        <input type="text" id="last-name2" placeholder="Last Name" required />
        <input type="text" id="nik2" placeholder="NIK" required />
        <input type="email" id="email2" placeholder="Email" required />
        <input type="text" id="phone2" placeholder="No. Handphone" required />
        <button type="button" class="btn-save" onclick="savePassengerData2()">+ Save This Passenger</button>
      </form>
    </section>

    <div class="action-center">
  <a href="payment.php">
    <button class="btn-payment">Proceed to Payment</button>
  </a>
</div>

  </main>

  <footer class="footer">
    <p>&copy; 2025 Jelita Travel. All rights reserved.</p>
  </footer>

  <script>
    function savePassengerData() {
      // Save passenger 1 data to localStorage
      const passenger1 = {
        firstName: document.getElementById('first-name').value,
        lastName: document.getElementById('last-name').value,
        nik: document.getElementById('nik').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value
      };
      localStorage.setItem('passenger1', JSON.stringify(passenger1));
      alert('Passenger 1 Saved!');
    }

    function savePassengerData2() {
      // Save passenger 2 data to localStorage (optional)
      const passenger2 = {
        firstName: document.getElementById('first-name2').value,
        lastName: document.getElementById('last-name2').value,
        nik: document.getElementById('nik2').value,
        email: document.getElementById('email2').value,
        phone: document.getElementById('phone2').value
      };
      localStorage.setItem('passenger2', JSON.stringify(passenger2));
      alert('Passenger 2 Saved!');
    }

    function goToPayment() {
      // When moving to the payment page, we can pass the data
      window.location.href = 'payment.html'; // Ensure payment.html is ready to retrieve data
    }
  </script>
</body>
</html>
