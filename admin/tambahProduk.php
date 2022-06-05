<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Harga Produk</label>
        <input type="text" name="harga" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Deskripsi Produk</label>
        <input type="text" name="desk" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Foto Produk</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <br>
    <a href="index.php?pages=siswa" class="btn btn-secondary">Back</a>
    <button class="btn btn-primary" name="upload">Simpan</button>
</form>

<?php
    if (isset($_POST['upload'])) {
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deks = $_POST['desk'];

        move_uploaded_file($lokasi, "../produk/".$foto);
        $sql = "INSERT INTO produk (nama_produk, harga_produk, deskripsi_produk, foto_produk)
        VALUES ('$nama','$harga','$deks','$foto')";
        $query = mysqli_query($conn, $sql);
        echo '<script>alert("Berhasil Mengupload Produk");</script>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?pages=produk">';
    }
?>