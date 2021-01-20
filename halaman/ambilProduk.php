<?php

    include '../koneksi.php';

    $id = $_POST['id'];

    $qry = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$id'");

    $key = mysqli_fetch_assoc($qry);

    $html = "
    <h3>Rincian Produk</h3>
    <div class='form-group mb-2'>
        <input type='text' value='". $key['desc_produk'] . "' class='form-control' readonly>
    </div>
    <div class='form-group mb-2'>
        <input type='text' value='". $key['harga_jual'] . "' class='form-control' readonly>
    </div>
    ";

    echo $html;

    
