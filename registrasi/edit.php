<?php 

// menghubungkan ke file function.php
require "functions.php";

// tangkap id di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$anm = query("SELECT * FROM anime WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belom
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diedit atau tidak
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diedit');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit');
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
    <title>Edit Data Anime</title>
</head>
<body>
    <h1>Edit Data Anime</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $anm["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $anm["gambar"]; ?>">
        <ul>
            <li>
                <label for="kode">Kode : </label>
                <input type="text" name="kode" id="kode" required value="<?= $anm["kode"]; ?>">
            </li>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" required value="<?= $anm["judul"]; ?>">
            </li>
            <li>
                <label for="genre">Genre : </label>
                <input type="text" name="genre" id="genre" required value="<?= $anm["genre"]; ?>">
            </li>
            <li>
                <label for="studio">Studio : </label>
                <input type="text" name="studio" id="studio" required value="<?= $anm["studio"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label><br>
                <img src="img/<?= $anm["gambar"]; ?>" width="40"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>