<?php 

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // jika benar maka redirect ke halaman admin
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        header("Location: admin.php");
        exit;
    }
    // jika salah tampilkan pesan kesalahan
    else {
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php if(isset($error)) : ?>
        <p style="color: red;">Username atau Password Salah !!!</p>
    <?php endif ?>

    <h1>Login Admin</h1>
    <ul>
        <form action="" method="POST">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <button type="submit" name="submit">Login</button>
        </form>
    </ul>
</body>
</html>