<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Jelita Travel - Halaman Awal</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      background: url('img/background.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .container {
      height: 100vh;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      background-color: rgba(114, 129, 179, 0.66);
      border-radius: 16px;
      padding: 40px 60px;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }
    .card img {
      width: 120px;
      margin-bottom: 20px;
    }
    .title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }
    .subtitle {
      font-size: 16px;
      margin-bottom: 40px;
      color:aliceblue;
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      background-color:rgb(31, 90, 185);
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      bottom: -135px;
      left: 0;
      background-color: white;
      min-width: 160px;
      border: 1px solid #ccc;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 6px;
      overflow: hidden;
    }
    .dropdown-content a {
      color: #333;
      padding: 12px 16px;
      display: block;
      text-decoration: none;
    }
    .dropdown-content a:hover {
      background-color:rgb(183, 195, 243);
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="title">JELITA TRAVEL</div>
    <div class="subtitle">Perjalanan Anda aman, nyaman bersama kami!</div>

    <div class="dropdown">
      <button>Login Sebagai</button>
      <div class="dropdown-content">
        <a href="login.php">👤 Pengguna</a>
        <a href="adminlogin.php">🔐 Admin</a>
        <a href="managerlogin.php">🧑‍💼 Manajer</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
