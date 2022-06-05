<h2>Detail Pembelian</h2>
<?php
    $sql = "SELECT * FROM pembelian JOIN siswa ON pembelian.id_siswa=siswa.id_siswa WHERE pembelian.id_pembelian='$_GET[id]'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
?>
<strong><?= $data['nama_siswa'] ?></strong>
<p>
    <?= $data['telp_siswa'] ?> <br>
    <?= $data['tanggal_pembelian'] ?> <br>
    Rp. <?= number_format($data['total_pembelian']) ?>
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor = 1;
            $db = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk
            WHERE pembelian_produk.id_pembelian";
            $result = mysqli_query($conn, $db);
            while($detail = mysqli_fetch_assoc($result)){
                $subtotal = $detail['harga_produk']*$detail['jumlah'];
        ?>
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $detail['nama_produk']?></td>
            <td><?= $detail['harga_produk'] ?></td>
            <td><?= $detail['jumlah'] ?></td>
            <td><?= $subtotal ?></td>
        </tr>
        <?php
            $nomor++;
            }
        ?>
    </tbody>
</table>