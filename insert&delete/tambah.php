<?php 

// menghubungkan ke file function.php
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belom
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anime</title>
</head>
<body>
    <h1>Tambah Anime</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="kode">Kode : </label>
                <input type="text" name="kode" id="kode" required>
            </li>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" required>
            </li>
            <li>
                <label for="genre">Genre : </label>
                <input type="text" name="genre" id="genre" required>
            </li>
            <li>
                <label for="studio">Studio : </label>
                <input type="text" name="studio" id="studio" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>