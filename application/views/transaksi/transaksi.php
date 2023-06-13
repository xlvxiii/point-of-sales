<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>
    <?= $this->session->flashdata('message') ?>

    <div class="row">
        <div class="card shadow mb-4 col-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>

            <div class="card-body">

                <form action="<?= base_url('transaksi/cart') ?>" method="post" name="data_menu" id="">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="kode_menu" name="kode_menu" placeholder="Kode Menu">
                        </div>
                        <div class="col-sm-6">

                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tambah
                    </button>
                </form>

            </div>
        </div>

        <div class="col-1"></div>

        <div class="card shadow mb-4 col-6" id="print">

            <div class="card-body">

                <!--
                <table>
                    <thead>
                        <td>Nama</td>
                        <td>Jumlah</td>
                        <td>Harga</td>
                    </thead>
                    <tbody>
                        <?php /*foreach ($this->cart->contents() as $items) : ?>
                            <tr>
                                <td><?= $items['name'] ?></td>
                                <td><?= $items['qty'] ?></td>
                                <td><?= $items['price'] ?></td>

                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td>Total</td>
                            <td><?= $this->cart->total() */ ?></td>
                        </tr>
                    </tbody>
                </table>
                -->

                <h5 class='card-tittle mb-0 text-center'><b>Toko</b></h5>
                <p class='m-0 small text-center'>Alamat</p>
                <p class='small text-center'>Telp. </p>
                <div class="row">
                    <div class="col-8 col-sm-9 pr-0">
                        <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                            <li>No. Transaksi : <?php if ($this->session->userdata('kode_menu') == null) {
                                                    $kode_transaksi = $this->session->userdata('kode_transaksi');
                                                    echo $kode_transaksi;
                                                } ?></li>
                            <li>Kasir : <?= $user['nama'] ?></li>
                        </ul>
                    </div>
                    <div class="col-4 col-sm-3 pl-0">
                        <ul class="pl-0 small" style="list-style: none;">
                            <li>TGL : <?php echo  date("j-m-Y"); ?></li>
                            <li>JAM : <?php echo  date("G:i:s"); ?></li>
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
                    <?php foreach ($this->cart->contents() as $items) : ?>
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
                        <span><?= $this->cart->total() ?></span>
                    </div>

                </div>

            </div>
        </div>

        <div class="text-right col-12">
            <button type="submit" class="btn btn-info" onclick="printContent('print')">
                Cetak
            </button>
            <a href="<?= base_url('transaksi/save') ?>">
                <button type="submit" class="btn btn-primary">
                    Selesai
                </button>
            </a>
        </div>

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