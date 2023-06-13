<?php

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] .  '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    unset($_SESSION['success_message']);
}
?>
<div class="p-3">
    <h3>Data Kendaraan</h3>
    <button type="button" id="add-btn" class="btn btn-primary">
        Tambah Kendaraan
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kendaraan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_kendaraan.php" method="POST">
                        <input type="hidden" id="action" name="action" value="">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="name">No Plat:</label>
                        <input type="text" class="form-control my-3" name="no_kendaraan" id="no_kendaraan">
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
            $crud = new CrudKendaraan();
            $datas = $crud->read();
            $no = 1;
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="d-none id"><?= $data['id'] ?></td>
                    <td class="no_kendaraan"><?= $data['no_kendaraan'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="process_kendaraan.php?action=delete&id=<?= $data['id'] ?>">Delete</a>
                        <button class="edit-btn btn btn-warning" type="button">Edit</button>
                    </td>
                </tr>
        </tbody>
    <?php } ?>
    </table>

</div>

<script>
    $(document).ready(function() {
        // Menangkap event klik pada tombol edit
        $('.edit-btn').click(function() {
            // Mendapatkan nilai dari kolom tabel
            var id = $(this).closest('tr').find('.id').text();
            var name = $(this).closest('tr').find('.no_kendaraan').text();

            $('#action').val('edit');
            // Mengisi nilai dalam modal
            $('#id').val(id);
            $('#no_kendaraan').val(name);

            // // Menampilkan modal
            $('.modal').modal('show');
        });
        // Menangkap event klik pada tombol edit
        $('#add-btn').click(function() {

            $('#id').val('');
            $('#no_kendaraan').val('');

            $('#action').val('create');
            // // Menampilkan modal
            $('.modal').modal('show');
        });
    });
</script>