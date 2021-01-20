<?php 

   
    $i = 1;

?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DATA KATEGORI </h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($key = mysqli_fetch_assoc($kategori)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $key['nama_kategori'] ?></td>
                            <td>
                                <a href="index.php?page=kategori&aksi=hapus&id=<?= $key['id_kategori'] ?>" onclick="return confirm('Yakin Ingin Mengahapus Data')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <a href="index.php?page=kategori&aksi=tambah" class="btn btn-primary btn-sm">TAMBAH KATEGORI</a>

    </div>
</section>