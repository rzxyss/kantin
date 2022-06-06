<?php
    include 'config.php';
    $sql = "SELECT * FROM admin";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
?>

<h2>Selamat Datang <?= $data['nama_admin'] ?></h2>