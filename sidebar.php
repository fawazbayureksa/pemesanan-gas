<?php

// print_r($_SESSION['admin']);

?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary" id="sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <!-- <img src="./styles/images/logo.png" width="auto" height="80px" alt="" /> -->
                    <!-- <span class="fs-4 d-none d-sm-inline text-center">BANK BMH Makassar</span> -->
                    <span class="fs-2 d-none d-sm-inline text-center">PT Gas</span>

                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="index.php?Page=dashboard" class="nav-link align-middle px-0 ">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?Page=data-permintaan" class="nav-link align-middle px-0 ">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Permintaan</span>
                        </a>
                    </li>
                    <?php if (($_SESSION['admin']['is_type']) == 1) { ?>
                        <li class="nav-item">
                            <a href="index.php?Page=ajukan-permintaan" class="nav-link align-middle px-0 ">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Ajukan Permintaan</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Item</span> 1 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Item</span> 2 </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="index.php?Page=customer-profil" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Informasi Profil</span></a>
                    </li>
                    <a href="index.php?Page=customers" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Daftar Nasabah</span></a>
                    </li>
                    <li>
                        <a href="index.php?Page=transaction" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Transaksi</span></a>
                    </li> -->
                    <?php if (($_SESSION['admin']['is_type']) == 0) { ?>
                        <li>
                            <a href="index.php?Page=data-supir" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Daftar Sopir</span></a>
                        </li>
                        <li>
                            <a href="index.php?Page=data-kendaraan" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Daftar Kendaraan</span></a>
                        </li>
                        <li>
                            <a href="index.php?Page=data-pangkalan" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Data Pangkalan</span></a>
                        </li>
                        <li>
                            <a href="index.php?Page=data-distribusi" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Data Distribusi</span></a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="index.php?Page=report" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Laporan</span></a>
                    </li>
                    <li>
                        <a href="login.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-white">Logout</span></a>
                    </li>
                    <!-- <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline text-white">Bootstrap</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Item</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Item</span> 2</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline text-white">Customers</span> </a>
                    </li> -->
                </ul>
                <hr>
                <!-- <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div> -->
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>