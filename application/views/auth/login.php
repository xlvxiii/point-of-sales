<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col rounded-top rounded-bottom rounded-end rounded-start p-5">
      <p class="text-center">Login</p>
      <?= $this->session->flashdata('message') ?>
      <form action="<?= base_url('auth') ?>" method="post" name="data">
        <input type="hidden" name="id">
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
        <div class="text-center">
          <input type="submit" class="btn btn-primary" value="Login" name="login">
          <input type="button" class="btn btn-primary" value="Registrasi" name="registrasi" onclick="location.href='<?= 'Auth/registrasi' ?>'">
        </div>

      </form>
    </div>
    <div class="col"></div>

  </div>
</div>