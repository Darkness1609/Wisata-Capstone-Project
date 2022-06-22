<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "wisata";

    $con = mysqli_connect($server,$username,$password) or die("Koneksi Gagal");
    mysqli_select_db($con, $database) or die ("Database Tidak Bisa Dibuka");
?>
