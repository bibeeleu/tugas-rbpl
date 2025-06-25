<!-- File: gopay.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gopay Payment</title>
    <style>
        body {
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #c2cbdb;
}
        .header {
            background-color: #3C5B8B;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;
        }
        .header .timer {
            position: absolute;
            right: 20px;
            top: 10px;
            font-weight: bold;
        }
        .container {
            text-align: center;
            background-color: #c2cbdb;
            padding: 20px;
            min-height: 400px;
        }
        .qr-code {
            margin: 20px auto;
            width: 250px;
            height: 250px;
            border: 5px solid #fff;
            box-shadow: 0px 0px 10px #aaa;
            background-color: #fff;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
        }
        input[type="text"] {
            padding: 10px;
            width: 80%;
            max-width: 300px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
        }
        .continue-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #e47070;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .bottom-nav {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ccc;
        }
        .nav-item {
            text-align: center;
            font-size: 14px;
            color: #333;
        }
        .nav-item img {
            width: 24px;
            height: 24px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>JELITA Travel</h2>
        <div class="timer">Waiting for Payment <span id="countdown">01:00</span></div>
    </div>

    <div class="container">
        <h3>Scan QR</h3>
        <div class="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=GOPAY-1234567890" alt="QR Code"> <!-- Ganti dengan path QR code kamu -->
        </div>
        <p>or try using a phone number</p>
        <form action="gopaykode.php" method="post">
            <input type="text" name="phone" placeholder="Enter phone number" required>
            <br>
            <button type="submit" class="continue-button">Continue</button>
        </form>
    </div>
</body>
</html>
