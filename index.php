<style type="text/css">
    .header {
        background-color: orange;
    }
</style>

<?php
include_once("config.php");

// Ambil data dari tabel daftar_hadir
$result = mysqli_query($mysqli, "SELECT * FROM daftar_hadir ORDER BY waktu_kehadiran DESC");
?>

<html>
<head>    
    <title>Daftar Hadir</title>
</head>

<body>
    <b>Daftar Hadir Kelompok A</b><br>
    <a href="add.php">Tambah Kehadiran</a><br/><br/>

    <table width='80%' border=1>
        <tr class="header">
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Waktu Kehadiran</th>
            <th>Aksi</th>
        </tr>

        <?php  
        $i = 1;
        while($data = mysqli_fetch_array($result)) {  
            echo "<tr>";
            echo "<td>".$i."</td>";       
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['jurusan']."</td>";    
            echo "<td>".$data['waktu_kehadiran']."</td>";    
            echo "<td><a href='edit.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td>"; 
            echo "</tr>";
            $i++;       
        }
        ?>
    </table>
</body>
</html>
