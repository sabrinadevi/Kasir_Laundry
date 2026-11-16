<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>

    <!-- Gunakan CDN Bootstrap agar tidak masalah dengan path lokal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background: #f0f0f0;
        }
        .panel {
            margin-top: 80px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == "oke") {
            echo "<div class='alert alert-success'>Password telah diganti!</div>";
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="ganti_password_aksi.php">
                    <div class="form-group">
                        <label>Masukkan Password Baru</label>
                        <input type="password" class="form-control" name="password_baru" placeholder="Masukkan Password Baru Anda .." required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Ganti Password">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
