<?php 

    $id = $_GET['id'];

    $hsl = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");

    $key = mysqli_fetch_assoc($hsl);

?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
            <form action="./tambah.php" method="POST">
                <h4 class="mb-4">UBAH DATA PELANGGAN</h4>
                <input type="hidden" name="id_pelanggan" value="<?= $key['id_pelanggan'] ?>">
                <div class="form-group mb-2">
                    <input type="text" name="nama" value="<?= $key['nama'] ?>" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="number" name="umur" value="<?= $key['umur'] ?>" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="alamat" value="<?= $key['alamat'] ?>" class="form-control">
                </div>
                <button type="submit" name="ubahPelanggan" class="btn btn-primary">UBAH DATA!!</button>
            </form>
            </div>
        </div>
    </div>
</section>