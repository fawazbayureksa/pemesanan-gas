<?php
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}
require 'process_pangkalan.php';
?>

<div class="p-3">
    <h3>Data Pangkalan</h3>
    <a href="index.php?Page=tambah-pangkalan" class="btn btn-primary float-end mb-3">Tambah</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Usaha</th>
                <th>Nama Pemilik</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $crud = new CrudPangkalan();
            $datas = $crud->read();
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_pemilik'] ?></td>
                    <td><?= $data['nama_pemilik'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td width="15%"><a href="process_pangkalan.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?Page=edit-pangkalan&id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>