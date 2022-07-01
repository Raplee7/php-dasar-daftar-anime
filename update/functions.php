<?php 

// koneksi ke database 
// mysqli_connect("localhost", "username", "password", "namadatabase");
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// fungsi untuk mengambil data pada tabel
// $query mengambil argumen query("SELECT * FROM anime") dari file index.php
function query($query){
    //  global untuk mengambil variabel di luar fungsi, karna ya gitu
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
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO anime
            VALUES
        ('','$kode', '$judul', '$genre', '$studio', '$gambar')
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
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

?>