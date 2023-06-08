<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengaturan</h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Akun</h6>
        </div>

        <form action="<?= base_url('user/edit_akun') ?>" method="post" name="data_user">
            <div class="card-body">
                <?= $this->session->flashdata('message') ?>

                <div class="col mb-3 row">
                    <label for="nama" class="font-weight-bold">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?= $user['nama'] ?>">
                    <small class="text-danger"><?= form_error('nama') ?></small>
                </div>
                <div class="col mb-3 row">
                    <label for="username" class="font-weight-bold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?= $user['username'] ?>">
                    <small class="text-danger"><?= form_error('username') ?></small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>

        <!-- ganti password -->
        <form action="<?= base_url('user/edit_password') ?>" method="post" name="data_password">
            <div class="card-body">
                <?= $this->session->flashdata('message1') ?>

                <div class="mb-2">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="new_password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukkan password baru" value="">
                        <small class="text-danger"><?= form_error('new_password') ?></small>
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="font-weight-bold">Konfirmasi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password lama" value="">
                        <small class="text-danger"><?= form_error('password') ?></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Konfirmasi
                </button>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->