<?php

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}
?>
<div class="p-3">
    <h3>Data Supir</h3>
    <button type="button" class="btn btn-primary add-btn">
        Tambah Supir
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Supir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_driver.php" method="POST">
                        <input type="hidden" name="action" id="action" value="">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control my-3" name="name" id="name">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $crud = new CRUD();
            $datas = $crud->read();
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td width="5%"><?= $no++ ?></td>
                    <td class="d-none id"><?= $data['id'] ?></td>
                    <td class="name"><?= $data['nama'] ?></td>
                    <td width="20%">
                        <a href="process_driver.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-warning edit-btn">Edit</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // Menangkap event klik pada tombol edit
        $('.edit-btn').click(function() {
            // Mendapatkan nilai dari kolom tabel
            var id = $(this).closest('tr').find('.id').text();
            var name = $(this).closest('tr').find('.name').text();

            $('#action').val('edit');
            // Mengisi nilai dalam modal
            $('#id').val(id);
            $('#name').val(name);

            // // Menampilkan modal
            $('.modal').modal('show');
        });
        // Menangkap event klik pada tombol edit
        $('.add-btn').click(function() {

            $('#id').val('');
            $('#name').val('');

            $('#action').val('create');
            // // Menampilkan modal
            $('.modal').modal('show');
        });
    });
</script>