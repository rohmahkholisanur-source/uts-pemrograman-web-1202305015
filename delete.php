<?php
// Koneksi ke database 
include_once("config.php");

// Ambil ID dari URL 
$id = $_GET['id'];

// Hapus data dari tabel daftar_hadir 
$result = mysqli_query($mysqli, "DELETE FROM daftar_hadir WHERE id=$id");

// Redirect kembali ke halaman utama
header("Location: index.php");
exit();
?>
