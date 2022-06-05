<?php
    $sql = "SELECT * FROM siswa WHERE id_siswa='$_GET[id]'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
?>
<h2>Update Siswa</h2>
<br>
<form method="post">
    <div class="form-group">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" value="<?= $data['nama_siswa']?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" value="<?= $data['kelas_siswa']?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">No Telp</label>
        <input type="text" name="telp" value="<?= $data['telp_siswa']?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Gender</label>
        <br>
        <input type="radio" name="gender" class="form-check" value="Male"> Male
        <br>
        <input type="radio" name="gender" class="form-check" value="Female"> Female
    </div>
    <div class="form-group">
        <label class="form-label">Username</label>
        <input type="text" name="username" value="<?= $data['username']?>" class="form-control">
    </div>
    <br>
    <a href="index.php?pages=siswa" class="btn btn-secondary">Back</a>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
    if (isset($_POST['save'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $telp = $_POST['telp'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];

        $sql = "UPDATE siswa SET nama_siswa='$nama', kelas_siswa='$kelas', telp_siswa='$telp', gender='$gender', username='$username' WHERE id_siswa='$_GET[id]'";
        $query = mysqli_query($conn, $sql);
        echo '<script>alert("Siswa Berhasil Di Update");</script>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?pages=siswa">';
    }
?>