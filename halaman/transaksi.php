<?php 

    $i = 1;

    if (isset($_POST['cari'])){
        extract($_POST);
        if ($keyword != ''){
            extract($_POST);
            $str = "SELECT *
                    FROM transaksi
                    JOIN produk
                      ON transaksi.kode_produk = produk.kode_produk
                    JOIN pelanggan
                      ON pelanggan.id_pelanggan = transaksi.id_pelanggan
                    WHERE transaksi.kode_transaksi LIKE '%$keyword%' OR
                          produk.kode_produk LIKE  '%$keyword%' OR
                          produk.harga_jual LIKE '%$keyword%' OR
                          transaksi.tanggal LIKE '%$keyword%' OR
                          pelanggan.nama LIKE '%$keyword%'";
            $transaksi = mysqli_query($koneksi, $str);

        } else {
            $transaksi = mysqli_query($koneksi, "SELECT * FROM pelanggan, produk, transaksi WHERE pelanggan.id_pelanggan = transaksi.id_pelanggan AND produk.kode_produk = transaksi.kode_produk");    
        }
    }

?>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DATA TRANSAKSI</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <form method="POST" action="index.php?page=transaksi">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Masukan Kata Kunci Disini..." autofocus>
                    </div>
                
            </div>
            <div class="col-md-1">
                <button type="submit" name="cari" class="btn btn-primary">Cari!!</button>
            </div>
            </form>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($key = mysqli_fetch_assoc($transaksi)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $key['kode_transaksi'] ?></td>
                            <td><?= $key['kode_produk'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>Rp. <?= number_format($key['harga_jual']) ?></td>
                            <td><?= $key['tanggal'] ?></td>
                            <td>
                                <a href="index.php?page=transaksi&aksi=hapus&id=<?= $key['kode_transaksi'] ?>" onclick="return confirm('Yakin Ingin Mengahapus Data')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <a href="index.php?page=transaksi&aksi=tambah" class="btn btn-primary btn-sm">TAMBAH TRANSAKSI</a>

    </div>
</section>