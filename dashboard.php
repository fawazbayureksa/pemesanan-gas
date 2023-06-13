<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<div class="p-3">
    <h3>Selamat Datang <strong> <?= $_SESSION['admin']['name'] ?></strong> ! </h3>
</div>