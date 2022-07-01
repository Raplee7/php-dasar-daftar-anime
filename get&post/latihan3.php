
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>

    <!--Untuk mengarahkan ke halaman lain -->
    <form action="latihan4.php" method="POST">
        Masukkan Nama:
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <!-- untuk memproses ke halaman ini sendiri -->
    <!-- isset untuk mencegah tampilan error muncul sebelum menekan tombol submit -->
    <?php if (isset($_POST["submit"])) : ?>
        <h1>Selamat Datang <?= $_POST["nama"] ?></h1>
    <?php endif ?>
        <form action="" method="POST">
            Masukkan Nama:
            <input type="text" name="nama">
            <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>