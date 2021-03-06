<?php 

    $id = $_GET['id'];
    $qry = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$id'");

    $key = mysqli_fetch_assoc($qry);

?>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
            <form action="./tambah.php" method="POST" enctype="multipart/form-data">
                <h4 class="mb-4">UBAH DATA PRODUK</h4>
            
                <div class="form-group mb-2">
                    <input type="text" readonly name="kode" value="<?= $key['kode_produk'] ?>" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="nama" value="<?= $key['desc_produk'] ?>" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <select name="kategori" class="form-control kategori">
                        <option value="">Silahkan Pilih Kategori</option>
                        <?php while($keys = mysqli_fetch_assoc($kategori)) : ?>
                            <option <?php if ($key['id_kategori'] == $keys['id_kategori']) { echo "selected"; } else { echo ""; } ?> value="<?= $keys['id_kategori'] ?>"><?= $keys['nama_kategori'] ?></option>
                        <?php  endwhile; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <input type="number" name="harga_beli" value="<?= $key['harga_beli'] ?>" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="number" name="harga_jual" value="<?= $key['harga_jual'] ?>"class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="">Gambar Produk</label>
                    <img src="./ASET/<?= $key['gambar_produk'] ?>" class="img-thumbnail img-responsive">
                </div>
                <div class="form-group mb-2">
                    <input type="file" name="gambar" class="form-control" placeholder="pilih gambar">
                </div>
                <button type="submit" name="ubahProduk" class="btn btn-primary">SIMPAN DATA!!</button>
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