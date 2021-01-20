<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
            <form action="./tambah.php" method="POST" enctype="multipart/form-data">
                <h4 class="mb-4">TAMBAH DATA PRODUK</h4>
            
                <div class="form-group mb-2">
                    <input type="text" name="kode" placeholder="Kode Produk ..." class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="nama" placeholder="Nama Produk .. " class="form-control">
                </div>
                <div class="form-group mb-2">
                    <select name="kategori" class="form-control kategori">
                        <option value="">Silahkan Pilih Kategori</option>
                        <?php while($key = mysqli_fetch_assoc($kategori)) : ?>
                            <option value="<?= $key['id_kategori'] ?>"><?= $key['nama_kategori'] ?></option>
                        <?php  endwhile; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <input type="number" name="harga_beli" placeholder="Harga Beli .. " class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="number" name="harga_jual" placeholder="Harga Jual .. " class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="file" name="gambar" class="form-control" placeholder="pilih gambar">
                </div>
                <button type="submit" name="tambahProduk" class="btn btn-primary">TAMBAH DATA!!</button>
            </form>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $('.kategori').select2({
        allowClear: true
    });
</script>