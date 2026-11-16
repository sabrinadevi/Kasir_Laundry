<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SISTEM INFORMASI IT LAUNDRY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 CDN -->
   <link rel ="icon" type="image/png" href="icon shop.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #f0f0f0, #e2e2e2);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.5s ease-in-out;
    }
    h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      color: #343a40;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2>SISTEM INFORMASI IT LAUNDRY</h2>

    <?php 
    session_start();
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-danger'>Login gagal! Username dan password salah!</div>";
        } else if ($_GET['pesan'] == "logout") {
            echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "<div class='alert alert-warning'>Silakan login untuk mengakses halaman admin</div>";
        }
    }
    ?>

    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Log In</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
