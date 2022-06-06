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
    <title>Login - E-Kantin</title>
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
    <!-- NAVBAR -->
    <h1>Login</h1>
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

    <div class="container">
        <div class="card">
            <br>
            <form method="post" name="login">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" placeholder="Masukan Email Anda" name="username" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="Masukan Password Anda" name="password" class="form-control">
                </div>
                <br>
                <div class="btn-login">
                    <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                    <div class="link content-center" style="margin-top: 5px;">
                        Tidak Mempunyai Akun?<a href="register.php"> Daftar</a>
                    </div>
                </div>
            </form>
            Login Sebagai Admin?<a href="admin/login.php"> Klik Disni</a>
        </div>
    </div>

    <?php
        if(isset($_POST['login']))
        {
            $username =  $_POST['username'];
            $pass = md5($_POST['password']);
            $sql = "SELECT * FROM siswa WHERE username='$username' AND password='$pass'";
            $query = mysqli_query($conn, $sql);
            $find = mysqli_num_rows($query);
            if ($find==1)
            {
                $account = mysqli_fetch_assoc($query);
                $_SESSION['siswa'] = $account;
                echo '<script>alert("Login Sukses");</script>';
                echo '<script>location="index.php";</script>';
            } else {
                echo '<script>alert("Login Gagal");</script>';
                echo '<script>location="login.php";</script>';
            }
        }
    ?>

    <!-- SCRIPT BS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>