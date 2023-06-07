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
            <form action="<?= base_url('menu/edit') ?>" method="post" name="data_menu">
                <?php foreach ($menu as $row) ?>

                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="kode_menu" name="kode_menu" placeholder="Kode Menu" value="<?= $row->kode_menu ?>">
                        <small class="text-danger"><?= form_error('kode_menu') ?></small>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Menu" value="<?= $row->nama ?>">
                        <small class="text-danger"><?= form_error('nama') ?></small>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Menu" value="<?= $row->harga ?>">
                    <small class="text-danger"><?= form_error('harga') ?></small>
                </div>
                <button type="submit" class="btn btn-primary">
                    Edit
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->