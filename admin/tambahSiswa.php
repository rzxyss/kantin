<h2>Tambah Siswa</h2>

<form method="post">
    <div class="form-group">
        <label class="form-label">Nama Siswa</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Kelas Siswa</label>
        <input type="text" name="kelas" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">No Telp Siswa</label>
        <input type="text" name="telp" class="form-control">
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
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Password</label>
        <input type="text" name="password" class="form-control">
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
        $password = $_POST['password'];

        $sql = "INSERT INTO siswa (nama_siswa, kelas_siswa, telp_siswa, gender, username, password)
        VALUES ('$nama','$kelas','$telp','$gender','$username','$password')";
        $query = mysqli_query($conn, $sql);
        echo '<script>alert("Berhasil Membuat Akun");</script>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?pages=siswa">';
    }
?>