<?php
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}
require 'process_permintaan.php';
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $crud = new CrudPermintaan();
            $datas = $crud->read();
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['id_pangkalan'] ?></td>
                    <td><?= $data['barang'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['jumlah_permintaan'] ?></td>
                    <td><?= $data['status_permintaan'] ?></td>
                    <td><?= $data['jumlah_bayar'] ?></td>
                    <td width="20%"><a href="process_pangkalan.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-secondary btn-md">Selesai</a>
                        <a href="index.php?Page=edit-pangkalan&id=<?= $data['id'] ?>" class="btn btn-primary btn-md">Konfirmasi</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>