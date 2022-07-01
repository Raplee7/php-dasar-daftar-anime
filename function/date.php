<?php 

    echo date("l, d-M-Y");
    echo "<br>";
    echo time();
    echo "<br>";
    // menghitung beberapa hari kedepan
    echo date("l", time()+60*60*24*2);
    echo "<br>";

    // membuat detik sendiri
    // mktime(0,0,0,0,0)
    // jam, menit, detik, bulan, tanggal, tahun

    // melihat hari kelahiran kita
    echo date("l", mktime(0,0,0,3,18,2002));
    echo "<br>";
    echo date("l", strtotime("18 mar 2002"));
    
?>