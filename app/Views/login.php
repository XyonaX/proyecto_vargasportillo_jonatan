<main class="login-section min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    

    <div class="modal-dialog text-center">
    <?php elseif (session()->getFlashdata('err')) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= session()->getFlashdata('err') ?>
        </div>
    <?php endif; ?>
        <div class="col-sm-8 main-section d-flex justify-content-center">
            
            <div class="modal-content">
                
                <div class="col-12 user-img text-center">
                    <img src="https://i.ibb.co/C0z9mg3/face.jpg" alt="profile photo" />
                </div>
                <?= form_open('login', ['class' => 'form-login p-2 border rounded-2 mb-3 login-form-group mb-3', 'id' => 'loginForm']) ?>
                    <div class="form-group mb-3">
                        <?= form_input([
                            'type' => 'email',
                            'name' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'Correo Electrónico',
                            'value' => set_value('email'),
                        ]) ?>
                        <!-- Mostrar mensaje de error -->
                        <?php if (isset($validation) && $validation->hasError('email')) : ?>
                            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation->getError('email')) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
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
                    <button type="submit" id="button" class="btn-ux btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Ingresar
                    </button>
                <?= form_close() ?>
                <div class="col-12 forgot text-center">
                    <a href="<?= base_url('forgot_password') ?>">Recuperar contraseña</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btn.btn-primary').addEventListener('click', function(event) {
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
