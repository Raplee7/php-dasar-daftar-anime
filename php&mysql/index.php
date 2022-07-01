<?php 

require 'functions.php';
$anime = query("SELECT * FROM anime");


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
        <?php foreach($anime as $a) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $a["list"] ?></td>
            <td><img src="img/<?= $a["gambar"] ?> " width="50"></td>
            <td><?= $a["judul"] ?></td>
            <td><?= $a["genre"] ?></td>
            <td><?= $a["studio"] ?></td>
            <td>
                <a href="">Edit</a> | <a href="">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>

    </table>
</body>
</html>