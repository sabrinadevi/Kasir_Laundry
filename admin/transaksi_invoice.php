<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI IT LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <style>
        body {
            font-family: "Helvetica", sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }

        .invoice-box {
            background: #fff;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .btn-cetak {
            float: right;
            margin-bottom: 20px;
        }

        .btn-cetak .btn {
            border-radius: 5px;
            font-weight: bold;
        }

        .info-item {
            padding: 6px 0;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
        }

        .info-item label {
            width: 180px;
            font-weight: bold;
        }

        .info-item .dot {
            height: 8px;
            width: 8px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
            margin-left: 8px;
        }

        .status-label {
            background-color: orange;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .table-cucian {
            margin-top: 30px;
        }

        .table-cucian th {
            text-align: center;
            background: #f9f9f9;
        }

        .footer-text {
            text-align: center;
            font-style: italic;
            margin-top: 30px;
            color: #666;
        }
    </style>
</head>
<body>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include '../koneksi.php';
?>

<div class="invoice-box">
    <?php
    $id = $_GET['id'];
    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi, pelanggan WHERE id_transaksi='$id' AND transaksi_pelanggan=id_pelanggan");
    while ($t = mysqli_fetch_array($transaksi)) {
    ?>
        <div class="btn-cetak">
            <a href="transaksi_invoice_cetak.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary">
                <i class="glyphicon glyphicon-print"></i> CETAK
            </a>
        </div>

        <h2>IT LAUNDRY</h2>

        <div class="info-item"><label>No. Invoice</label>: INVOICE-<?php echo $t['id_transaksi']; ?></div>
        <div class="info-item"><label>Tgl. Laundry</label>: <?php echo $t['tgl_transaksi']; ?></div>
        <div class="info-item"><label>Nama Pelanggan</label>: <?php echo $t['nama_pelanggan']; ?></div>
        <div class="info-item"><label>HP</label>: <?php echo $t['nohp_pelanggan']; ?></div>
        <div class="info-item"><label>Alamat</label>: <?php echo $t['alamat_pelanggan']; ?></div>
        <div class="info-item"><label>Berat Cucian (Kg)</label>: <?php echo $t['berat_transaksi']; ?></div>
        <div class="info-item">
            <label>Tgl. Selesai</label>: <?php echo $t['tgl_selesai']; ?> 
        </div>
        <div class="info-item">
            <label>Status</label>: 
            <?php
            if ($t['status_transaksi'] == "0") {
                echo "<span class='status-label'>PROSES</span>";
            } elseif ($t['status_transaksi'] == "1") {
                echo "<span class='status-label' style='background:#17a2b8;'>DI CUCI</span>";
            } elseif ($t['status_transaksi'] == "2") {
                echo "<span class='status-label' style='background:#28a745;'>SELESAI</span>";
            }
            ?>
        </div>
        <div class="info-item"><label>Harga</label>: Rp. <?php echo number_format($t['harga_transaksi']) ?> ,</div>

        <h4 class="text-center table-cucian">Daftar Cucian</h4>
        <table class="table table-bordered" style="border: 1px solid #ddd;">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_trans = $t['id_transaksi'];
                $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE transaksi_pakaian='$id_trans'");
                while ($p = mysqli_fetch_array($pakaian)) {
                ?>
                    <tr>
                        <td><?php echo $p['jenis_pakaian']; ?></td>
                        <td class="text-center"><?php echo $p['jumlah_pakaian']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="footer-text">" Terima Kasih Telah Memilih IT Laundry "</div>
    <?php } ?>
</div>

</body>
</html>
