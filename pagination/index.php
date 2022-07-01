<?php 

    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }

// require menghubungkan file functions.php ke file index.php
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM anime"));
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// disimpan ke $anime sehingga bentuknya menjadi array
$anime = query("SELECT * FROM anime LIMIT 0, $jumlahDataPerHalaman");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $anime = cari($_POST["keyword"]);
}

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
    .tambah a{
        color: black;
        text-decoration: none;
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

    .cari{
        display: flex;
        float: right;
    }
    .cari input{
        margin-right: 10px;
    }
    .halaman{
        margin-top: 10px;
        text-align: center;
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

    <a href="logout.php">Logout</a>

    <div class="container">
        <h1>Daftar Anime</h1>
        
        <button class="tambah">
            <a href="tambah.php">Tambah Anime</a>
        </button>
        
        <form class="cari" action="" method="POST">

            <input  type="text" name="keyword" size="50" autofocus placeholder="masukkan nama anime..." autocomplete="off">
            <button type="submit" name="cari">Cari</button>

        </form>

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
                    <a href="edit.php?id=<?= $a["id"] ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $a["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>

        </table>
                    <!-- navigasi -->
        <div class="halaman">
            <?php if($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1; ?>">&lt;</a>
            <?php endif ?>

            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if($i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i; ?>" style="font-weight: bold;"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif ?>
            <?php endfor ?>
            
            <?php if($halamanAktif < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
            <?php endif ?>
        </div>

    </div>
</body>
</html>