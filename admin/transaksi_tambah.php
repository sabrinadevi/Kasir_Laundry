<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .panel {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-top: 30px;
        padding: 20px;
        max-width: 700px; /* Batas lebar panel/card */
        margin-left: auto;
        margin-right: auto;
    }

    .panel-heading {
        background-color: #0d6efd;
        color: white;
        padding: 15px 20px;
        border-radius: 12px 12px 0 0;
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
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        outline: none;
    }

    .select-besar {
        font-size: 16px;
        padding: 10px 12px;
        height: auto;
        line-height: 1.4;
    }

    .btn-primary,
    .btn-info {
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #084cdf;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
        color: white;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .table {
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background-color: #f0f0f0;
        text-align: center;
    }

    .table td input {
        border-radius: 8px;
        padding: 8px;
    }

    .container {
        padding-bottom: 50px;
    }

    @media (max-width: 768px) {
        .panel {
            padding: 15px;
        }
    }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Transaksi Laundry Baru</h4>
        </div>
        <div class="panel-body">
            <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
            <br/><br/>

            <form method="post" action="transaksi_aksi.php">
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select class="form-control select-besar" name="pelanggan" required>
                        <option value="">- Pilih Pelanggan</option>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($d = mysqli_fetch_array($data)) {
                            echo '<option value="'.$d['id_pelanggan'].'">'.$d['nama_pelanggan'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Berat (Kg)</label>
                    <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required>
                </div>

                <div class="form-group">
                    <label>Tgl. Selesai</label>
                    <input type="date" class="form-control" name="tgl_selesai" required>
                </div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                    <?php for ($i = 0; $i < 7; $i++) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <?php } ?>
                </table>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
