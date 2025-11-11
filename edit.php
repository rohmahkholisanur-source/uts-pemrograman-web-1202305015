<?php
// Koneksi ke database
include_once("config.php");

// --- BAGIAN UPDATE DATA ---
if (isset($_POST['update'])) {   
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $waktu_kehadiran = $_POST['waktu_kehadiran'];

    if (!empty($id)) {
        $result = mysqli_query($mysqli, "UPDATE daftar_hadir 
                                         SET nama='$nama', jurusan='$jurusan', waktu_kehadiran='$waktu_kehadiran' 
                                         WHERE id=$id");
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Gagal update: ID tidak ditemukan.</p>";
    }
}

// --- BAGIAN TAMPILKAN DATA BERDASARKAN ID ---
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM daftar_hadir WHERE id=$id");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $nama = $data['nama'];
        $jurusan = $data['jurusan'];
        $waktu_kehadiran = $data['waktu_kehadiran'];
    } else {
        echo "<p style='color:red;'>Data tidak ditemukan!</p>";
        exit();
    }
} else {
    echo "<p style='color:red;'>ID tidak ditemukan di URL!</p>";
    exit();
}
?>

<html>
<head>  
    <title>Edit Daftar Hadir</title>
</head>

<body>
    <a href="index.php">Kembali ke Daftar</a>
    <br/><br/>

    <form name="update_absen" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>ID</td>
                <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr> 
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?php echo $jurusan; ?>"></td>
            </tr>
            <tr> 
                <td>Waktu Kehadiran</td>
                <td><input type="datetime-local" name="waktu_kehadiran" value="<?php echo date('Y-m-d\TH:i', strtotime($waktu_kehadiran)); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
