<?php include 'header.php'; ?>
<style>
    body {
        background-color: #f6f9fc;
    }
    .card-style {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        max-width: 450px;
        margin: 50px auto;
    }
    .card-style h3 {
        background-color: #007bff;
        color: white;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin: -30px -30px 30px -30px;
        font-size: 18px;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px;
    }
    .btn-blue {
        background-color: #007bff;
        border: none;
        padding: 10px 25px;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        margin-top: 15px;
    }
</style>

<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga LIMIT 1");
if($d = mysqli_fetch_array($data)){
?>
<div class="card-style">
    <h3>Pengaturan Harga Laundry</h3>
    
    <?php
    if(isset($_GET['pesan']) && $_GET['pesan'] == "berhasil"){
        echo "<div class='alert alert-success'>Berhasil Update</div>";
    }
    ?>

    <form method="post" action="harga_update.php">
        <div class="form-group">
            <label>Harga per kilo</label>
            <input type="number" class="form-control" name="harga" value="<?php echo $d['harga_per_kilo']; ?>" required>
        </div>
        <button type="submit" class="btn btn-blue">Simpan</button>
    </form>
</div>
<?php } ?>

<?php include 'footer.php'; ?>
