<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
    background-image: url('img/background.jpg');
    background-size: cover;            
    background-position: center;       
    background-repeat: no-repeat;      
    background-attachment: fixed;      
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    overflow: auto;   
    padding: 50px 0;                 
}

    .container {
      max-width: 350px;
      width: 100%;
      background: rgba(148, 162, 197, 0.7);
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      padding: 0 20px 30px 20px;
    }

    .logo-container {
      background-color: transparent;
      padding-top: 0;
      margin-top: 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .logo-container img {
      width: 220px;
      margin: 0 auto;
      display: block;
    }

    h2 {
      margin-top: 15px;
      font-size: 24px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 2px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      font-size: 15px;
    }

    input[type="submit"] {
      width: 50%;
      background-color: #6495ED;
      color: white;
      padding: 10px;
      margin: 25px 0 10px 0;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
    }

    input[type="submit"]:hover {
      background-color: #6480ED;
    }

    label {
    display: block;
    text-align: left;
    margin-top: 15px;
    font-size: 13px;
    color:rgb(255, 255, 255);
    }

    a {
      color: #000080;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .alert {
      padding: 10px;
      border-radius: 10px;
      width: 90%;
      margin: 10px auto;
      text-align: center;
    }

    .success {
      background-color: rgba(144, 238, 144, 0.5);
      color: #006400;
    }

    .error {
      background-color: #f2dede;
      color: #a94442;
    }

  </style>
</head>
<body>

  <div class="container">
    <div class="logo-container">
      <img src="img/logo jelita.png" alt="Logo Jelita Travel">
    </div>
    <h2>Login</h2>
    <form action="adminproseslogin.php" method="post">
      <?php
      session_start();

      if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
          echo "<div class='alert success'>Berhasil membuat akun baru!</div>";
          unset($_SESSION['registration_success']);
      }

      if (isset($_SESSION['notif'])) {
          echo "<div class='alert error'>" . $_SESSION['notif'] . "</div>";
          unset($_SESSION['notif']);
      }
      ?>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username anda" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>

      <input type="submit" value="Login">
    </form>
    <p>Belum punya akun? <br><a href="adminregistrasi.php">Buat akun</a></p>
  </div>

</body>
</html>
