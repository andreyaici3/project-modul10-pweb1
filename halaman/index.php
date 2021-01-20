<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">HALO, SELAMAT DATANG <?= $_SESSION['nama_lengkap'] ?></h2>
                <h5>Daftar Produk Pulsa, Kuota dan PPOB</h5>
            </div>
        </div>

        <div class="row mt-5 justify-content-between">
        <?php while ($key = mysqli_fetch_array($produk)) : ?>
            <div class="col-md-4">
                <div class="card mt-4 mb-4">
                    <img height="190px" src="./ASET/<?= $key['gambar_produk'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['desc_produk'] ?></h5>
                        <p class="card-text">kategori: <?= $key['nama_kategori'] ?><br>Harga: Rp. <?= number_format($key['harga_jual']) ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
