<?php 

// cek apakah tidak ada data di $_GET
if (!isset($_GET["list"]) ||
    !isset($_GET["judul"]) ||
    !isset($_GET["genre"]) ||
    !isset($_GET["studio"]) ||
    !isset($_GET["gambar"]))
    {
        // redirect
        header("Location: latihan1.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anime</title>
</head>
<body>
    <h1>Detail Anime</h1>
    <ul>
        <li>List   : <?= $_GET["list"];  ?></li>
        <li>
            <img src="img/<?= $_GET["gambar"]; ?>">
        </li>
        <li>Judul   : <?= $_GET["judul"];  ?></li>
        <li>Genre   : <?= $_GET["genre"];  ?></li>
        <li>Studio  : <?= $_GET["studio"];  ?></li>
    </ul>
    <a href="latihan1.php">Kembali</a>
</body>
</html>