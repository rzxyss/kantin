<?php
    $sql = "SELECT * FROM produk WHERE id_produk='$_GET[id]'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
?>
<h2>Update Produk</h2>
<br>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" value="<?= $data['nama_produk']?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Harga Produk</label>
        <input type="text" name="harga" value="<?= $data['harga_produk']?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Deskripsi Produk</label>
        <input type="text" name="desk" value="<?= $data['deskripsi_produk']?>" class="form-control">
    </div>
    <div class="form-group">
        <img src="../produk/<?= $data['foto_produk']?>" width="200">
    </div>
    <div class="form-group">
        <label class="form-label">Ganti Foto Produk</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <br>
    <a href="index.php?pages=siswa" class="btn btn-secondary">Back</a>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
    if (isset($_POST['save'])) {
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $desk = $_POST['desk'];

        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "../produk/$foto");
            $sql = "UPDATE produk SET nama_produk='$nama', harga_Produk='$harga', deskripsi_produk='$desk', foto_produk='$foto' WHERE id_produk='$_GET[id]'";
            $query = mysqli_query($conn, $sql);
            echo '<script>alert("Data Berhasil Di Update");</script>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?pages=produk">';
        } else {
            $sql = "UPDATE produk SET nama_produk='$nama', harga_Produk='$harga', deskripsi_produk='$desk' WHERE id_produk='$_GET[id]'";
            $query = mysqli_query($conn, $sql);
            echo '<script>alert("Data Berhasil Di Update");</script>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?pages=produk">';
        }
    }
?>