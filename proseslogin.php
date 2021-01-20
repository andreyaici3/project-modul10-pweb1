<?php 

    session_start();
    include 'koneksi.php';

    if (isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = sha1(md5($_POST['pass']));

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");
        $result = mysqli_fetch_assoc($query);

        if ($result){
            if ($result['password'] == $pass){
                $_SESSION['nama_lengkap'] = $result['nama_lengkap'];
                $_SESSION['status']       = TRUE;
                $pesan = "Hallo ". $result['nama_lengkap'] ." Selamat, Login Berhasil";

                echo "<script>alert('$pesan');</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            } else {
                $pesan = "Maaf Login Gagal, Silahkan Cek Username / Password Terlebih Dahulu";
                echo "<script>alert('$pesan');</script>";
                echo "<meta http-equiv='refresh' content='0; url=login.php'>";
            }
        } else {
            $pesan = "Maaf Login Gagal, Silahkan Cek Username / Password Terlebih Dahulu";
            echo "<script>alert('$pesan');</script>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        }       
    }