<main class="min-vh-100">
    <section class="contact-section animate__animated animate__fadeIn">
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Información de Contacto</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 mb-4 text-center text-md-start">
                            <h4>Datos Corporativos</h4>
                            <p><strong>Titular de la Empresa:</strong> Juan Pérez</p>
                            <p><strong>Razón Social:</strong> UnnePhones S.A.</p>
                            <p><strong>Domicilio Legal:</strong> Av. 3 de Abril 1234, Corrientes, Argentina</p>
                            <p><strong>Teléfono:</strong> +54 11 1234-5678</p>
                            <p><strong>Email:</strong> contacto@unnephones.com.ar</p>
                        </div>
                        <div class="col-md-6 mb-4 text-center text-md-start">
                            <h4>Otros medios de contacto</h4>
                            <p><strong>Sitio Web:</strong> <a class="links" href="http://www.unnephones.com.ar">www.unnephones.com.ar</a></p>
                            <div class="gap-2">
                                <a class="text-white me-2" href=""><i class="bi bi-facebook"></i></a>
                                <a class="text-white me-2" href=""><i class="bi bi-instagram"></i></a>
                                <a class="text-white me-2" href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">


                    <?php if(session('message')): ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?= session('message') ?>
                        </div>
                    <?php endif; ?>

                    <?= form_open('contact', ['class' => 'p-2 border rounded-2 mb-3']) ?>
                    <div class="mb-3">
                        <?= form_label('Nombre Completo', 'nombre', ['class' => 'form-label']) ?>
                        <?= form_input(['type' => 'text','name' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Juan Perez', 'maxlength' => '150', 'value' => set_value('nombre')]) ?>
                        <!-- Mostrar mensaje de error -->
                        <?php if (isset($validation['nombre'])) : ?>
                            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['nombre']) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <?= form_label('Correo Electronico', 'email', ['class' => 'form-label']) ?>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'Juanp@gmail.com' ,'value' => set_value('email')]) ?>
                        <!-- Mostrar mensaje de error -->
                        <?php if (isset($validation['email'])) : ?>
                            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['email']) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <?= form_label('Ingrese su consulta', 'consulta', ['class' => 'form-label']) ?>
                        <?php if (isset($validation['consulta'])) : ?>
                            <div class="alert alert-danger mt-1" role="alert"><?= esc($validation['consulta']) ?></div>
                        <?php endif; ?>
                        <?= form_textarea(['type' => 'text','name' => 'consulta', 'class' => 'form-control', 'rows' => '8', 'placeholder' => 'Necesito consultar los precios...',
                        'maxlength' => '250', 'minlength' => '10', 'value' => set_value('consulta')]) ?>
                        <!-- Mostrar mensaje de error -->
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        <?= form_submit('submit', 'Enviar', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= form_close() ?>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mapa">
                        <iframe class="" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5374.581487886152!2d-58.84789644130185!3d-27.476678967893516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1713272692862!5m2!1ses!2sar" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>