<?php include 'template/header.php' ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">PROJECT MODUL 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="index.php?page=produk">Produk</a>
                    <a class="nav-link" href="index.php?page=kategori">Kategori</a>
                    <a class="nav-link" href="index.php?page=pelanggan">Pelanggan</a>
                    <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                    <a class="nav-link" href="logout.php" onclick="return confirm('Yakin Ingin Logout.?')">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<?php 

    if (@$_GET['page'] == 'produk'){
        if (@$_GET['aksi'] == 'tambah'){
            include 'halaman/tambah_produk.php';
        } else if (@$_GET['aksi'] == 'ubah') {
            include 'halaman/ubah_produk.php';
        } else if (@$_GET['aksi'] == 'hapus') { 
            include 'halaman/hapus_produk.php';
        } else {
            include 'halaman/produk.php';
        }
    } else if (@$_GET['page'] == 'pelanggan') {
        if (@$_GET['aksi'] == 'tambah'){
            include 'halaman/tambah_pelanggan.php';
        } else if (@$_GET['aksi'] == 'hapus') {
            include 'halaman/hapus_pelanggan.php';
        } else if (@$_GET['aksi'] == 'ubah') {
            include 'halaman/ubah_pelanggan.php';
        } else {
            include 'halaman/pelanggan.php';
        }
    } else if (@$_GET['page'] == 'kategori') {
        if (@$_GET['aksi'] == ''){
            include 'halaman/kategori.php';
        } else if (@$_GET['aksi'] == 'tambah'){
            include 'halaman/tambah_kategori.php';
        } else if (@$_GET['aksi'] == 'hapus') {
            include 'halaman/hapus_kategori.php';
        }
    } else if (@$_GET['page'] == 'transaksi') {
        if (@$_GET['aksi'] == ''){
            include 'halaman/transaksi.php';
        } else if (@$_GET['aksi'] == 'tambah'){
            include 'halaman/tambah_transaksi.php';
        } else if (@$_GET['aksi'] == 'hapus') {
            include 'halaman/hapus_transaksi.php';
        }
    } else  {
        include 'halaman/index.php';
    }

?>
<?php include 'template/footer.php' ?>
