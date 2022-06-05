<h2>Data Siswa</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas Siswa</th>
            <th>No Telpon</th>
            <th>Gender</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
            <?php
                $nomor = 1;
                $query = mysqli_query($conn, "SELECT * FROM siswa");
                while ($siswa = mysqli_fetch_assoc($query)) {
            ?>
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $siswa['nama_siswa'] ?></td>
            <td><?= $siswa['kelas_siswa'] ?></td>
            <td><?= $siswa['telp_siswa'] ?></td>
            <td><?= $siswa['gender'] ?></td>
            <td><?= $siswa['username'] ?></td>
            <td>
                <a href="index.php?pages=UpdateSiswa&id=<?= $siswa['id_siswa']?>" class="btn btn-primary">Update</a>
                <a href="index.php?pages=HapusSiswa&id=<?= $siswa['id_siswa']?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
            $nomor++;
            } 
        ?>
    </tbody>
</table>
<a href="index.php?pages=TambahSiswa" class="btn btn-primary">Tambah Siswa</a>