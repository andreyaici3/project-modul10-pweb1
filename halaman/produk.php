<?php 

    if (isset($_POST['cari'])){
        extract($_POST);
        if (isset($keyword) != '' ){
            $key = "SELECT *
                    FROM produk
                    JOIN kategori
                      ON produk.id_kategori = kategori.id_kategori
                    WHERE produk.kode_produk LIKE  '%$keyword%' OR
                          produk.desc_produk LIKE '%$keyword%' OR
                          kategori.nama_kategori LIKE '%$keyword%' OR
                          produk.harga_beli LIKE '%$keyword%' OR
                          produk.harga_jual LIKE '%$keyword%'
                          ";
            $produk = mysqli_query  ($koneksi, $key);
        } else {
            $produk = mysqli_query($koneksi, "SELECT * FROM produk, kategori WHERE kategori.id_kategori = produk.id_kategori ORDER BY kode_produk DESC");
        }
    }

?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DAFTAR PRODUK</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <form method="POST" action="index.php?page=produk">
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="keyword" placeholder="Masukan Kata Kunci Disini..." autofocus>
                    </div>
                
            </div>
            <div class="col-md-1">
                <button type="submit" name="cari" class="btn btn-primary">Cari!!</button>
            </div>
            </form>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Deskripsi Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($key = mysqli_fetch_assoc($produk)) : ?>
                        <tr>
                            <td><?= $mulai++; ?></td>
                            <td><?= $key['kode_produk'] ?></td>
                            <td><?= $key['desc_produk'] ?></td>
                            <td><?= $key['nama_kategori'] ?></td>
                            <td>Rp. <?= number_format($key['harga_beli']) ?></td>
                            <td>Rp. <?= number_format($key['harga_jual']) ?></td>
                            <td align="center" ><img src="./ASET/<?= $key['gambar_produk'] ?>" width="100"></td>
                            <td align="center">
                                <a href="index.php?page=produk&aksi=hapus&id=<?= $key['kode_produk'] ?>" onclick="return confirm('Yakin Ingin Mengahapus Data')" class="btn btn-danger btn-sm">Delete</a> | <a href="index.php?page=produk&aksi=ubah&id=<?= $key['kode_produk'] ?>" class="btn btn-sm btn-success">Ubah</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <a href="index.php?page=produk&aksi=tambah" class="btn btn-primary btn-sm">TAMBAH PRODUK</a>
    </div>
</section>