<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php elseif (session()->getFlashdata('err')) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= session()->getFlashdata('err') ?>
        </div>
    <?php endif; ?>

    <?= form_open('login', ['class' => 'form-login p-2 border rounded-2 mb-3', 'id' => 'loginForm']) ?>
    <div class="mb-3">
        <?= form_label('Correo Electrónico', 'email', ['class' => 'form-label']) ?>
        <?= form_input([
            'type' => 'email',
            'name' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Juanp@gmail.com',
            'value' => set_value('email'),
        ]) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation) && $validation->hasError('email')) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('email')) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Contraseña', 'password', ['class' => 'form-label']) ?>
        <?= form_input([
            'type' => 'password',
            'name' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Contraseña',
            'value' => set_value('password'),
        ]) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation) && $validation->hasError('password')) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('password')) ?></div>
        <?php endif; ?>
    </div>
    <div class="login d-flex justify-content-end align-content-center">
        <a href="<?= base_url('forgot_password') ?>" class="nav-link">Recuperar contraseña</a>

    </div>

    <div class="d-flex justify-content-center mt-2">
        <?= form_submit('login_submit', 'Ingresar', ['class' => 'btn btn-primary enviar-login']) ?>
    </div>
    <?= form_close() ?>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.enviar-login').addEventListener('click', function(event) {
            event.preventDefault();
            var form = document.getElementById('loginForm');
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Iniciando sesión...",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                form.submit();
            });
        });
    });
</script>