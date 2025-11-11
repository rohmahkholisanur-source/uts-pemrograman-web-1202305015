<html>
<head>
    <title>Tambah Kehadiran</title>
</head>
<body>
    <form action="add.php" method="post">
        ID: <input type="text" name="id"><br>
        Nama: <input type="text" name="nama"><br>
        Jurusan: <input type="text" name="jurusan"><br>
        Waktu Kehadiran: <input type="datetime-local" name="waktu_kehadiran"><br>
        <input type="submit" name="Submit" value="Simpan">
    </form>

    <?php
    if (isset($_POST['Submit'])) {
        include_once("config.php");

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $waktu_kehadiran = $_POST['waktu_kehadiran'];

        $result = mysqli_query($mysqli, "INSERT INTO daftar_hadir(id, nama, jurusan, waktu_kehadiran) 
                                         VALUES('$id', '$nama', '$jurusan', '$waktu_kehadiran')");

        echo "✅ Data berhasil disimpan. <a href='index.php'>Lihat Daftar Hadir</a>";
    }
    ?>
</body>
</html>
