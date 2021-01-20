<?php 

    
    $i = 1;

    if (isset($_POST['cari'])){
        extract($_POST);
        if (isset($keyword) != '' ){
            $key = "SELECT * FROM pelanggan WHERE
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                umur LIKE '%$keyword%'
            ";
            $pelanggan = mysqli_query($koneksi, $key);
        } else {
            $pelanggan =  mysqli_query($koneksi, "SELECT * FROM pelanggan");
        }
    }

?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DATA PELANGGAN</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <form method="POST" action="index.php?page=pelanggan">
                    <div class="form-group">
                        <input autocomplete="off" type="text" class="form-control" name="keyword" placeholder="Masukan Kata Kunci Disini..." autofocus>
                    </div>
                
            </div>
            <div class="col-md-1">
                <button type="submit" name="cari" class="btn btn-primary">Cari!!</button>
            </div>
            </form>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($key = mysqli_fetch_assoc($pelanggan)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td><?= $key['alamat'] ?></td>
                            <td><?= $key['umur'] ?></td>
                            <td>
                                <a href="index.php?page=pelanggan&aksi=hapus&id=<?= $key['id_pelanggan'] ?>" onclick="return confirm('Yakin Ingin Mengahapus Data')" class="btn btn-danger btn-sm">Delete</a> | <a href="index.php?page=pelanggan&aksi=ubah&id=<?= $key['id_pelanggan'] ?>" class="btn btn-sm btn-success">Ubah</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <a href="index.php?page=pelanggan&aksi=tambah" class="btn btn-primary btn-sm">TAMBAH PELANGGAN</a>

    </div>
</section>