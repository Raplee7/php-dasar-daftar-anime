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

?>