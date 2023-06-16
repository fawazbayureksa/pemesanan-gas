<?php
require 'process_option.php';
?>

<div class="p-3">
    <h3>Tambah Distribusi</h3>
    <form action="process_distribusi.php" method="POST">
        <input type="hidden" class="form-control my-3" name="action" value="create">
        <input type="hidden" class="form-control my-3" name="user_id" id="user_id" value="<?= $_SESSION['admin']['id'] ?>">
        <input type="hidden" class="form-control my-3" name="id_pangkalan" id="id_pangkalan" value="">
        <input type="hidden" class="form-control my-3" name="id_permintaan" id="permintaan" value="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">No Surat</label>
                    <input type="text" class="form-control my-3" name="no_surat_jalan" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Pilih Permintaan</label>
                    <Select class="form-control my-3" name="" id="id_permintaan">
                        <option value="">-- Pilih --</option>
                        <?php
                        $crud = new ReadOption();
                        $datas = $crud->readPermintaan();
                        foreach ($datas as $data) {
                            $id = $data['id'];
                            $barang = $data['barang'];
                        ?>
                            <option data-permintaan="<?= htmlspecialchars(json_encode($data)) ?>" value="<?= $id ?>"><?= $barang ?></option>
                        <?php
                        }
                        ?>
                    </Select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Pangkalan</label>
                    <input type="text" class="form-control my-3" name="nama_pemilik_pangkalan" id="nama_pemilik_pangkalan" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tanggal Kirim</label>
                    <input type="date" class="form-control my-3" name="tgl_kirim" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Supir</label>
                    <Select class="form-control  my-3" name="id_supir">
                        <option class="" value="">-- Pilih --</option>
                        <?php
                        $read = new ReadOption();
                        $datas = $read->readDriver();
                        foreach ($datas as $data) {
                            $id = $data['id'];
                            $nama = $data['nama'];

                        ?>
                            <option value="<?= $id ?>"><?= $nama ?></option>
                        <?php } ?>
                    </Select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Kendaraan</label>
                    <Select class="form-control  my-3" name="id_mobil">
                        <option class="" value="">-- Pilih --</option>
                        <?php
                        $read = new ReadOption();
                        $datas = $read->readKendaraan();
                        foreach ($datas as $data) {
                            $id = $data['id'];
                            $no = $data['no_kendaraan'];
                        ?>
                            <option value="<?= $id ?>"><?= $no ?></option>
                        <?php } ?>
                    </Select>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success float-end ms-3" value="Simpan">
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#id_permintaan').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var dataPermintaan = selectedOption.data('permintaan');
            console.log(dataPermintaan);
            $('#permintaan').val(dataPermintaan.id_permintaan);
            $('#nama_pemilik_pangkalan').val(dataPermintaan.nama_pemilik_pangkalan);
            $('#id_pangkalan').val(dataPermintaan.id_pangkalan);
        })
    });
</script>