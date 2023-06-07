<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    <?= $this->session->flashdata('message') ?>
                                </div>
                                <form class="user" action="<?= base_url('auth') ?>" method="post" name="data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="" name="username" placeholder="Enter Username..." value="<?= set_value('username') ?>">
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="" name="password" placeholder="Enter Password" value="<?= set_value('password') ?>">
                                        <small class="text-danger"><?= form_error('password') ?></small>
                                    </div>
                                    <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registrasi') ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>