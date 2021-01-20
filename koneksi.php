<?php 

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dtbs = "modul10";


    $koneksi = mysqli_connect($host, $user, $pass, $dtbs);
    if (mysqli_connect_error()){
        trigger_error('Koneksi ke database gagal: ' . mysqli_connect_error(), E_USER_ERROR);
    }
   
