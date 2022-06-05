<?php
include 'admin/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Kantin</title>
    <!-- CUSTOM CSS -->
    <!-- <link rel="stylesheet" href=" admin/assets/css/login-regis.css"> -->
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

<h1>Registrasi</h1>
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

    <div class="container">
        <div class="card">
            <br>
            <form method="post" name="register">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" placeholder="Example: Rizki Saepul Aziz" name="nama" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" placeholder="Example: XI RPL 2" name="kelas" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" placeholder="Example: 083820630348" name="telp" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Gender</label> <br>
                    <input type="radio" name="gender" class="form-label" value="Male">
                    <label class="form-check-label">Laki-Laki</label>
                </div>
                <div class="mb-3">
                    <input type="radio" name="gender" class="form-label" value="Female">
                    <label class="form-check-label">Perempuan</label>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" placeholder="Example: rzxyss" name="username" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="Input Your Password" name="password" class="form-control">
                </div>
                <br>
                <div class="btn-login">
                    <button type="submit" name="regis" class="btn btn-primary">REGISTER</button>
                    <div class="link content-center" style="margin-top: 5px;">
                        Mempunyai Akun?<a href="login.php"> Login Disini</a>
                    </div>
                </div>
            </form>
            <?php
                if (isset($_POST['regis'])) {
                    $nama = $_POST['nama'];
                    $kelas = $_POST['kelas'];
                    $telp = $_POST['telp'];
                    $gender = $_POST['gender'];
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $sql = "INSERT INTO siswa (nama_siswa, kelas_siswa, telp_siswa, gender, username, password)
                    VALUES ('$nama','$kelas','$telp','$gender','$username','$password')";
                    $query = mysqli_query($conn, $sql);
                    echo '<script>alert("Registrasi Berhasil");</script>';
                    echo '<script>location="login.php"</script>';
                }
            ?>
        </div>
    </div>
</body>

</html>