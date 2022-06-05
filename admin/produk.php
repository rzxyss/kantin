<h2>Data Produk</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Deskripsi Produk</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
            <?php
                $query = mysqli_query($conn, "SELECT * FROM produk");
                while ($produk = mysqli_fetch_assoc($query)) {
                    $nomor = 1;
            ?>
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $produk['nama_produk'] ?></td>
            <td><?= $produk['harga_produk'] ?></td>
            <td><?= $produk['deskripsi_produk'] ?></td>
            <td><img src="../produk/<?= $produk['foto_produk'] ?>" width="200"></td>
            <td>
                <a href="index.php?pages=UpdateProduk&id=<?= $produk['id_produk']?>" class="btn btn-primary">Update</a>
                <a href="index.php?pages=HapusProduk&id=<?= $produk['id_produk']?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
            $nomor++;
            } 
        ?>
    </tbody>
</table>

<a href="index.php?pages=TambahProduk" class="btn btn-primary">Tambah Produk</a>