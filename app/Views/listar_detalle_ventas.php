
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        font-family: Arial, sans-serif;
        background-color: white;
        color: black;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header img {
        max-width: 150px;
        margin-bottom: 10px;
    }

    .client-info,
    .purchase-details {
        margin-bottom: 20px;
    }

    .purchase-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .purchase-details th,
    .purchase-details td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .total {
        text-align: right;
    }
</style>



<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column animate__animated animate__fadeInDown">

    <div class="container container-fluid my-4">
        <div class="header">
            <img src="<?= base_url('assets/images/brand.webp') ?>" alt="Logo">

            <h4>Factura #<?= esc($venta['venta_id']) ?></h4>
            <p><strong>Fecha:</strong> <?= esc($venta['venta_fecha']) ?></p>
        </div>

        <div class="client-info">
            <p class="fs-5 fw-bold">Datos del cliente</p>
            <?php if ($usuario) : ?>
                <p><strong>Nombre:</strong> <?= esc($usuario['usuario_nombre'] . ' ' . $usuario['usuario_apellido']) ?></p>
                <p><strong>Email:</strong> <?= esc($usuario['usuario_email']) ?></p>
            <?php else : ?>
                <p><em>Datos del cliente no encontrados</em></p>
            <?php endif; ?>
        </div>

        <div class="purchase-details">
            <h3>Detalles de la Compra</h3>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio por Unidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalleVenta as $detalle) : ?>
                        <tr>
                            <td><?= esc($detalle['nombre_producto']) ?></td>
                            <td><?= esc($detalle['detalle_cantidad']) ?></td>
                            <td>$<?= number_format($detalle['detalle_precio'], 2) ?></td>
                            <td>$<?= number_format($detalle['detalle_cantidad'] * $detalle['detalle_precio'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="total">
            <p class="fs-5 fw-bold">Total a pagar: $<?= number_format($total_venta, 2) ?></p>
        </div>
    </div>
</main>