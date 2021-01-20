<?php

    include '../koneksi.php';

    $id = $_POST['id'];

    $qry = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");

    $key = mysqli_fetch_assoc($qry);

    $html = "
    <h3>Rincian Pelanggan</h3>
    <div class='form-group mb-2'>
        <input type='text' value='". $key['nama'] . "' class='form-control' readonly>
    </div>
    <div class='form-group mb-2'>
        <input type='text' value='". $key['alamat'] . "' class='form-control' readonly>
    </div>
    <div class='form-group mb-2'>
        <input type='text' value='". $key['umur'] . "' class='form-control' readonly>
    </div>
    ";

    echo $html;

    

    

    