<main class="min-vh-100 animate__animated animate__fadeInDown">
<div class="container mt-5">
    <h1 class="text-center"><?= $titulo ?></h1>

    <?php if (!empty($consultas) && is_array($consultas)): ?>
        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Consulta</th>
                        <th class="text-center">Visto</th>
                        <th class="text-center">Activar/Desactivar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= esc($consulta['consultas_id']) ?></td>
                            <td><?= esc($consulta['consultas_name']) ?></td>
                            <td><?= esc($consulta['consultas_email']) ?></td>
                            <td><?= esc($consulta['consultas_question']) ?></td>
                            <td class="text-center"><?= $consulta['consultas_visto'] ? 'Sí' : 'No' ?></td>
                            <td class="text-center">
                                <form action="<?= base_url('/consultas/toggle_visto/' . $consulta['consultas_id']) ?>" method="post">
                                    <button type="submit" class="btn btn-primary">
                                        <?= $consulta['consultas_visto'] ? 'Marcar como No Visto' : 'Marcar como Visto' ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <?= $pager->links('default', 'custom_pagination') ?>
        </div>
    <?php else: ?>
        <p>No hay consultas disponibles.</p>
    <?php endif; ?>
</div>
</main>
