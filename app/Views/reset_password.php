<!-- app/Views/reset_password.php -->
<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <div class="form-reset p-2 border rounded-2 mb-3">
        <h2 class="text-center mb-4">Restablecer Contraseña</h2>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php elseif (session()->getFlashdata('err')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('err') ?>
            </div>
        <?php endif; ?>

        <?= form_open(base_url('reset_password_process'), ['class' => 'reset-password-form']) ?>
            <div class="mb-3">
                <?= form_label('Nueva Contraseña', 'new_password', ['class' => 'form-label']) ?>
                <?= form_input([
                    'type' => 'password',
                    'name' => 'new_password',
                    'id' => 'new_password',
                    'class' => 'form-control',
                    'placeholder' => 'Nueva Contraseña',
                    'required' => 'required'
                ]) ?>
                <?php if (isset($validation) && $validation->hasError('new_password')) : ?>
                    <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('new_password')) ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <?= form_label('Confirmar Contraseña', 'confirm_password', ['class' => 'form-label']) ?>
                <?= form_input([
                    'type' => 'password',
                    'name' => 'confirm_password',
                    'id' => 'confirm_password',
                    'class' => 'form-control',
                    'placeholder' => 'Confirmar Contraseña',
                    'required' => 'required'
                ]) ?>
                <?php if (isset($validation) && $validation->hasError('confirm_password')) : ?>
                    <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('confirm_password')) ?></div>
                <?php endif; ?>
            </div>
            <?= form_hidden('reset_token', $reset_token) ?>
            <div class="d-grid">
                <?= form_submit('reset_password_submit', 'Restablecer Contraseña', ['class' => 'btn btn-primary']) ?>
            </div>
        <?= form_close() ?>
    </div>
</main>
