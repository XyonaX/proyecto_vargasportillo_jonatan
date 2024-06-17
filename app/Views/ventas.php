<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column animate__animated animate__fadeInDown">
<div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Listado de <b>Ventas</b></h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID Venta</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Fecha de Venta</th>
                            <th class="text-center">Ver Detalle</th>
                            <th class="text-center">Imprimir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ventas) && is_array($ventas)) : ?>
                            <?php foreach ($ventas as $venta) : ?>
                                <tr>
                                    <td class="text-center"><?= esc($venta['venta_id']) ?></td>
                                    <td class="text-center"><?= esc($venta['usuario_nombre']) ?></td>
                                    <td class="text-center"><?= esc($venta['venta_fecha']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('ventas/factura/' . $venta['venta_id']) ?>" class="btn btn-info text-white">Ver Detalle</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('ventas/factura/' . $venta['venta_id']) ?>" class="btn btn-info d-flex text-white">Imprimir <i class="bi bi-printer-fill ms-2"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay ventas disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b><?= is_array($ventas) ? count($ventas) : 0 ?></b> out of <b><?= $pager->getTotal() ?></b> entries</div>
                    <?= $pager->links('default', 'custom_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</main>
