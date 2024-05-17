<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?= form_open('login', ['class' => 'form-login p-2 border rounded-2 mb-3']) ?>
    <div class="mb-3">
        <?= form_label('Correo Electronico', 'email', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'Juanp@gmail.com']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['email'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['email']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Contraseña', 'password', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['password'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['password']) ?></div>
        <?php endif; ?>
    </div>
    <div class="login d-flex justify-content-end align-content-center">
        <a href="" class="nav-link">Recuperar contraseña</a>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <?= form_submit('submit', 'Ingresar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?= form_close() ?>
</main>