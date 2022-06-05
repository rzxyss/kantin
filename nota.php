<?php
    include 'admin/config.php';
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
<h1>Nota Pembelian</h1>
    <div class="text-center">
        <nav>
            <ul>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="keranjang.php">
                    <li>Keranjang</li>
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
            <?php
                $sql = "SELECT * FROM pembelian JOIN siswa ON pembelian.id_siswa=siswa.id_siswa WHERE pembelian.id_pembelian='$_GET[id]'";
                $query = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($query);
            ?>
            <strong><?= $data['nama_siswa'] ?></strong>
            <p>
                <?= $data['telp_siswa'] ?> <br>
                <?= $data['tanggal_pembelian'] ?> <br>
                Rp. <?= number_format($data['total_pembelian']) ?>
            </p>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $db = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk
                        WHERE pembelian_produk.id_pembelian";
                        $result = mysqli_query($conn, $db);
                        while($detail = mysqli_fetch_assoc($result)){
                            $subtotal = $detail['harga_produk']*$detail['jumlah'];
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $detail['nama_produk']?></td>
                        <td><?= $detail['harga_produk'] ?></td>
                        <td><?= $detail['jumlah'] ?></td>
                        <td><?= $subtotal ?></td>
                    </tr>
                    <?php
                        $nomor++;
                        }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        Silahkan Screenshot Nota Pembelian Ini Dan Tunggu Admin Datang Ke Kelasmu Lalu Lakukan Pembayaran Sebesar Rp. <?= number_format($data['total_pembelian']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>