<?php 

// koneksi ke database 
// mysqli_connect("localhost", "username", "password", "namadatabase");
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// fungsi untuk mengambil data pada tabel
// $query mengambil argumen query("SELECT * FROM anime") dari file index.php
function query($query){
    //  global untuk mengambil variabel di luar fungsi
    global $conn;
    $result = mysqli_query($conn, $query);
    // rows diberi array kosong untuk menampung
    $rows = [];
    // pengulangan untuk mengisi $rows yang kosong
    // mysqli_fetch untuk mengambil data pada tabel
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    // htmlspecialchars agar user tidak bisa iseng memasukkan atribut html di form
    $kode = htmlspecialchars($data["kode"]);
    $judul = htmlspecialchars($data["judul"]);
    $genre = htmlspecialchars($data["genre"]);
    $studio = htmlspecialchars($data["studio"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO anime
            VALUES
        ('','$kode', '$judul', '$genre', '$studio', '$gambar')
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah ada file gambar diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah yg diupload itu gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yg anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru agar tidak tertimpa dengan file yang lain
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM anime WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    // htmlspecialchars agar user tidak bisa iseng memasukkan atribut html di form
    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $judul = htmlspecialchars($data["judul"]);
    $genre = htmlspecialchars($data["genre"]);
    $studio = htmlspecialchars($data["studio"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }

    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE anime SET
                kode = '$kode',
                judul = '$judul',
                genre = '$genre',
                studio = '$studio',
                gambar = '$gambar'
            WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM anime 
                WHERE
                judul LIKE '%$keyword%' OR
                kode LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                studio LIKE '%$keyword%' 

            ";
    return query($query);
}


function registrasi($data){
    global $conn;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar');
            </script>
            ";
        return false;
    }
    

    if ($password !== $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>
            ";
        return false;
    } 
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>