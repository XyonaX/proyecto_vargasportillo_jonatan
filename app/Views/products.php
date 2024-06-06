<main class="min-vh-100">
    <div class="text-center container py-5"> 
        <h4 class="mt-4 mb-5"><strong>Productos</strong></h4>

        <div class="row">
            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $producto) : ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-product">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>" class="w-100 img-fluid" alt="<?= esc($producto['nombre_producto']) ?>" />
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
                            </div>
                            <div class="card-product-body d-flex flex-column justify-content-center align-items-center">
                                <h5 class="card-title mb-3 text-white"><?= esc($producto['nombre_producto']) ?></h5>
                                <p class="text-white"><?= esc($producto['desc_producto']) ?></p>
                                <h6 class="mb-3 text-success">$<?= esc($producto['precio_producto']) ?></h6>
                                <div class="d-flex justify-content-between">

                                </div>
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

</main>