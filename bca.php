<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transfer BCA - Jelita Travel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c2cbdb;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #4b6aa1;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
        }

        .waiting-bar {
            background-color: #e47070;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background-color: #c2cbdb;
            text-align: center;
        }

        .bank-logo {
            margin: 20px auto;
            height: 50px;
        }

        .label {
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }

        .input-box {
            margin: 20px auto;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 300px;
        }

        .input-box input {
            font-size: 18px;
            padding: 10px;
            width: 200px;
            border-radius: 8px;
            border: none;
            text-align: center;
        }

        .copy-btn {
            background: #fff;
            border: none;
            margin-left: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        .continue-btn {
            background-color: #e47070;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 30px;
        }

        .continue-btn:hover {
            background-color: #d45555;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }

        .bottom-nav a {
            text-decoration: none;
            color: #333;
            margin: 0 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="header">
    JELITA Travel
</div>

<div class="waiting-bar">
    Waiting for Payment <span id="timer">01:22</span>
</div>

<div class="container">
    <img src="img/Logo-BCA-PNG.png" alt="BCA Logo" class="bank-logo">
    <div class="label">Transfer Via BCA Mobile</div>

    <div class="input-box">
        <input type="text" id="rekening" value="22345 00788" readonly>
        <button class="copy-btn" onclick="copyRekening()">📋</button>
    </div>

    <button class="continue-btn" onclick="window.location.href='paymentsuccess.php'">Continue</button>
</div>
<script>
    function copyRekening() {
        const rekening = document.getElementById("rekening");
        rekening.select();
        rekening.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Nomor rekening disalin!");
    }

    // Timer countdown example
    let duration = 60; // 1 minute 22 seconds
    const timerEl = document.getElementById("timer");
    setInterval(() => {
        if (duration > 0) {
            duration--;
            const minutes = Math.floor(duration / 60);
            const seconds = duration % 60;
            timerEl.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
    }, 1000);
</script>

</body>
</html>
