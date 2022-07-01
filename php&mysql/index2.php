<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel anime / query data anime
$result = mysqli_query($conn, "SELECT * FROM anime");

// ambil fata (fetch) anime dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array asosiatif
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object()

// menampilkan semua isi data table
// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }


?>


<style>
    body{
        background-color: #eee
    }   
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anime</title>
</head>
<body>
    <h1>Daftar Anime</h1>
    <table border="1" cellspacing="0" cellpadding="10">

        <tr>
            <th>No.</th>
            <th>List</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Studio</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row["list"] ?></td>
            <td><img src="img/<?= $row["gambar"] ?> " width="50"></td>
            <td><?= $row["judul"] ?></td>
            <td><?= $row["genre"] ?></td>
            <td><?= $row["studio"] ?></td>
            <td>
                <a href="">Edit</a> | <a href="">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endwhile ?>

    </table>
</body>
</html>