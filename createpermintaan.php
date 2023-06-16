<?php

// print_r($_SESSION['admin']['id'])
?>

<div class="p-3">
    <h3>Pengajuan Permintaan</h3>
    <form action="process_permintaan.php" method="POST">
        <input type="hidden" name="action" id="action" value="create">
        <input type="hidden" name="id_pangkalan" value="<?= $_SESSION['admin']['id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tanggal Permintaan</label>
                    <input type="date" class="form-control my-3" name="tgl_permintaan" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Barang</label>
                    <input type="text" class="form-control my-3" name="barang" id="name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Jumlah Permintaan</label>
                    <input type="number" class="form-control my-3" name="jumlah_permintaan" id="jumlah">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Harga Barang(satuan)</label>
                    <input type="number" class="form-control my-3" name="harga" id="harga">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Total Harga</label>
                    <input type="number" class="form-control my-3" name="total" value="0" id="total" disabled>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success float-end ms-3" value="Kirim">
        <!-- <a class="btn btn-secondary float-end" href="index.php?Page=data-permintaan">Kembali</a> -->
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#harga').on('change', function() {
            var jumlah = $('#jumlah').val();
            var harga = $('#harga').val();

            var total = jumlah * harga;
            $('#total').val(total);
        });
        // };
    });
</script>