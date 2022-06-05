<?php
    session_start();
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
    <h1>E Kantin</h1>
    <div class="text-center">
        <nav>
            <ul>
                <a href="#">
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

    <section class="items">
        <?php
            $sql = 'SELECT * FROM produk';
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_assoc($result)){
        ?>
        <div class="item">
            <img src="produk/<?= $data['foto_produk'] ?>">
            <h4><?= $data['nama_produk'] ?></h4>
            <h6 class="text-center"><?= $data['deskripsi_produk'] ?></h6>
            <h4>Rp.<?= number_format($data['harga_produk']) ?></h4>
            <a href="beli.php?id=<?= $data['id_produk']?>" class="btn btn-primary">Tambah</a>
        </div>
        <?php }?>


    </section>

</body>

</html>

</html>