<?php 

    $id = $_GET['id'];

    $qry = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'");

    if ($qry){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=kategori'>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=kategori'>";
    }