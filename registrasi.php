<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jelita Travel - Registrasi</title>
  <link rel="icon" type="image/png" href="img/logo jelita.png" />
  <style>
   body {
  background-image: url('img/background.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-family: Arial, Helvetica, sans-serif;
  min-height: 100vh;
  margin: 0;
  padding: 50px 0;
}

.container {
  max-width: 350px;
  width: 100%;
  background: rgb(148, 162, 197);
  border-radius: 10px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  padding: 0 20px 30px 20px;
  margin: 50px auto; 
}


    .logo-container {
      padding-top: 0;
      margin-top: 0;
    }

    .logo-container img {
      width: 220px;
      margin: 10px auto 10px auto;
      display: block;
    }

    h2 {
      margin-top: 5px;
      font-size: 24px;
    }

    input[type="text"],
    input[type="email"],
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
      <img src="img/logo jelita.png" alt="Logo Jelita Travel" />
    </div>
    <h2>Create Account</h2>
    <form action="prosesregistrasi.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username baru anda" required />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Masukkan email anda" required />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password anda" required />

      <label for="confirm_password">Konfirmasi Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Ulangi password anda" required />

      <input type="submit" value="Sign Up" />
    </form>
    <p>Sudah memiliki akun? <br /><a href="login.php">Login Akun</a></p>
  </div>
</body>
</html>
