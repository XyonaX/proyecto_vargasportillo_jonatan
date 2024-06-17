<!-- app/Views/forgot_password.php -->
<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <div class="form-reset p-2 border rounded-2 mb-3">
        <h2 class="text-center mb-4">Recuperar Contraseña</h2>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php elseif (session()->getFlashdata('err')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('err') ?>
            </div>
        <?php endif; ?>

        <?= form_open(base_url('forgot_password'), ['class' => 'forgot-password-form']) ?>
            <div class="mb-3">
                <?= form_label('Correo Electrónico', 'email', ['class' => 'form-label']) ?>
                <?= form_input([
                    'type' => 'email',
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'form-control',
                    'placeholder' => 'Correo Electrónico',
                    'value' => set_value('email'),
                    'required' => 'required'
                ]) ?>
                <!-- Mostrar mensaje de error -->
                <?php if (isset($validation) && $validation->hasError('email')) : ?>
                    <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('email')) ?></div>
                <?php endif; ?>
            </div>
            <div class="d-grid">
                <?= form_submit('forgot_password_submit', 'Enviar Instrucciones', ['class' => 'btn btn-primary']) ?>
            </div>
        <?= form_close() ?>
    </div>
</main>
