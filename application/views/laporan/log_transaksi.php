<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Log Transaksi</h1>

    <div class="card shadow mb-4 col-6" id="print">

        <div class="card-body">
            <h5 class='card-tittle mb-0 text-center'><b>Toko</b></h5>
            <p class='m-0 small text-center'>Alamat</p>
            <p class='small text-center'>Telp. </p>
            <div class="row">
                <div class="col-8 col-sm-9 pr-0">
                    <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                        <li>No. Transaksi : <?= $row['kode_transaksi'] ?></li>
                        <li>Kasir : <?= $row['kasir'] ?></li>
                    </ul>
                </div>
                <div class="col-4 col-sm-3 pl-0">
                    <ul class="pl-0 small" style="list-style: none;">
                        <li>TGL : <?= date('j-m-Y', $row['tanggal']) ?></li>
                        <li>JAM : <?= date('G:i:s', $row['tanggal']) ?></li>
                    </ul>
                </div>

                <div class="col-5 pr-0">
                    <span><b>Nama</b></span>
                </div>
                <div class="col-2 px-0 text-center">
                    <span><b>Jumlah</b></span>
                </div>
                <div class="col-4 px-0 text-right">
                    <span><b>Harga</b></span>
                </div>

                <div class="col-12">
                    <hr class="mt-2">
                </div>
                <?php foreach ($detail as $items) : ?>
                    <div class="col-5 pr-0">
                        <span><?= $items['name'] ?></span>
                    </div>
                    <div class="col-2 px-0 text-center">
                        <span><?= $items['qty'] ?></span>
                    </div>
                    <div class="col-4 px-0 text-right">
                        <span><?= $items['price'] ?></span>
                    </div>

                <?php endforeach ?>

                <div class="col-12">
                    <hr class="mt-2">
                </div>

                <div class="col-7 pr-0">
                    <span><b>Total</b></span>
                </div>
                <div class="col-4 px-0 text-right">
                    <span><?= $row['total_harga'] ?></span>
                </div>

            </div>

        </div>
    </div>

    <div class="text-right col-6">
        <a href="<?= base_url('laporan') ?>">
            <button type="submit" class="btn btn-info">
                Kembali
            </button>
        </a>
        <button type="submit" class="btn btn-primary" onclick="printContent('print')">
            Cetak
        </button>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    function printContent(print) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(print).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>