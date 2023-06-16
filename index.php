<?php
include 'process_driver.php';
include 'process_kendaraan.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
    <!-- <h1>Bismillahirohmanirohim</h1> -->
    <?php
    include 'sidebar.php';
    ?>
    <div class="col py-3">
        <?php
        if (isset($_GET['Page'])) {
            if ($_GET['Page'] == "dashboard") {
                include 'dashboard.php';
            } elseif ($_GET['Page'] == "data-supir") {
                include 'datasupir.php';
            } elseif ($_GET['Page'] == "data-kendaraan") {
                include 'datakendaraan.php';
            } elseif ($_GET['Page'] == "data-pangkalan") {
                include 'datapangkalan.php';
            } elseif ($_GET['Page'] == "tambah-pangkalan") {
                include 'createpangkalan.php';
            } elseif ($_GET['Page'] == "edit-pangkalan") {
                include 'createpangkalan.php';
            } elseif ($_GET['Page'] == "data-permintaan") {
                include 'datapermintaan.php';
            } elseif ($_GET['Page'] == "ajukan-permintaan") {
                include 'createpermintaan.php';
            } elseif ($_GET['Page'] == "report") {
                include 'report.php';
            } elseif ($_GET['Page'] == "data-distribusi") {
                include 'datadistribusi.php';
            } elseif ($_GET['Page'] == "tambah-distribusi") {
                include 'createdistribusi.php';
            } else {
                echo '404 Not Found';
            }
        }
        ?>
    </div>
    </div>
    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>