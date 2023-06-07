<p class="text-center">Registrasi</p>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col rounded-top rounded-bottom rounded-end rounded-start p-5">
            <form action="<?= base_url('auth/registrasi') ?>" method="post" name="data">
                <input type="hidden" name="id">
                <p class="mb-0">Nama</p>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama" value="<?= set_value('nama') ?>">
                    <small class="text-danger"><?= form_error('nama') ?></small>
                    <label for="nama">Masukkan nama</label>
                </div>
                <p class="mb-0">Username</p>
                <div class="form-floating mb-3">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" value="<?= set_value('username') ?>">
                    <small class="text-danger"><?= form_error('username') ?></small>
                    <label for="nama">Masukkan username</label>
                </div>
                <p class="mb-0">Password</p>
                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                    <small class="text-danger"><?= form_error('password') ?></small>
                    <label for="nama">Masukkan password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirm_password" id="password" class="form-control" placeholder="Konfirmasi password">
                    <small class="text-danger"><?= form_error('confirm_password') ?></small>
                    <label for="nama">Konfirmasi password</label>
                </div>
                <div class="text-center">
                    <input type="button" class="btn btn-primary" value="Login" onclick="location.href='<?php echo base_url(); ?>'">
                    <input type="submit" class="btn btn-primary" value="Register" name="register">
                </div>
            </form>
        </div>
        <div class="col"></div>

    </div>
</div>