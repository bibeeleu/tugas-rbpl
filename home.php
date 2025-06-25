<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jelita Travel - Homepage</title>
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

    .hero-section {
      padding: 60px 20px;
      text-align: center;
      background-image: url('img/pantai.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      animation: moveBg 20s linear infinite;
      color: #333;
    }

    @keyframes moveBg {
      0% {
        background-position: 0% 50%;
      }
      100% {
        background-position: 100% 50%;
      }
    }

    .hero-section h1 {
      font-size: 36px;
      margin-bottom: 20px;
      color:rgb(157, 175, 202);
    }

    .hero-section p {
      font-size: 18px;
      color: #fff;
      max-width: 700px;
      margin: 0 auto 30px;
      text-shadow: 0 1px 3px rgba(0,0,0,0.5);
    }

    .hero-section img {
      max-width: 600px;
      width: 90%;
      border-radius: 12px;
      margin-top: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .balance-bar {
      display: flex;
      justify-content: space-between;
      background: #e7ecf3;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 600;
      margin-bottom: 8px;
    }

    .form-group input,
    .form-group select {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .form-inline {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .btn-primary {
      background-color: rgb(230, 123, 123);
      color: white;
      padding: 10px 20px;
      border: none;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }

    .info-boxes {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
      gap: 20px;
    }

    .info-box {
      flex: 1;
      background: #fafafa;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 20px;
      text-align: center;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s;
    }

    .info-box:hover {
      background-color: #f0f0f0;
    }

    footer {
      margin-top: 40px;
      text-align: center;
      color: #aaa;
      font-size: 14px;
    }

    .nav-menu a.no-border {
      border-bottom: none;
    }

    .menu-icon {
      vertical-align: middle;
      margin-right: 8px;
    }

    @media (max-width: 768px) {
      .form-inline {
        flex-direction: column;
      }

      .info-boxes {
        flex-direction: column;
      }
    }

    .services {
      padding: 50px 20px;
      background-color:rgb(191, 203, 225);
    }

    .services .box-services {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
    }

    .box {
      flex: 1 1 calc(33.333% - 20px);
      background-color: #ffffff;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      cursor: pointer;
    }

    .box:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .box img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .box h4 {
      margin-bottom: 10px;
      color: #3C5B8B;
    }

    .box p {
      font-size: 15px;
      color: #555;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .box {
        flex: 1 1 100%;
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
      <a href="home.php"><img src="https://img.icons8.com/ios-filled/20/000000/home.png" alt="Home Icon" class="menu-icon"> Home</a>
      <a href="tiket.php"><img src="https://img.icons8.com/ios-filled/20/000000/ticket.png" alt="Ticket Icon" class="menu-icon"> Ticket</a>
      <a href="login.php" class="no-border"><img src="https://img.icons8.com/ios-filled/20/000000/user.png" alt="Login Icon" class="menu-icon"> Login</a>
    </div>
  </header>

  <section class="hero-section">
    <h1>Welcome to Jelita Travel</h1>
    <p>
      Jelita Travel adalah layanan transportasi terpercaya untuk perjalanan antar kota Anda. 
      Dengan armada nyaman dan jadwal fleksibel, kami siap mengantar Anda dari Yogyakarta ke Semarang (dan sebaliknya) dengan aman dan tepat waktu.
    </p>
    <img src="img/background.jpg" alt="Travel Image" onclick="window.open(this.src, '_blank')" />
  </section>

  <div class="services" id="services">
    <div class="container">
      <div class="box-services">
        <div class="box" onclick="boxClicked('harga')">
          <img src="img/penumpang.jpg" alt="Harga Terjangkau">
          <h4>Harga Terjangkau</h4>
          <p>Nikmati perjalanan nyaman dan hemat biaya.</p>
        </div>
        <div class="box" onclick="boxClicked('sertifikasi')">
          <img src="img/bus.jpg" alt="Tersertifikasi">
          <h4>Sudah Tersertifikasi</h4>
          <p>Kami bekerjasama dengan operator resmi dan berizin.</p>
        </div>
        <div class="box" onclick="boxClicked('aman')">
          <img src="img/supir.jpg" alt="Aman dan Ramah">
          <h4>Aman dan Ramah</h4>
          <p>Utamakan keselamatan dan kenyamanan penumpang.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="balance-bar">
      <div><img src="https://img.icons8.com/color/48/000000/google-pay-india.png" width="20" alt="Google Pay"/> Rp 500.000</div>
      <div><img src="https://img.icons8.com/fluency/48/star.png" width="20" alt="Star"/> Your Point 400 point</div>
    </div>
    <form action="time.php" method="get">
      <div class="form-inline">
        <div class="form-group" style="flex:1">
          <label for="from">From</label>
          <select id="from" name="from">
                <option value="Semarang Ungaran (SMG)">Semarang Ungaran (SMG)</option>
                <option value="Semarang Srondol (SMG)">Semarang Srondol (SMG)</option>
                <option value="Yogyakarta Seturan (YK)">Yogyakarta Seturan (YK)</option>
                <option value="Yogyakarta Jombor (YK)">Yogyakarta Jombor (YK)</option>
          </select>
        </div>
        <div class="form-group" style="flex:1">
          <label for="to">To</label>
          <select id="to" name="to">
                <option value="Semarang Ungaran (SMG)">Semarang Ungaran (SMG)</option>
                <option value="Semarang Srondol (SMG)">Semarang Srondol (SMG)</option>
                <option value="Yogyakarta Seturan (YK)">Yogyakarta Seturan (YK)</option>
                <option value="Yogyakarta Jombor (YK)">Yogyakarta Jombor (YK)</option>
          </select>
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group" style="flex:1">
          <label for="date">Date</label>
          <input type="date" id="date" name="date" value="2025-01-07">
        </div>
        <div class="form-group" style="flex:1">
          <label for="passenger">Passenger</label>
          <input type="number" id="passenger" name="passenger" min="1" value="2">
        </div>
      </div>
      <center>
        <button type="submit" class="btn-primary">Temukan Jadwal</button>
      </center>
    </form>

    <div class="info-boxes">
      <div class="info-box">Top-up & Bill</div>
      <div class="info-box">Travel Information</div>
      <div class="info-box">Promo & Loyalty</div>
    </div>
  </div>
   <br><br>
  <footer>
    &copy; 2025 Jelita Travel. All rights reserved.
    <br><br>
  </footer>

  <script>
    function toggleMenu(element) {
      const menu = document.getElementById("navMenu");
      menu.classList.toggle("active");
      element.classList.toggle("open");
    }

    document.addEventListener("click", function(event) {
      const menu = document.getElementById("navMenu");
      const toggle = document.querySelector(".menu-toggle");

      if (!menu.contains(event.target) && !toggle.contains(event.target)) {
        menu.classList.remove("active");
        toggle.classList.remove("open");
      }
    });

    function boxClicked(id) {
      switch(id) {
        case 'harga':
          alert("Info: Paket hemat mulai Rp 85.000!");
          break;
        case 'sertifikasi':
          alert("Info: Operator travel kami telah bersertifikat resmi.");
          break;
        case 'aman':
          alert("Info: Protokol keselamatan ketat selama perjalanan.");
          break;
        default:
          console.log("Box clicked.");
      }
    }
  </script>
</body>
</html>
