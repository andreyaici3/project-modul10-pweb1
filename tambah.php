<?php 

    include 'koneksi.php';


    if (isset($_POST['tambahkategori'])){
        extract($_POST);

        $qry = mysqli_query($koneksi, "INSERT INTO kategori VALUES ('', '$kategori')");

        if ($qry){
            echo "<script>alert('Data Berhasil Ditambahkan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=kategori'>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=kategori'>";
        }
        
    }

    if (isset($_POST['tambahPelanggan'])){
        extract($_POST);
        $stringQuery = "INSERT INTO pelanggan VALUES ( '', '$nama', '$alamat', '$umur') ";
        $qry = mysqli_query($koneksi, $stringQuery);

        if ( $qry ){
            echo "<script>alert('Data Berhasil Ditambahkan');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pelanggan'>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pelanggan'>";
        }
    }

    if ( isset($_POST['tambahProduk']) ){
        extract($_POST);
        
        if ($_FILES['gambar']['error'] == 4){
            echo "<script>alert('Silahkan Pilih Gambar Terlebih Dahulu');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
        } else {
            $lokasi_file = $_FILES['gambar']['tmp_name'];
            $nama_file = $_FILES['gambar']['name'];

            // filter format 
            $format = ['jpg', 'png', 'bmp', 'gif', 'jpeg'];
            $extensi = explode( '.', $_FILES['gambar']['name']);
            $extensi = end($extensi);

            //filter ukuran
            $size_files = $_FILES['gambar']['size'];
            $bytes = 1000000;

            if (in_array($extensi, $format)){
                if ($size_files <= $bytes * 2 ){
                    $folder = "ASET/$nama_file";
                    move_uploaded_file($lokasi_file, "$folder");
                    $qry = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$kode', '$nama', '$kategori', '$harga_beli', '$harga_jual', '$nama_file')");
                    if ($qry){
                        echo "<script>alert('Data Berhasil simpan');</script>";
                        echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
                    } else {
                        echo "<script>alert('Data Gagal simpan');</script>";
                        echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
                    }
                } else {
                    echo "<script>alert('Maaf, Ukuran File Tidak boleh lebih dari 2 mb');</script>";
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
                }
            } else {
                echo "<script>alert('Maaf, Format Yang Diupload Bukan Gambar');</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
            }


        }
    }

    if (isset($_POST['ubahProduk'])){
        $kode = $_POST['kode'];
        $qry = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$kode'");
        $key = mysqli_fetch_assoc($qry);

        if ($_FILES['gambar']['error'] == 4){
            $gambar = $key['gambar_produk'];
        } else {
            $lokasi_file = $_FILES['gambar']['tmp_name'];
            $nama_file = $_FILES['gambar']['name'];

            // filter format 
            $format = ['jpg', 'png', 'bmp', 'gif', 'jpeg'];
            $extensi = explode( '.', $_FILES['gambar']['name']);
            $extensi = end($extensi);

            //filter ukuran
            $size_files = $_FILES['gambar']['size'];
            $bytes = 1000000;

            if (in_array($extensi, $format)){
                if ($size_files <= $bytes * 2 ){
                    $folder = "ASET/$nama_file";
                    unlink('ASET/' . $key['gambar_produk']);
                    move_uploaded_file($lokasi_file, "$folder");
                    $gambar = $nama_file;
                } else {
                    $gambar = $key['gambar_produk'];
                }
            } else {
                $gambar = $key['gambar_produk'];
            }
        }

        extract($_POST);
        $stringQuery = "UPDATE produk SET 
            desc_produk = '$nama',
            id_kategori = '$kategori',
            harga_beli = '$harga_beli',
            harga_jual = '$harga_jual',
            gambar_produk = '$gambar'

            WHERE kode_produk = '$kode'";
        
        $qryUpdate = mysqli_query($koneksi, $stringQuery);

        if ( $qryUpdate ){
            echo "<script>alert('Data Berhasil Diubah');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
        } else {
            echo "<script>alert('Data Gagal Diubah');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=produk'>";
        }


        
    }

    if (isset($_POST['ubahPelanggan'])){
        extract($_POST);

        $stringQuery = "UPDATE pelanggan SET
            nama = '$nama',
            alamat = '$alamat',
            umur = '$umur'
            WHERE id_pelanggan = '$id_pelanggan'";

        $qryUpdate = mysqli_query($koneksi, $stringQuery);

        if ( $qryUpdate ){
            echo "<script>alert('Data Berhasil Diubah');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pelanggan'>";
        } else {
            echo "<script>alert('Data Gagal Diubah');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pelanggan'>";
        }
    }

    if (isset($_POST['tambahTransaksi'])){
        extract($_POST);

        $kodeTrx = date('hisdm');
        $tanggal = date('Y-m-d');
        $stringQuery = "INSERT INTO transaksi VALUES('$kodeTrx', '$pelanggan', '$produk', '$tanggal' )";

        $qry = mysqli_query($koneksi, $stringQuery);

        if ( $qry ){
            echo "<script>alert('Transaksi Berhasil');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
        } else {
            echo "<script>alert('Transaksi Gagal');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
        }
    }