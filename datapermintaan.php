<?php
require 'process_permintaan.php';
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}

$crud = new CrudPermintaan();


if ($_SESSION['admin']['id'] == 0000) {
    $datas = $crud->read();
} else {
    $datas = $crud->readSelf($_SESSION['admin']['id']);
}

?>

<div class="p-3">
    <h3>Data Pemintaan</h3>
    <!-- <a href="index.php?Page=tambah-pangkalan" class="btn btn-primary float-end mb-3">Tambah</a> -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Barang</th>
                <th>harga</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Total Bayar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_pemilik_pangkalan'] ?></td>
                    <td><?= $data['barang'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['jumlah_permintaan'] ?></td>

                    <td>
                        <?php if ($data['status_permintaan']  == 3) {
                            echo 'Dibatalkan';
                        } elseif ($data['status_permintaan'] == 2) {
                            echo 'Selesai';
                        } else {
                            echo   'Dalam Proses';
                        } ?></span>
                    </td>
                    <td><?= $data['jumlah_bayar'] ?></td>
                    <td width="20%" class="text-center">
                        <?php if ($_SESSION['admin']['is_type'] == 0) { ?>
                            <?php if ($data['status_permintaan']  == 1) { ?>
                                <a href="process_permintaan.php?action=done&id=<?= $data['id_permintaan'] ?>" class="btn btn-secondary btn-md">Selesai</a>
                            <?php } elseif ($data['status_permintaan']  == 0) { ?>
                                <a href="process_permintaan.php?action=konfirmasi&id=<?= $data['id_permintaan'] ?>" class="btn btn-primary btn-md">Konfirmasi</a>
                            <?php } else { ?>
                                <strong class="text-center">Selesai</strong>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if ($data['status_permintaan']  == 0) { ?>
                                <a href="process_permintaan.php?action=cancel&id=<?= $data['id_permintaan'] ?>" class="btn btn-secondary btn-md">Batalkan</a>
                            <?php } else { ?>
                                <span>
                                    <?php if ($data['status_permintaan']  == 3) {
                                        echo 'Dibatalkan';
                                    } elseif ($data['status_permintaan'] == 2) {
                                        echo 'Selesai';
                                    } else {
                                        echo   'Dalam Proses';
                                    } ?></span>
                            <?php } ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>