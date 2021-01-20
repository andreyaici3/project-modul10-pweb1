<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
            <form action="./tambah.php" method="POST">
                <h4 class="mb-4">TAMBAH TRANSAKSI</h4>


                <div class="mb-3">
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <b>Tanggal/Waktu Transaksi <br> <?= date('d-m-Y, h:i:s') ?></b>
                </div>
                <div class="form-group mb-2">
                    <select name="produk" id="produk" class="form-control">
                        <option value="0">-- Pilih Produk --</option>
                        <?php while ($key = mysqli_fetch_assoc($produk)) : ?>
                            <option value="<?= $key['kode_produk'] ?>"><?= $key['desc_produk'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <select name="pelanggan" id="pelanggan" class="form-control">
                        <option value="0">-- Pilih Pelanggan --</option>
                        <?php while ($key = mysqli_fetch_assoc($pelanggan)) : ?>
                            <option value="<?= $key['id_pelanggan'] ?>"><?= $key['nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
    
                
                
                <button type="submit" name="tambahTransaksi" class="btn btn-primary">TAMBAH DATA!!</button>
            </form>
            </div>
            <div class="col-md-8">
                <div class="tampil mb-3">
                
                </div>

                <div class="tampil2">

                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $('#produk, #pelanggan').select2({
        allowClear: true
    });

    $('#pelanggan').change(function(){
        $.ajax({
            url: 'halaman/ambilpelanggan.php',
            data: {
                id: $('#pelanggan').val()
            },
            method: 'post',
            success: function(data){
                $('.tampil').html(data);
            }
        })
    })

    $('#produk').change(function(){
        $.ajax({
            url: 'halaman/ambilProduk.php',
            data: {
                id: $('#produk').val()
            },
            method: 'post',
            success: function(data){
                $('.tampil2').html(data);
            }
        })
    })
</script>