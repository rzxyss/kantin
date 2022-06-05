<?php
    session_start();
    $id_produk = $_GET['id'];

    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk]+=1;
    }
    else {
        $_SESSION['keranjang'][$id_produk]=1;
    }

    echo '<script>alert("Produk Telah Di Masukan Ke Dalam Keranjang");</script>';
    echo '<script>location="keranjang.php";</script>';
?>