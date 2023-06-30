<?php
date_default_timezone_set('Asia/Jakarta');
include 'process_report.php';
?>

<div>
    <h3>Laporan</h3>
    <form method="POST">
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="startDate">Tanggal Awal</label>
                <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="col-md-5 mb-3">
                <label for="endDate">Tanggal Akhir</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="col-md-2 align-self-center">
                <button type="submit" class="btn btn-primary" id="cari" name="cari">Cari</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['cari'])) {
    ?>
        <p>Hasil dari tanggal <?= $_POST['startDate'] ?> dan <?= $_POST['endDate'] ?></p>
    <?php
    }
    ?>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat Jalan</th>
                <th>Tanggal</th>
                <th>Pangkalan</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $crud = new Report();
            $no = 1;
            $datas = $crud->read();
            if (isset($_POST['cari'])) {
                $datas = $crud->readRange($_POST['startDate'], $_POST['endDate']);
            }

            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['no_surat_jalan'] ?></td>
                    <td><?= $data['tgl_kirim'] ?></td>
                    <td><?= $data['nama_pemilik_pangkalan'] ?></td>
                    <td><?= $data['barang'] ?></td>
                    <td><?= $data['jumlah_permintaan'] ?></td>
                    <td>Rp<?= number_format($data['harga']) ?></td>
                    <td>Rp<?= number_format($data['jumlah_bayar']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <a href="" id="cetak" onclick="" class="btn btn-secondary">Cetak</a>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#cetak').click(function() {
            $("#sidebar").css("display", "none");
            $("#cari").css("display", "none");
            $("#cetak").css("display", "none");
            window.print();
        });
    });
</script>