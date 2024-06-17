<main class="min-vh-100 animate__animated animate__fadeInDown">
    <div class="container mt-5">
        <h1 class="text-center"><?= $titulo ?></h1>

        <?php if (!empty($usuarios) && is_array($usuarios)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Activar/Desactivar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td class="text-center"><?= esc($usuario['usuario_id']) ?></td>
                                <td class="text-center"><?= esc($usuario['usuario_nombre']) ?></td>
                                <td class="text-center"><?= esc($usuario['usuario_apellido']) ?></td>
                                <td class="text-center"><?= esc($usuario['usuario_email']) ?></td>
                                <td class="text-center"><?= esc($usuario['usuario_direccion']) ?></td>
                                <td class="text-center"><?= esc($usuario['usuario_estado']) == 1 ? 'Activo' : 'Inactivo' ?></td>
                                <td class="text-center">
                                    <form action="<?= base_url('/usuarios/toggle_estado/' . $usuario['usuario_id']) ?>" method="post">
                                        <button type="submit" class="btn btn-primary toggle-estado">
                                            <?= $usuario['usuario_estado'] == 1 ? 'Desactivar' : 'Activar' ?>
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
            <p>No hay usuarios disponibles.</p>
        <?php endif; ?>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-estado').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var form = this.closest('form');
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Cambiando estado...",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    form.submit();
                });
            });
        });
    });
</script>
