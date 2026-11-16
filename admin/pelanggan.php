<?php 
include 'header.php';
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Pelanggan</title>

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
    min-height:100vh;
}

/* CONTAINER */
.main-box{
    padding:24px;
}

/* CARD */
.card-modern{
    background:white;
    border-radius:24px;
    padding:20px;
    margin-bottom:24px;
    box-shadow:0 8px 30px rgba(0,0,0,.04);
}

/* TITLE */
.section-title{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:20px;
}

.title-icon{
    width:40px;
    height:40px;
    border-radius:12px;
    background:#e7f0ff;
    color:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
}

.section-title h3{
    font-size:24px;
    font-weight:700;
    color:#1e3a8a;
}

/* FORM */
.form-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:16px;
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-size:13px;
    font-weight:600;
    color:#334155;
}

.form-control-modern{
    width:100%;
    height:46px;
    border-radius:12px;
    border:1px solid #dbeafe;
    padding:0 14px;
    outline:none;
    font-size:13px;
    transition:.3s;
}

.form-control-modern:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.08);
}

/* BUTTON */
.btn-save{
    height:44px;
    padding:0 18px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:white;
    font-size:13px;
    font-weight:600;
    display:inline-flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
}

/* TABLE TOP */
.table-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:14px;
    margin-bottom:16px;
}

/* SEARCH */
.search-box{
    position:relative;
}

.search-box input{
    width:240px;
    height:40px;
    border-radius:10px;
    border:1px solid #dbeafe;
    padding:0 38px 0 14px;
    outline:none;
    font-size:12px;
}

.search-box i{
    position:absolute;
    right:14px;
    top:13px;
    font-size:12px;
    color:#94a3b8;
}

/* TABLE */
.table-wrapper{
    overflow-x:auto;
}

.table-modern{
    width:100%;
    border-collapse:collapse;
    min-width:1200px;
    line-height:1;
}

/* HEADER */
.table-modern thead th{
    background:#eef4ff;
    padding:10px 10px;
    color:#1e3a8a;
    font-size:12px;
    font-weight:700;
    text-align:left;
    white-space:nowrap;
}

.table-modern thead th:first-child{
    border-radius:10px 0 0 10px;
}

.table-modern thead th:last-child{
    border-radius:0 10px 10px 0;
}

/* BODY */
.table-modern tbody td{
    padding:12px 10px;
    border-bottom:1px solid #edf2ff;
    color:#334155;
    font-size:12px;
    font-weight:500;
    white-space:nowrap;
    vertical-align:middle;
}

/* CUSTOMER */
.customer-box{
    display:flex;
    align-items:center;
    gap:10px;
}

/* AVATAR */
.customer-avatar{
    width:32px;
    height:32px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:11px;
    font-weight:700;
    color:white;
}

/* COLORS */
.avatar-blue{
    background:#3b82f6;
}

.avatar-purple{
    background:#a855f7;
}

.avatar-orange{
    background:#f59e0b;
}

.avatar-pink{
    background:#ec4899;
}

.avatar-green{
    background:#10b981;
}

.avatar-teal{
    background:#14b8a6;
}

.avatar-indigo{
    background:#6366f1;
}

/* PHONE */
.phone-box{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    background:#f8fbff;
    padding:7px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
    color:#1e3a8a;
    min-width:155px;
    letter-spacing:.2px;
    box-shadow:0 2px 8px rgba(0,0,0,.03);
}

.phone-box i{
    font-size:12px;
    color:#475569;
}

/* LOCATION */
.location-box{
    display:flex;
    align-items:center;
    gap:6px;
}

/* TRANSACTION */
.transaction-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    background:#eff6ff;
    color:#2563eb;
    padding:5px 10px;
    border-radius:999px;
    font-size:11px;
    font-weight:700;
    min-width:100px;
}

/* DATE */
.date-box{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:11px;
}

/* STATUS */
.status{
    padding:5px 12px;
    border-radius:999px;
    font-size:11px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:6px;
}

.status.active{
    background:#dcfce7;
    color:#16a34a;
}

/* ACTION */
.action-group{
    display:flex;
    align-items:center;
    gap:8px;
}

.action-btn{
    width:32px;
    height:32px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    transition:.2s;
    font-size:11px;
}

.action-btn:hover{
    transform:translateY(-2px);
}

.edit-btn{
    background:#eff6ff;
    color:#2563eb;
}

.delete-btn{
    background:#fff1f2;
    color:#ef4444;
}

/* RESPONSIVE */
@media(max-width:768px){

    .main-box{
        padding:14px;
    }

    .form-grid{
        grid-template-columns:1fr;
    }

    .search-box{
        width:100%;
    }

    .search-box input{
        width:100%;
    }

}

</style>

</head>

<body>

<div class="container-fluid main-box">

    <!-- FORM -->
    <div class="card-modern">

        <div class="section-title">

            <div class="title-icon">
                <i class="fa-solid fa-plus"></i>
            </div>

            <h3>Tambah Pelanggan Baru</h3>

        </div>

        <form method="post" action="pelanggan_aksi.php">

            <div class="form-grid">

                <!-- NAMA -->
                <div class="form-group">

                    <label>Nama Pelanggan</label>

                    <input 
                        type="text"
                        name="nama"
                        class="form-control-modern"
                        placeholder="Masukkan nama pelanggan"
                        required
                    >

                </div>

                <!-- HP -->
                <div class="form-group">

                    <label>No HP</label>

                    <input 
                        type="text"
                        name="hp"
                        class="form-control-modern"
                        placeholder="08xxxxxxxx"
                        required
                    >

                </div>

                <!-- ALAMAT -->
                <div class="form-group">

                    <label>Alamat</label>

                    <input 
                        type="text"
                        name="alamat"
                        class="form-control-modern"
                        placeholder="Masukkan alamat pelanggan"
                        required
                    >

                </div>

            </div>

            <button type="submit" class="btn-save">
                <i class="fa-regular fa-floppy-disk"></i>
                Simpan Pelanggan
            </button>

        </form>

    </div>

    <!-- TABLE -->
    <div class="card-modern">

        <div class="table-top">

            <div class="section-title" style="margin-bottom:0;">

                <div class="title-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3>Daftar Pelanggan</h3>

            </div>

            <!-- SEARCH -->
            <div class="search-box">

                <input 
                    type="text"
                    id="searchInput"
                    placeholder="Cari nama atau no hp..."
                >

                <i class="fa-solid fa-magnifying-glass"></i>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-wrapper">

            <table class="table-modern" id="customerTable">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Total Transaksi</th>
                        <th>Terakhir Transaksi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM pelanggan");
                $no = 1;

                while($d = mysqli_fetch_array($data)){

                $colors = [
                    'avatar-blue',
                    'avatar-purple',
                    'avatar-orange',
                    'avatar-pink',
                    'avatar-green',
                    'avatar-teal',
                    'avatar-indigo'
                ];

                $randomColor = $colors[array_rand($colors)];

                ?>

                <tr>

                    <!-- NO -->
                    <td>
                        <?php echo $no++; ?>
                    </td>

                    <!-- PELANGGAN -->
                    <td>

                        <div class="customer-box">

                            <div class="customer-avatar <?php echo $randomColor; ?>">

                                <?php echo strtoupper(substr($d['nama_pelanggan'],0,1)); ?>

                            </div>

                            <strong>
                                <?php echo $d['nama_pelanggan']; ?>
                            </strong>

                        </div>

                    </td>

                    <!-- HP -->
                    <td style="min-width:180px;">

                        <div class="phone-box">

                            <i class="fa-solid fa-phone"></i>

                            <?php echo $d['nohp_pelanggan']; ?>

                        </div>

                    </td>

                    <!-- ALAMAT -->
                    <td>

                        <div class="location-box">

                            <i class="fa-solid fa-location-dot"></i>

                            <?php echo $d['alamat_pelanggan']; ?>

                        </div>

                    </td>

                    <!-- TOTAL -->
                    <td>

                        <span class="transaction-badge">
                            <?php echo rand(1,20); ?> transaksi
                        </span>

                    </td>

                    <!-- TERAKHIR -->
                    <td>

                        <div class="date-box">

                            <i class="fa-regular fa-clock"></i>

                            <?php echo date('d M Y'); ?>

                        </div>

                    </td>

                    <!-- STATUS -->
                    <td>

                        <span class="status active">
                            ● Aktif
                        </span>

                    </td>

                    <!-- AKSI -->
                    <td>

                        <div class="action-group">

                            <!-- EDIT -->
                            <a 
                                href="pelanggan_edit.php?id=<?php echo $d['id_pelanggan']; ?>"
                                class="action-btn edit-btn"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <!-- DELETE -->
                            <a 
                                href="pelanggan_hapus.php?id=<?php echo $d['id_pelanggan']; ?>"
                                class="action-btn delete-btn"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </div>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- SEARCH -->
<script>

const searchInput = document.getElementById('searchInput');
const table = document.getElementById('customerTable');
const rows = table.getElementsByTagName('tr');

searchInput.addEventListener('keyup', function(){

    const keyword = searchInput.value.toLowerCase();

    for(let i = 1; i < rows.length; i++){

        const rowText = rows[i].textContent.toLowerCase();

        if(rowText.indexOf(keyword) > -1){
            rows[i].style.display = '';
        }else{
            rows[i].style.display = 'none';
        }

    }

});

</script>

</body>
</html>