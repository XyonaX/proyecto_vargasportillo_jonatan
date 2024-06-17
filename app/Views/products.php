<main class="min-vh-100 animate__animated animate__fadeIn">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>Productos</strong></h4>

        <div class="row">
            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $producto) : ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-product">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>" class="w-100 img-fluid" alt="<?= esc($producto['nombre_producto']) ?>" />
                                <div class="d-flex">
                                    <a href="#!">
                                        <div class="mask">
                                            <div class="d-flex justify-content-start align-items-end h-100">
                                                <h5><span class="badge bg-primary ms-2"><?= esc($producto['nombre_categoria']) ?></span></h5>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                    <a href="#!">
                                        <div class="mask">
                                            <div class="d-flex justify-content-start align-items-end h-100">
                                                <h5><span class="badge bg-success ms-2">Stock: <?= esc($producto['cantidad_producto']) ?></span></h5>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-product-body d-flex flex-column justify-content-center align-items-center">
                                <h5 class="card-title mb-3 text-white"><?= esc($producto['nombre_producto']) ?></h5>
                                <p class="text-white"><?= esc($producto['desc_producto']) ?></p>
                                <h6 class="mb-3">$<?= esc($producto['precio_producto']) ?></h6>
                                <?php if (isset($isLoggedIn) && $isLoggedIn) : ?>
                                    <?= form_open('add_carrito') ?>
                                    <?= form_hidden('id', $producto['id_producto']) ?>
                                    <?= form_hidden('name', $producto['nombre_producto']) ?>
                                    <?= form_hidden('precio', $producto['precio_producto']) ?>
                                    <?= form_submit('comprar', 'Comprar', "class='btn btn-success my-2 agregar-al-carrito'") ?>
                                    <?= form_close() ?>
                                <?php else : ?>
                                    <div class="d-flex justify-content-between my-2">
                                        <a href="login" class="btn btn-success iniciar-sesion">Comprar</a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No hay productos disponibles
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Paginación -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?= $pager->links('default', 'custom_pagination') ?>
            </div>
        </div>
    </div>
</main>

<script>
    document.querySelectorAll('.agregar-al-carrito').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var form = this.closest('form');
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Producto Agregado",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                form.submit();
            });
        });
    });

    document.querySelectorAll('.iniciar-sesion').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var href = this.getAttribute('href');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debes Iniciar Sesión",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                } else {
                    window.location.href = href;
                }
            });
        });
    });
</script>