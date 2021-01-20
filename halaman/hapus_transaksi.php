<?php 

    $id = $_GET['id'];

    $qry = mysqli_query($koneksi, "DELETE FROM transaksi WHERE kode_transaksi = '$id'");

    if ($qry){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
    }