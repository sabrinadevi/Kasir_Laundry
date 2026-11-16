<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("
    <div style='
        font-family:Poppins,sans-serif;
        text-align:center;
        margin-top:100px;
        color:red;
    '>
        ID pelanggan tidak ditemukan!
    </div>
    ");
}

$id = intval($_GET['id']);

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");

if (!$data) {
    die("Query Error : " . mysqli_error($koneksi));
}

if (mysqli_num_rows($data) == 0) {
    die("
    <div style='
        font-family:Poppins,sans-serif;
        text-align:center;
        margin-top:100px;
        color:red;
    '>
        Data pelanggan tidak ditemukan!
    </div>
    ");
}

$d = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Pelanggan</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#dbeafe,#eff6ff);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

/* CARD */
.edit-card{
    width:100%;
    max-width:750px;
    background:white;
    border-radius:30px;
    padding:40px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    animation:fade .4s ease;
}

/* TITLE */
.title{
    text-align:center;
    margin-bottom:35px;
}

.title h1{
    color:#1e3a8a;
    font-size:38px;
    font-weight:700;
}

.title p{
    color:#64748b;
    margin-top:8px;
}

/* FORM */
.form-group{
    margin-bottom:22px;
}

.form-group label{
    display:block;
    margin-bottom:10px;
    color:#0f172a;
    font-weight:600;
}

/* INPUT */
.form-control{
    width:100%;
    height:55px;
    border:1px solid #dbeafe;
    border-radius:16px;
    padding:0 18px;
    font-size:15px;
    transition:.3s;
    background:#f8fbff;
}

textarea.form-control{
    height:130px;
    padding-top:15px;
    resize:none;
}

.form-control:focus{
    outline:none;
    border-color:#2563eb;
    box-shadow:0 0 0 5px rgba(37,99,235,.1);
    background:white;
}

/* BUTTON */
.button-group{
    display:flex;
    gap:15px;
    margin-top:25px;
}

.btn-save{
    flex:1;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    border:none;
    color:white;
    height:55px;
    border-radius:16px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
    box-shadow:0 10px 20px rgba(37,99,235,.2);
}

.btn-save:hover{
    transform:translateY(-2px);
}

/* BACK BUTTON */
.btn-back{
    flex:1;
    background:#e2e8f0;
    color:#334155;
    text-decoration:none;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#cbd5e1;
    color:#0f172a;
}

/* ALERT */
.alert{
    padding:15px;
    border-radius:14px;
    margin-bottom:25px;
    font-size:14px;
    font-weight:500;
}

.alert-success{
    background:#dcfce7;
    color:#166534;
}

.alert-danger{
    background:#fee2e2;
    color:#991b1b;
}

/* ANIMATION */
@keyframes fade{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* RESPONSIVE */
@media(max-width:768px){

    .edit-card{
        padding:25px;
    }

    .title h1{
        font-size:30px;
    }

    .button-group{
        flex-direction:column;
    }

}

</style>
</head>

<body>

<div class="edit-card">

    <!-- TITLE -->
    <div class="title">
        <h1>Edit Pelanggan</h1>
        <p>Perbarui data pelanggan laundry ✨</p>
    </div>

    <!-- ALERT -->
    <?php 
    if(isset($_GET['success']) && $_GET['success'] == '1'){
        echo "
        <div class='alert alert-success'>
            Data pelanggan berhasil diperbarui.
        </div>
        ";
    }

    if(isset($_GET['error'])){

        if($_GET['error'] == 'empty'){
            echo "
            <div class='alert alert-danger'>
                Semua field wajib diisi!
            </div>
            ";
        }

        if($_GET['error'] == 'updatefail'){
            echo "
            <div class='alert alert-danger'>
                Update data gagal, coba lagi.
            </div>
            ";
        }

    }
    ?>

    <!-- FORM -->
    <form method="post" action="pelanggan_update.php">

        <input 
            type="hidden" 
            name="id" 
            value="<?php echo $d['id_pelanggan']; ?>"
        >

        <!-- NAMA -->
        <div class="form-group">

            <label>Nama Pelanggan</label>

            <input 
                type="text"
                name="nama"
                class="form-control"
                value="<?php echo $d['nama_pelanggan']; ?>"
                required
            >

        </div>

        <!-- NO HP -->
        <div class="form-group">

            <label>No HP</label>

            <input 
                type="text"
                name="hp"
                class="form-control"
                value="<?php echo $d['nohp_pelanggan']; ?>"
                required
            >

        </div>

        <!-- ALAMAT -->
        <div class="form-group">

            <label>Alamat</label>

            <textarea 
                name="alamat"
                class="form-control"
                required
            ><?php echo $d['alamat_pelanggan']; ?></textarea>

        </div>

        <!-- BUTTON -->
        <div class="button-group">

            <button type="submit" class="btn-save">
                Simpan Perubahan
            </button>

            <a href="pelanggan.php" class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>