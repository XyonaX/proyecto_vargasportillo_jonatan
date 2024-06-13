<?php $cart = \Config\Services::cart(); ?>

<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <div class="container-fluid">
        <h2 class="text-center">Carrito de compras</h2>
        <div class="row">
            <?php if ($cart->contents() == NULL) { ?>
                <h2 class="text-center alert-danger">Carrito está vacío</h2>
            <?php } else { ?>
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
                        foreach ($cart->contents() as $item) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= esc($item['name']) ?></td>
                                <td><?= esc($item['price']) ?></td>
                                <td><?= esc($item['qty']) ?></td>
                                <td><?= esc($item['subtotal']);
                                    $total += $item['subtotal'] ?></td>
                                <td><?= anchor('/remove_item/' . $item['rowid'], 'Eliminar',['class' => 'btn btn-danger text-white']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4">Total Compra: $<?= esc($total) ?></td>
                            <td><?= anchor('/delete_cart','Vaciar Carrito', ['class' => 'btn btn-danger text-white']) ;?></td>
                            <td><a href="ventas" class="btn btn-success text-white" role="button">Ordenar Compra</a></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</main>
