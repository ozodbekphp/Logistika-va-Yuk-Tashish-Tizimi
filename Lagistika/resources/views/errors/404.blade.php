<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1f1c2c, #928dab);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
    }
    .container {
      max-width: 600px;
    }
    h1 {
      font-size: 8rem;
      margin: 0;
      color: #ff6b6b;
      text-shadow: 2px 2px 15px rgba(0,0,0,0.5);
      animation: pulse 1.5s infinite;
    }
    p {
      font-size: 1.5rem;
      margin: 10px 0 30px;
    }
    a {
      text-decoration: none;
      background: #ff6b6b;
      padding: 12px 25px;
      border-radius: 8px;
      color: #fff;
      font-weight: bold;
      transition: 0.3s;
    }
    a:hover {
      background: #ff3b3b;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>404</h1>
    <p>Bunday sahifa topilmadi</p>
    <a href="/">Bosh sahifaga qaytish</a>
  </div>
</body>
</html>
