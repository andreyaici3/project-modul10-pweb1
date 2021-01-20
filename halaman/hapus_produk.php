<?php 

    include 'koneksi.php';

    $id = $_GET['id'];

    $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$id'");

    $key = mysqli_fetch_assoc($result);

    $gambar = "./ASET/" . $key['gambar_produk'];

    if (file_exists($gambar)){
        unlink($gambar);
    }

    $qry = mysqli_query($koneksi, "DELETE FROM produk WHERE kode_produk = '$id'");

    if ($qry){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
    }