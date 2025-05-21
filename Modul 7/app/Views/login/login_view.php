<div class="wrapper-form">
    <div class="form-header">
        <div class="titles">
            <div class="title-login">Login</div>
        </div>
    </div>
    <div class="text-center fw-bold">
        Perpustakaan
        <a href="/register">Register disini</a>
    </div>

    <!-- LOGIN FORM -->
    <form action="/auth/login" method="post" class="login-form" autocomplete="off">
        <?php csrf_field(); ?> 
        <div class="input-box">
            <input type="text" class="input-field form-control <?= (session('validation') && session('validation')->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username') ?>">
            <label for="username" class="label">Username</label>
            <i class="bi bi-person-circle icon"></i>
            <?php if (session('validation') && session('validation')->hasError('username')) : ?>
                <div class="invalid-feedback">
                    <?= session('validation')->getError('username'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <input type="text" class="input-field form-control <?= (session('validation') && session('validation')->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>">
            <label for="email" class="label">Email</label>
            <i class="bi bi-envelope-fill icon"></i>
            <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                <div class="invalid-feedback">
                    <?= session('validation')->getError('email'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <input type="password" class="input-field form-control <?= (session('validation') && session('validation')->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
            <label for="password" class="label">Password</label>
            <i class="bi bi-lock-fill icon"></i>
            <?php if (session('validation') && session('validation')->hasError('password')) : ?>
                <div class="invalid-feedback">
                    <?= session('validation')->getError('password'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <button type="submit" class="btn-submit" id="login" name="login">Login <i class="bi bi-box-arrow-in-right"></i> </button>
        </div>
    </form>
</div>