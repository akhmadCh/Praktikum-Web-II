<div class="wrapper-register-form">
    <div class="form-header">
        <div class="titles">
            <div class="title-register">Register</div>
        </div>
    </div>
    <div class="text-center fw-bold">
        Perpustakaan
        <a href="/login">Punya akun? Login</a>
    </div>

    <!-- REGISTER FORM -->
    <form method="post" action="/auth/register" class="register-form" autocomplete="off">
        <?php csrf_field() ?>
        <div class="input-box">
            <input type="text" class="input-field form-control <?= (session('validation') && session('validation')->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username') ?>">
            <label for="username" class="label">Username</label>
            <i class="bi bi-person-circle icon"></i>
            <?php if (session('validation') && session('validation')->hasError('username')) : ?>
                <div class="invalid-feedback error-message error-message">
                    <?= session('validation')->getError('username'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <input type="email" class="input-field form-control <?= (session('validation') && session('validation')->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email') ?>">
            <label for="email" class="label">Email</label>
            <i class="bi bi-envelope-fill icon"></i>
            <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                <div class="invalid-feedback error-message">
                    <?= session('validation')->getError('email'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <input type="password" class="input-field form-control <?= (session('validation') && session('validation')->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" autofocus>
            <label for="password" class="label">Password</label>
            <i class="bi bi-lock-fill icon"></i>
            <?php if (session('validation') && session('validation')->hasError('password')) : ?>
                <div class="invalid-feedback error-message">
                    <?= session('validation')->getError('password'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="input-box">
            <input type="password" class="input-field form-control <?= (session('validation') && session('validation')->hasError('password_confirm')) ? 'is-invalid' : ''; ?>" id="password_confirm" name="password_confirm" autofocus>
            <label for="password_confirm" class="label">Konfirm Password</label>
            <i class="bi bi-lock-fill icon"></i>
            <?php if (session('validation') && session('validation')->hasError('password_confirm')) : ?>
                <div class="invalid-feedback error-message">
                    <?= session('validation')->getError('password_confirm'); ?>
                </div>
            <?php endif; ?>
        </div>
    
        <div class="input-box">
            <button type="submit" class="btn-submit" id="login" name="login">Register <i class="bi bi-box-arrow-in-right"></i> </button>
        </div>
    </form>
</div>
