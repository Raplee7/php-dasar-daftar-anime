<?php 

// require menghubungkan file functions.php ke file index.php
require 'functions.php';

// disimpan ke $anime sehingga bentuknya menjadi array
$anime = query("SELECT * FROM anime");


?>


<style>
    body{
        background-color: #eee;
    }
    .container{
        margin: 0 auto;
        width: 80%;
    }    
    h1{
        text-align: center;
    }
    table {
        margin: 0 auto;
        margin-top: 10px;
        width: 100%;
        background-color: white;

    }   
    table th{

        background-color: #787A91;
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
    <div class="container">
        <h1>Daftar Anime</h1>

        <a href="tambah.php">Tambah Anime</a>
        <table border="1" cellspacing="0" cellpadding="10">
            
            <tr>
                <th>No.</th>
                <th>Kode</th>
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
                <td><?= $a["kode"] ?></td>
                <td><img src="img/<?= $a["gambar"] ?> " width="50"></td>
                <td><?= $a["judul"] ?></td>
                <td><?= $a["genre"] ?></td>
                <td><?= $a["studio"] ?></td>
                <td>
                    <a href="">Edit</a> | 
                    <a href="hapus.php?id=<?= $a["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>

        </table>
    </div>
</body>
</html>