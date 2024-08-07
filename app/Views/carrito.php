<?php $cart = \Config\Services::cart(); ?>

<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column animate__animated animate__fadeInDown">
    <div class="container-fluid d-flex flex-column text-center">
        <h2 class="text-center">Carrito de compras</h2>
        <div class="row">
            <?php if (session('err')) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?= session('err') ?>
                </div>
            <?php endif; ?>
            <?php if (session('success')) : ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <?php if (empty($cart_contents)) { ?>
                <h2 class="text-center alert-danger">Carrito está vacío</h2>
            <?php } else { ?>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N° item</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $i = 1;
                            foreach ($cart_contents as $item) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= esc($item['name']) ?></td>
                                    <td><?= esc($item['price']) ?></td>
                                    <td><?= esc($item['qty']) ?></td>
                                    <td><?= esc($item['subtotal']);
                                        $total += $item['subtotal'] ?></td>
                                    <td><?= anchor('/remove_item/' . $item['rowid'], 'Eliminar', ['class' => 'btn btn-danger text-white eliminar-item']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Total Compra: $<?= esc($total) ?></td>
                                <td><?= anchor('/delete_cart', 'Vaciar Carrito', ['class' => 'btn btn-danger text-white vaciar-carrito']); ?></td>
                                <td><a href="ventas" class="btn btn-success text-white ordenar-compra" role="button">Ordenar Compra</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
        <div>
            <a class="btn btn-primary" href="products">Seguir Comprando</a>
        </div>
    </div>
</main>

<script>
    // Eliminar item con confirmación
    document.querySelectorAll('.eliminar-item').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            var href = this.getAttribute('href');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#047342',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });

    // Vaciar carrito con confirmación
    document.querySelector('.vaciar-carrito').addEventListener('click', function(event) {
        event.preventDefault();
        var href = this.getAttribute('href');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Todo el carrito será eliminado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#047342',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, vaciar carrito!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });

    document.querySelector('.ordenar-compra').addEventListener('click', function(event) {
        event.preventDefault();
        var href = this.getAttribute('href');
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Compra Realizada",
            showConfirmButton: true,
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });
</script>