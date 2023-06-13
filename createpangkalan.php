<?php
include 'koneksi.php';

// $id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tpangkalan WHERE id ='$id'";

    $datas = mysqli_query($db, $query);

    $data = mysqli_fetch_assoc($datas);
} else {
    $data = array('id' => null, 'sub_penyalur' => '', 'type_pangkalan' => '', 'nama_pemilik' => '', 'alamat' => '', 'no_telp' => '', 'kota' => '', 'desa' => '', 'kode_pos' => '', 'username' => '', 'status' => '');
}

?>

<div class="p-3">
    <h3><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Pangkalan</h3>
    <form action="process_pangkalan.php" method="POST">
        <input type="hidden" name="action" id="action" <?= isset($data['id']) ? ' value="edit"' : ' value="create"' ?>>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Penyalur</label>
                    <input type="text" class="form-control my-3" name="sub_penyalur" id="name" value="<?= $data['sub_penyalur'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Type pangkalan</label>
                    <Select class="form-control my-3" name="type_pangkalan">
                        <option class="" value="">-- Pilih --</option>
                        <option class="" value="partai" <?= $data['type_pangkalan'] == "partai" ? 'selected' : '' ?>>Partai</option>
                        <option class="" value="eceran" <?= $data['type_pangkalan'] == "eceran" ? 'selected' : '' ?>>Eceran</option>
                    </Select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama Pemilik</label>
                    <input type="text" class="form-control my-3" value="<?= $data['nama_pemilik'] ?>" name="nama_pemilik" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Alamat</label>
                    <textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">No Telepon</label>
                    <input type="text" class="form-control my-3" value="<?= $data['no_telp'] ?>" name="no_telp" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Kota</label>
                    <input type="text" class="form-control my-3" name="kota" value="<?= $data['kota'] ?>" id="name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Desa</label>
                    <input type="text" class="form-control my-3" value="<?= $data['desa'] ?>" name="desa" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Kode Pos</label>
                    <input type="text" class="form-control my-3" value="<?= $data['kode_pos'] ?>" name="kode_pos" id="name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control my-3" value="<?= $data['username'] ?>" name="username" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control my-3" name="password" id="name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Status</label>
                    <Select class="form-control my-3" name="status">
                        <option class="" value="">-- Pilih --</option>
                        <option class="" value="aktif" <?= $data['status'] == "aktif" ? 'selected' : '' ?>>Aktif</option>
                        <option class="" value="nonaktif" <?= $data['status'] == "nonaktif" ? 'selected' : '' ?>>Non-aktif</option>
                    </Select>
                    <!-- <input type="text" class="form-control my-3" name="status" id="name"> -->
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success float-end ms-3" value="Simpan">
        <a class="btn btn-secondary float-end" href="index.php?Page=data-pangkalan">Kembali</a>
    </form>
</div>

<script>

</script>