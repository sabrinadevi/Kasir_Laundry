<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI FAMILY LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <style>
        @media print {
            body {
                font-size: 12pt;
                font-family: Arial, sans-serif;
                color: #000;
                background: #fff;
            }
            h4 {
                text-align: center;
                margin-bottom: 20px;
            }
            .report-header {
                text-align: center;
                margin-bottom: 30px;
                border-bottom: 2px solid #000;
                padding-bottom: 10px;
            }
            .status-label {
                padding: 4px 10px;
                font-size: 10pt;
                border-radius: 4px;
                border: 1px solid #000;
                display: inline-block;
                text-transform: uppercase;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background-color: #fff;
            }
            th, td {
                padding: 8px;
                border: 1px solid #000;
                text-align: center;
                vertical-align: middle;
                background-color: #fff;
            }
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

<div class="container">
    <?php
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
    ?>

    <div class="report-header">
        <h2>SISTEM INFORMASI FAMILY LAUNDRY</h2>
        <p><strong>Data Laporan Laundry</strong><br>
        Periode: <strong><?php echo $dari; ?></strong> sampai <strong><?php echo $sampai; ?></strong></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Berat (Kg)</th>
                <th>Tgl. Selesai</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = mysqli_query($koneksi, "
                SELECT * FROM pelanggan, transaksi 
                WHERE transaksi_pelanggan = id_pelanggan 
                AND date(tgl_transaksi) >= '$dari' 
                AND date(tgl_transaksi) <= '$sampai' 
                ORDER BY id_transaksi DESC
            ");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
                $statusText = "";
                if ($d['status_transaksi'] == "0") {
                    $statusText = "PROSES";
                } else if ($d['status_transaksi'] == "1") {
                    $statusText = "DICUCI";
                } else if ($d['status_transaksi'] == "2") {
                    $statusText = "SELESAI";
                }
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>INVOICE-<?php echo $d['id_transaksi']; ?></td>
                <td><?php echo $d['tgl_transaksi']; ?></td>
                <td><?php echo $d['nama_pelanggan']; ?></td>
                <td><?php echo $d['berat_transaksi']; ?></td>
                <td><?php echo $d['tgl_selesai']; ?></td>
                <td><?php echo "Rp. " . number_format($d['harga_transaksi'], 0, ',', '.') . " ,-"; ?></td>
                <td><span class="status-label"><?php echo $statusText; ?></span></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>
</div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
