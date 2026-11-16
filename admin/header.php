<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// PROTEKSI LOGIN
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:../index.php?pesan=belum_login");
    exit();
}

// ACTIVE MENU
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>IT Laundry</title>

<link rel="icon" type="image/png" href="../icon shop.png">

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

/* ================= SIDEBAR ================= */

.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:260px;
    height:100vh;
    background:white;
    padding:24px 18px;
    box-shadow:0 8px 30px rgba(0,0,0,.04);
    z-index:999;
    overflow-y:auto;
}

/* ================= LOGO ================= */

.logo{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:40px;
}

.logo img{
    width:48px;
}

.logo-text h2{
    font-size:22px;
    font-weight:700;
    color:#2563eb;
    margin:0;
    line-height:1;
}

.logo-text span{
    font-size:12px;
    color:#64748b;
    letter-spacing:2px;
}

/* ================= MENU ================= */

.sidebar-menu{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.sidebar-menu a{
    height:54px;
    border-radius:16px;
    display:flex;
    align-items:center;
    gap:14px;
    padding:0 18px;
    text-decoration:none;
    color:#334155;
    font-size:14px;
    font-weight:600;
    transition:.3s;
}

.sidebar-menu a i{
    width:18px;
    font-size:16px;
}

/* ACTIVE */
.sidebar-menu a.active{
    background:#eff6ff;
    color:#2563eb;
}

.sidebar-menu a:hover{
    background:#f8fbff;
    color:#2563eb;
}

/* ================= CARD ================= */

.sidebar-card{
    margin-top:40px;
    background:linear-gradient(180deg,#f8fbff,#e7f0ff);
    border-radius:24px;
    padding:18px;
}

.sidebar-card h4{
    font-size:20px;
    color:#1e293b;
    margin-bottom:10px;
    font-weight:700;
}

.sidebar-card p{
    font-size:13px;
    color:#64748b;
    line-height:1.7;
}

.sidebar-card img{
    width:100%;
    margin-top:14px;
}

/* ================= MAIN ================= */

.main-content{
    margin-left:260px;
    padding:24px;
}

/* ================= SCROLL ================= */

.sidebar::-webkit-scrollbar{
    width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#dbeafe;
    border-radius:20px;
}

/* ================= MOBILE ================= */

@media(max-width:768px){

    .sidebar{
        width:90px;
        padding:20px 10px;
    }

    .logo-text,
    .sidebar-menu a span,
    .sidebar-card{
        display:none;
    }

    .main-content{
        margin-left:90px;
    }

    .sidebar-menu a{
        justify-content:center;
    }

}

</style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <!-- LOGO -->
    <div class="logo">

        <img src="../icon shop.png">

        <div class="logo-text">
            <h2>KASIRE</h2>
            <span>LAUNDRY</span>
        </div>

    </div>

    <!-- MENU -->
    <div class="sidebar-menu">

        <!-- DASHBOARD -->
        <a href="index.php" 
           class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">

            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>

        </a>

        <!-- PELANGGAN -->
        <a href="pelanggan.php" 
           class="<?= ($current_page == 'pelanggan.php') ? 'active' : '' ?>">

            <i class="fa-solid fa-users"></i>
            <span>Pelanggan</span>

        </a>

        <!-- TRANSAKSI -->
        <a href="transaksi.php" 
           class="<?= ($current_page == 'transaksi.php' || $current_page == 'transaksi_tambah.php') ? 'active' : '' ?>">

            <i class="fa-solid fa-receipt"></i>
            <span>Transaksi</span>

        </a>

        <!-- LAPORAN -->
        <a href="laporan.php" 
           class="<?= ($current_page == 'laporan.php') ? 'active' : '' ?>">

            <i class="fa-solid fa-chart-column"></i>
            <span>Laporan</span>

        </a>

        <!-- LOGOUT -->
        <a href="logout.php">

            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>

        </a>

    </div>

    <!-- CARD -->
    <div class="sidebar-card">

        <h4>Kasire Laundry</h4>

        <p>
            Selamat datang kembali,
            <b>
                <?php 
                echo isset($_SESSION['username']) 
                ? $_SESSION['username'] 
                : "User"; 
                ?>
            </b>
            👋
        </p>

        <!-- ICON LAUNDRY -->
        <img src="https://cdn-icons-png.flaticon.com/512/3322/3322056.png">

    </div>

</div>

<!-- ================= MAIN ================= -->

<div class="main-content">