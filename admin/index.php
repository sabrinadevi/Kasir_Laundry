<?php 
include 'header.php'; 
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Laundry</title>

<!-- FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f8ff;
}

/* MAIN */
.main-dashboard{
    padding:24px;
}

/* ================= HERO ================= */

.hero-dashboard{
    width:100%;
    margin-bottom:20px;
}
.hero-left{
    width:100%;
}
.hero-left h1{
    font-size:64px;
    color:#1e3a8a;
    margin-bottom:10px;
    font-weight:700;
    line-height:1;
}

.hero-left p{
    color:#475569;
    font-size:18px;
    margin-bottom:8px;
}

.hero-left span{
    color:#2563eb;
    font-weight:700;
}

.hero-left small{
    font-size:14px;
    color:#64748b;
}

/* IMAGE */
.hero-image img{
    width:240px;
}

/* ================= STATS ================= */

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:28px;
}

/* CARD */
.stats-card{
    background:white;
    border-radius:24px;
    padding:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    transition:.3s;
}

.stats-card:hover{
    transform:translateY(-5px);
}

.stats-top{
    margin-bottom:18px;
}

.stats-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}

/* ICON COLORS */
.icon-blue{
    background:#e7f0ff;
    color:#2563eb;
}

.icon-orange{
    background:#fff4e6;
    color:#f59e0b;
}

.icon-cyan{
    background:#e0f7ff;
    color:#06b6d4;
}

.icon-green{
    background:#dcfce7;
    color:#16a34a;
}

/* TEXT */
.stats-card h2{
    font-size:42px;
    color:#1e3a8a;
    margin-bottom:4px;
}

.stats-card h5{
    font-size:16px;
    color:#334155;
    margin-bottom:8px;
}

.stats-card p{
    font-size:13px;
    color:#64748b;
}

/* ================= TABLE ================= */

.table-card{
    background:white;
    border-radius:30px;
    padding:28px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
}

/* TITLE */
.section-title{
    margin-bottom:22px;
}

.section-title h3{
    font-size:30px;
    color:#1e3a8a;
    font-weight:700;
}

/* TABLE */
.table-wrapper{
    overflow-x:auto;
}

.table-modern{
    width:100%;
    border-collapse:collapse;
    min-width:900px;
}

/* HEADER */
.table-modern thead th{
    background:#eef4ff;
    padding:16px 14px;
    color:#1e3a8a;
    font-size:13px;
    font-weight:700;
    text-align:left;
}

.table-modern thead th:first-child{
    border-radius:12px 0 0 12px;
}

.table-modern thead th:last-child{
    border-radius:0 12px 12px 0;
}

/* BODY */
.table-modern tbody td{
    padding:18px 14px;
    border-bottom:1px solid #edf2ff;
    color:#334155;
    font-size:14px;
    white-space:nowrap;
}

/* STATUS */
.status{
    padding:8px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:6px;
}

.status.proses{
    background:#dbeafe;
    color:#2563eb;
}

.status.cuci{
    background:#cffafe;
    color:#0891b2;
}

.status.selesai{
    background:#dcfce7;
    color:#16a34a;
}

/* CUSTOMER */
.customer-box{
    display:flex;
    align-items:center;
    gap:14px;
}

.customer-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:15px;
    font-weight:700;
    color:white;
}

.customer-name{
    font-size:15px;
    font-weight:600;
    color:#1e293b;
}

/* WARNA */
.pink{
    background:#ec4899;
}

.purple{
    background:#a855f7;
}

.blue{
    background:#6366f1;
}

.green{
    background:#10b981;
}

.orange{
    background:#f59e0b;
}

.cyan{
    background:#14b8a6;
}

/* RESPONSIVE */
@media(max-width:768px){

    .main-dashboard{
        padding:14px;
    }

    .hero-dashboard{
        flex-direction:column;
        text-align:center;
        gap:20px;
    }

    .hero-left h1{
        font-size:42px;
    }

    .hero-image img{
        width:180px;
    }

}

</style>

</head>

<body>

<div class="container-fluid main-dashboard">

    <!-- HERO -->
    <div class="hero-dashboard">

        <!-- LEFT -->
        <div class="hero-left">

            <h1>Dashboard</h1>

            <p>
                Selamat datang kembali,
                <span>
                    <?php echo $_SESSION['username']; ?>
                </span>
                👋
            </p>

            <small>
                Kelola bisnis laundry dengan mudah, cepat dan efisien.
            </small>

        </div>

        

    <!-- STATS -->
    <div class="stats-grid">

        <!-- PELANGGAN -->
        <div class="stats-card">

            <div class="stats-top">

                <div class="stats-icon icon-blue">
                    <i class="fa-solid fa-users"></i>
                </div>

            </div>

            <h2>
                <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pelanggan")); ?>
            </h2>

            <h5>Total Pelanggan</h5>

            <p>Semua pelanggan terdaftar</p>

        </div>

        <!-- PROSES -->
        <div class="stats-card">

            <div class="stats-top">

                <div class="stats-icon icon-orange">
                    <i class="fa-solid fa-box-open"></i>
                </div>

            </div>

            <h2>
                <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE status_transaksi='0'")); ?>
            </h2>

            <h5>Diproses</h5>

            <p>Pesanan sedang diproses</p>

        </div>

        <!-- DICUCI -->
        <div class="stats-card">

            <div class="stats-top">

                <div class="stats-icon icon-cyan">
                    <i class="fa-solid fa-droplet"></i>
                </div>

            </div>

            <h2>
                <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE status_transaksi='1'")); ?>
            </h2>

            <h5>Dicuci</h5>

            <p>Pesanan sedang dicuci</p>

        </div>

        <!-- SELESAI -->
        <div class="stats-card">

            <div class="stats-top">

                <div class="stats-icon icon-green">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

            </div>

            <h2>
                <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE status_transaksi='2'")); ?>
            </h2>

            <h5>Selesai</h5>

            <p>Pesanan selesai hari ini</p>

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-card">

        <div class="section-title">
            <h3>Riwayat Transaksi</h3>
        </div>

        <div class="table-wrapper">

            <table class="table-modern">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Pelanggan</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM transaksi, pelanggan WHERE transaksi_pelanggan=id_pelanggan ORDER BY id_transaksi DESC LIMIT 7");
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td><?php echo $no; ?></td>

                    <td>
                        INV-<?php echo $d['id_transaksi']; ?>
                    </td>

                    <td>

                        <div class="customer-box">

                            <div class="customer-avatar 
                            <?php 
                            $warna = ['pink','purple','blue','green','orange','cyan'];
                            echo $warna[$no % 6];
                            ?>
                            ">

                                <?php echo strtoupper(substr($d['nama_pelanggan'],0,1)); ?>

                            </div>

                            <div class="customer-name">
                                <?php echo $d['nama_pelanggan']; ?>
                            </div>

                        </div>

                    </td>

                    <td>
                        <?php echo $d['berat_transaksi']; ?> Kg
                    </td>

                    <td>
                        Rp <?php echo number_format($d['harga_transaksi']); ?>
                    </td>

                    <td>

                        <?php
                        if($d['status_transaksi']=="0"){
                            echo "<span class='status proses'>● Proses</span>";
                        }else if($d['status_transaksi']=="1"){
                            echo "<span class='status cuci'>● Dicuci</span>";
                        }else{
                            echo "<span class='status selesai'>● Selesai</span>";
                        }
                        ?>

                    </td>

                </tr>

                <?php 
                $no++;
                } 
                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>