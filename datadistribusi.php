<?php
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}
require 'process_distribusi.php';
?>

<div class="p-3">
    <h3>Data Ditribusi </h3>
    <a href="index.php?Page=tambah-distribusi" class="btn btn-primary float-end mb-3">Tambah</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Nama pemilik</th>
                <th>Permintaan</th>
                <th>Tanggal Kirim</th>
                <th>No Kendaraan</th>
                <th>Nama Supir</th>
                <!-- <th>user_id</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $crud = new CrudDistribusi();
            $datas = $crud->readJoin();
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['no_surat_jalan'] ?></td>
                    <td><?= $data['nama_pemilik_pangkalan'] ?></td>
                    <td><?= $data['barang'] ?></td>
                    <td><?= $data['tgl_kirim'] ?></td>
                    <td><?= $data['no_kendaraan'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <!-- <td><?= $data['user_id'] ?></td> -->
                    <!-- <td width="15%"><a href="process_pangkalan.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?Page=edit-pangkalan&id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                    </td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>