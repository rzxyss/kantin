<?php
    session_start();
    include 'admin/config.php';

    if(!isset($_SESSION['siswa'])){
        echo '<script>alert("Silahkan Login Terlebih Dahulu");</script>';
        echo '<script>location="login.php";</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Kantin</title>
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
</head>
<body>
    <!-- Navbar -->
    <h1>Checkout</h1>
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

    <!-- Main Konten -->
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $total = 0;
                        foreach($_SESSION['keranjang'] as $id_produk => $jumlah){
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
                        <td>Rp. <?= number_format($subtotal) ?></td>
                    </tr>
                    <?php
                        $nomor++;
                        $total+=$subtotal;
                        }
                    ?>
                </tbody>
                <tfoot>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?= number_format($total) ?></th>
                </tfoot>
            </table>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?= $_SESSION['siswa']['nama_siswa'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?= $_SESSION['siswa']['kelas_siswa'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?= $_SESSION['siswa']['telp_siswa'] ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
            </form>
            <br>
            <a href="keranjang.php" class="btn btn-default">Kembali Ke Keranjang</a>
            <?php
                if(isset($_POST['checkout']))
                {
                    $id_siswa = $_SESSION['siswa']['id_siswa'];
                    $tanggal = date("Y-m-d");
                    $totalpembelian = $total;
                    $co = mysqli_query($conn, "INSERT INTO pembelian (id_siswa, tanggal_pembelian, total_pembelian)
                    VALUES ('$id_siswa','$tanggal','$totalpembelian')");
                    $id_pembelian_terbaru = mysqli_insert_id($conn);
                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                        $sql1 = mysqli_query($conn, "INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah)
                        VALUES ('$id_pembelian_terbaru', '$id_produk', '$jumlah')");
                    }
                    unset($_SESSION['keranjang']);

                    echo '<script>alert("Pembelian Berhasil");</script>';
                    echo "<script>location='nota.php?id=$id_pembelian_terbaru';</script>";
                }
            ?>
        </div>
    </section>
</body>
</html>