<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Canceled</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f4f4f9;
    }

    .container {
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      background-color: #ffffff;
      max-width: 400px;
      width: 90%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .container .icon {
      font-size: 60px;
      color: #E53935;
      margin-bottom: 20px;
    }

    .container h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .container p {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    .container .button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      color: #ffffff;
      background-color: #E53935;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .container .button:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="icon">❌</div>
    <h1>Payment Canceled</h1>
    <p>Your payment was canceled.</p>
  </div>
</body>
</html>
