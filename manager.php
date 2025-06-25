<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Keuangan Rinci - Jelita Travel</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      background-color: #e3e8f0;
    }

    .header {
      background-color: #2e518f;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header h2 {
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: 30px auto;
      background-color: #f5f7fa;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .tabs {
      display: flex;
      justify-content: start;
      margin-bottom: 20px;
    }

    .tab {
      padding: 10px 20px;
      margin-right: 10px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
      background-color: #ddd;
      color: #333;
    }

    .tab.active {
      background-color: #d94e5d;
      color: white;
    }

    .tab.secondary {
      background-color: transparent;
      color: #2e518f;
    }

    .card {
      background-color: white;
      border-left: 6px solid #2e518f;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .card h3 {
      margin-top: 0;
    }

    .card-content {
      display: flex;
      justify-content: space-between;
      font-size: 18px;
    }

    .keuntungan {
      color: green;
      font-weight: bold;
    }

    .pendapatan {
      color: #1a73e8;
      font-weight: bold;
    }

    .rincian {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #cfd8dc;
    }

    .rincian table {
      width: 100%;
      font-size: 16px;
    }

    .rincian td {
      padding: 8px 0;
    }

    .btn-unduh {
      margin-top: 20px;
      background-color: #27ae60;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 6px;
      display: inline-block;
    }

    .btn-unduh:hover {
      background-color: #219150;
    }

  </style>
</head>
<body>

  <div class="header">
    <h2>JELITA TRAVEL</h2>
  </div>

  <div class="container">
    <h2>Laporan Keuangan</h2>

    <div class="tabs">
      <div class="tab active">Bulanan</div>
      <div class="tab secondary">Triwulan</div>
    </div>

    <div class="card">
      <h3>Maret 2025</h3>
      <div class="card-content">
        <div>Total Pendapatan: <span class="pendapatan">Rp. 45.000.000</span></div>
        <div>Keuntungan: <span class="keuntungan">Rp. 15.000.000</span></div>
      </div>
    </div>

    <div class="rincian">
      <h4>Rincian Pendapatan</h4>
      <table>
        <tr>
          <td>Tiket Reguler</td>
          <td style="text-align: right;">Rp. 10.000.000</td>
        </tr>
        <tr>
          <td>Tiket Premium</td>
          <td style="text-align: right;">Rp. 25.000.000</td>
        </tr>
        <tr>
          <td>Layanan Tambahan</td>
          <td style="text-align: right;">Rp. 10.000.000</td>
        </tr>
      </table>

      <a href="laporan-keuangan-maret2025.pdf" class="btn-unduh" download>⬇️ Unduh</a>
    </div>
  </div>

</body>
</html>
