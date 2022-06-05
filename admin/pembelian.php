<h2>Data Pembelian</h2>

<table class="table table-stripted">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Tanggal Pembelian</th>
            <th>Total Pembelian</th>
            <th>Detail Pembelian</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor = 1;
            $sql = "SELECT * FROM pembelian JOIN siswa ON pembelian.id_siswa=siswa.id_siswa";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['tanggal_pembelian'] ?></td>
            <td>Rp. <?= number_format($data['total_pembelian']) ?></td>
            <th><a href="index.php?pages=DetailPembelian&id=<?= $data['id_pembelian']?>" class="btn btn-primary">Detail</a></th>
        </tr>
        <?php
            $nomor++;
            }
        ?>
    </tbody>
</table>