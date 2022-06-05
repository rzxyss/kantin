<?php
    $sql = "SELECT * FROM produk WHERE id_produk='$_GET[id]'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto_produk'];
    if(file_exists("../produk/$foto")){
        unlink("../produk/$foto");
    }

    $delete = "DELETE FROM produk WHERE id_produk='$_GET[id]'";
    $result = mysqli_query($conn, $delete);
    echo '<script>alert("Data Produk Telah Di Hapus");</script>';
    echo '<meta http-equiv="refresh" content="1;url=index.php?pages=produk">';
?>