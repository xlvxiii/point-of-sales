<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menu</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Menu</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('menu/save') ?>" method="post" name="data_menu">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="kode_menu" name="kode_menu" placeholder="Kode Menu" value="<?= set_value('kode_menu') ?>">
                        <small class="text-danger"><?= form_error('kode_menu') ?></small>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Menu" value="<?= set_value('nama') ?>">
                        <small class="text-danger"><?= form_error('nama') ?></small>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Menu" value="<?= set_value('harga') ?>">
                    <small class="text-danger"><?= form_error('harga') ?></small>
                </div>
                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>
            </form>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message1') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Menu</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->kode_menu ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->harga ?></td>
                                <td>
                                    <?php echo anchor('Menu/edit_form/' . $row->id, '<button type="button" class="btn btn-primary btn-sm">Edit</button>') ?>
                                    <?php echo anchor('Menu/delete/' . $row->id, '<button type="button" class="btn btn-danger btn-sm">Hapus</button>') ?>
                                </td>
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