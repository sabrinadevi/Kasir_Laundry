<?php include 'header.php'; ?>
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        padding-bottom: 50px;
    }

    .panel {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 20px;
        transition: all 0.3s ease-in-out;
    }

    .panel-heading {
        background-color: #0d6efd;
        padding: 15px 20px;
        border-radius: 12px 12px 0 0;
        color: white;
    }

    .panel-heading h4 {
        margin: 0;
        font-size: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px 12px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        outline: none;
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #084cdf;
    }

    /* Responsif (opsional) */
    @media (max-width: 768px) {
        .col-md-5 {
            width: 100%;
            margin: 0 auto;
        }
    }
</style>

<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pelanggan Baru</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="pelanggan_aksi.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama ..">
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="Masukkan no.hp ..">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat ..">
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
