<main class="min-vh-100 d-flex justify-content-center align-items-center">
    <?= form_open('registro', ['class' => 'form-login p-2 border rounded-2 mb-3']) ?>
    <div class="mb-3">
        <?= form_label('Nombre', 'nombre', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Juan Doe']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['nombre'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['nombre']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Apellido', 'apellido', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'apellido', 'class' => 'form-control', 'placeholder' => 'Ramirez']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['apellido'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['apellido']) ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <?= form_label('Direccion de domicilio', 'address', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'text', 'name' => 'address', 'class' => 'form-control', 'placeholder' => 'Calle siempre viva 123']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['address'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['address']) ?></div>
        <?php endif; ?>
    </div>
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
    <div class="mb-3">
        <?= form_label('Ingrese su contraseña nuevamente', 're-password', ['class' => 'form-label']) ?>
        <?= form_input(['type' => 'password', 'name' => 're-password', 'class' => 'form-control', 'placeholder' => 'Contraseña']) ?>
        <!-- Mostrar mensaje de error -->
        <?php if (isset($validation['re-password'])) : ?>
            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['re-password']) ?></div>
        <?php endif; ?>
    </div>
    <div class="login d-flex justify-content-end align-content-center">
        <a href="" class="nav-link">¿Ya tienes una cuenta?</a>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <?= form_submit('submit', 'Registrarse', ['class' => 'btn btn-primary']) ?>
    </div>
    <?= form_close() ?>
</main>