<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Distribusi Gas LPG 3KG</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header bg-primary-y734 text-center">
                        <h3 style="color: white;">Login</h3>
                    </div>
                    <div class="card p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <form method="post">
                                    <div class="form-group">
                                        <label>username</label>
                                        <input type="text" name="user" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button class="btn btn-primary btn-md" name="login"><i class="fa fa-paper-plane"></i> Masuk</button>
                                        <a href="login.php" class="btn btn-danger btn-md">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/bootstrap.min.js"></script>

</html>

<?php

include 'koneksi.php';

if (isset($_POST['login'])) {

    $pass = $_POST['pass'];

    $query = mysqli_query($db, "SELECT * FROM users WHERE username='$_POST[user]' and password='$pass'");
    $cek = mysqli_num_rows($query);

    if ($cek == 1) {

        $_SESSION['admin'] = mysqli_fetch_assoc($query);

        echo "<script>alert('Login Berhasil');</script>";
        echo "<script>location='index.php?Page=dashboard'</script>";
    } else {
        echo  "<script>alert('Login Gagal , Masukkan Data Yang Benar!!!');</script>";
        echo "<meta http.equiv='refresh' content='1;url=login.php'>";
    }
}
?>