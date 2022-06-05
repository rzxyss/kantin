<?php
    session_start();
    include 'admin/config.php';
    if(empty($_SESSION['keranjang']) AND !isset($_SESSION['keranjang']))
    {
        echo '<script>alert("Keranjang Kosong Silahkan Berbelanja Terlebih Dahulu")</script>';
        echo '<script>location="index.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/navbar.css">
    <!-- BOOTSTRAP STYLES -->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <title>Document</title>
</head>
<body>
    <h1>Keranjang</h1>
    <div class="text-center">
        <nav>
            <ul>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <?php
                    if (isset($_SESSION['siswa'])) {
                        echo '<a href="logout.php"><li>Logout</li></a>';
                    }
                    else {
                        echo '<a href="login.php"><li>Login</li></a>';
                    }
                ?>
            </ul>
        </nav>
    </div>

    <section class="konten">
        <div class="container">
            <table class="table tabl-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
                            $sql = "SELECT * FROM produk WHERE id_produk='$id_produk'";
                            $query = mysqli_query($conn, $sql);
                            $data =  mysqli_fetch_assoc($query);
                            $subtotal = $data['harga_produk']*$jumlah;
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $data['nama_produk'] ?></td>
                        <td>Rp. <?= number_format($data['harga_produk']) ?></td>
                        <td><?= $jumlah ?></td>
                        <td>Rp. <?= number_format($subtotal)     ?></td>
                        <td>
                            <a href="hapusKeranjang.php?id=<?= $id_produk ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        $nomor++;
                        endforeach
                    ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-default">Lanjut Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </section>
</body>
</html>