<?php 

    session_start();

    if (isset($_SESSION['status']) != TRUE){
        header("Location: login.php");
    }

    include 'koneksi.php';

    $mulai = 1;
    $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    $produk = mysqli_query($koneksi, "SELECT * FROM produk, kategori WHERE kategori.id_kategori = produk.id_kategori ORDER BY kode_produk DESC");
    $transaksi = mysqli_query($koneksi, "SELECT * FROM pelanggan, produk, transaksi WHERE pelanggan.id_pelanggan = transaksi.id_pelanggan AND produk.kode_produk = transaksi.kode_produk");    

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <title>PROJECT MODUL 10</title>
</head>
<body>