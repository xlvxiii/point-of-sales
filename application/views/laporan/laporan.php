<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menu terjual</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Menu</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->kode_menu ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->harga ?></td>
                                <td><?= $row->jumlah ?></td>
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Log transaksi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Log transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row_transaksi as $row_transaksi) { ?>
                            <tr>
                                <td><?= $no_transaksi++ ?></td>
                                <td><?= $row_transaksi->kode_transaksi ?></td>
                                <td><?= date('j-m-Y', $row_transaksi->tanggal) ?></td>
                                <td><?= anchor('Laporan/log_transaksi/' . $row_transaksi->id, '<button type="button" class="btn btn-primary btn-sm">Detail</button>') ?></td>
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->