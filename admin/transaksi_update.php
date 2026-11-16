<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../koneksi.php';

$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$status = $_POST['status'];

$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

// Update data transaksi
mysqli_query($koneksi, "UPDATE transaksi SET 
    transaksi_pelanggan='$pelanggan', 
    berat_transaksi='$berat', 
    tgl_selesai='$tgl_selesai', 
    status_transaksi='$status' 
    WHERE id_transaksi='$id'") or die(mysqli_error($koneksi));

// Hapus data pakaian lama
mysqli_query($koneksi, "DELETE FROM pakaian WHERE transaksi_pakaian='$id'") or die(mysqli_error($koneksi));

// Simpan data pakaian baru
for ($i = 0; $i < count($jenis_pakaian); $i++) {
    if ($jenis_pakaian[$i] != "") {
        $jenis = mysqli_real_escape_string($koneksi, $jenis_pakaian[$i]);
        $jumlah = intval($jumlah_pakaian[$i]);

        mysqli_query($koneksi, "INSERT INTO pakaian (transaksi_pakaian, jenis_pakaian, jumlah_pakaian) 
            VALUES ('$id', '$jenis', '$jumlah')") or die(mysqli_error($koneksi));
    }
}

// Redirect kembali
header("Location: transaksi.php?pesan=update");
?>
