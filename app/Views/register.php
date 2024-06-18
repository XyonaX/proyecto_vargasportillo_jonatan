<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?= form_open('register', ['class' => 'form-login p-2 border rounded-2 mb-3']) ?>
    <div class="mb-3">
        <?= form_label('Nombre', 'nombre', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Juan Doe', 'value' => set_value('nombre')]) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['nombre'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['nombre']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Apellido', 'apellido', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'apellido', 'class' => 'form-control', 'placeholder' => 'Ramirez', 'value' => set_value('apellido')]) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['apellido'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['apellido']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Direccion de domicilio', 'direccion', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'direccion', 'class' => 'form-control', 'placeholder' => 'Calle siempre viva 123', 'value' => set_value('direccion')]) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['direccion'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['direccion']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Correo Electronico', 'email', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'Juanp@gmail.com', 'value' => set_value('email')]) ?>
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
    <div class="mb-3">
        <?= form_label('Ingrese su contraseña nuevamente', 're-password', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'password', 'name' => 're-password', 'class' => 'form-control', 'placeholder' => 'Contraseña']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['re-password'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['re-password']) ?></div>
        <?php endif; ?>
    </div>
    <div class="login d-flex justify-content-end align-content-center">
        <a href="login" class="nav-link">¿Ya tienes una cuenta?</a>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <?= form_submit('submit-registro', 'Registrarse', ['class' => 'btn btn-primary enviar-registro']) ?>
    </div>
    <?= form_close() ?>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.enviar-registro').addEventListener('click', function(event) {
            event.preventDefault();
            var form = this.closest('form');
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Regsitrando...",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                form.submit();
            });
        });
    });
</script>