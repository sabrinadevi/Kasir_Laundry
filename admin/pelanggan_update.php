<?php
include '../koneksi.php';

$id = intval($_POST['id']);
$nama = trim($_POST['nama']);
$hp = trim($_POST['hp']);
$alamat = trim($_POST['alamat']);

// Validasi sederhana
if ($nama === '' || $hp === '' || $alamat === '') {
    header("Location: pelanggan_edit.php?id=$id&error=empty");
    exit();
}

$stmt = $koneksi->prepare("UPDATE pelanggan SET nama_pelanggan = ?, nohp_pelanggan = ?, alamat_pelanggan = ? WHERE id_pelanggan = ?");
if (!$stmt) {
    die("Prepare failed: " . $koneksi->error);
}

$stmt->bind_param("sssi", $nama, $hp, $alamat, $id);

if ($stmt->execute()) {
    header("Location: pelanggan_edit.php?id=$id&success=1");
    exit();
} else {
    header("Location: pelanggan_edit.php?id=$id&error=updatefail");
    exit();
}

$stmt->close();
$koneksi->close();
