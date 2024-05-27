<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProduct">
                            <span class="d-flex justify-content-center align-items-center"><i class="bi bi-plus-circle-fill text-success"></i> Agregar Producto</span>
                        </button>
                        <button class="btn btn-danger d-flex justify-content-center align-items-center" data-bs-toggle="modal">
                            <span class="d-flex justify-content-center align-items-center"><i class="bi bi-trash-fill  text-danger"></i>Eliminar</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Nombre del producto</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Activo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)) : ?>
                            <?php foreach ($productos as $producto) : ?>
                                <tr>
                                    <td class="text-center"><?= isset($producto['nombre_categoria']) ? esc($producto['nombre_categoria']) : '' ?></td>
                                    <td class="text-center"><?= isset($producto['nombre_producto']) ? esc($producto['nombre_producto']) : '' ?></td>
                                    <td class="text-center"><?= isset($producto['desc_producto']) ? esc($producto['desc_producto']) : '' ?></td>
                                    <td class="text-center"><?= isset($producto['precio_producto']) ? esc($producto['precio_producto']) : '' ?></td>
                                    <td class="text-center"><?= isset($producto['cantidad_producto']) ? esc($producto['cantidad_producto']) : '' ?></td>
                                    <td class="text-center">
                                        <?php if (isset($producto['nombre_imagen'])) : ?>
                                            <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>" alt="<?= esc($producto['nombre_producto']) ?>" width="50">
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?= isset($producto['activo']) ? ($producto['activo'] ? 'Sí' : 'No') : '' ?></td>
                                    <td class="">
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-warning edit text-warning bg-black" data-bs-toggle="modal"><i class="bi bi-pencil-square" data-bs-toggle="tooltip" title="Edit"></i></button>
                                            <button class="btn btn-danger delete text-danger bg-black" data-bs-toggle="modal"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" title="Delete"></i></button>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="9" class="text-center">No hay productos disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="clearfix">

                    <div class="hint-text">Showing <b><?= count($productos) ?></b> out of <b><?= $pager->getTotal() ?></b> entries</div>
                    <?= $pager->links('default', 'custom_pagination') ?>
                    <!-- <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end align-content-center">
                            <?= $pager->links() ?>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="newProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newProductLabel">Agregar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('gestionProductos', ['class' => 'p-2 border rounded-2 mb-3']) ?>
                <div class="mb-3 form-group">
                    <?= form_label('Nombre del Producto', 'nombre', ['class' => 'form-label']) ?>
                    <?= form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control rounded-2', 'value' => set_value('nombre'), 'required' => 'required']) ?>
                    <?php if (isset($validation['nombre'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['nombre'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Descripción', 'descripcion', ['class' => 'form-label']) ?>
                    <?= form_textarea(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control rounded-2', 'rows' => '3', 'value' => set_value('descripcion'), 'required' => 'required']) ?>
                    <?php if (isset($validation['descripcion'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['descripcion'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Precio', 'precio', ['class' => 'form-label']) ?>
                    <?= form_input(['type' => 'number', 'name' => 'precio', 'id' => 'precio', 'class' => 'form-control rounded-2', 'value' => set_value('precio'), 'required' => 'required']) ?>
                    <?php if (isset($validation['precio'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['precio'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Cantidad', 'cantidad', ['class' => 'form-label']) ?>
                    <?= form_input(['type' => 'number', 'name' => 'cantidad', 'id' => 'cantidad', 'class' => 'form-control rounded-2', 'value' => set_value('cantidad'), 'required' => 'required']) ?>
                    <?php if (isset($validation['cantidad'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['cantidad'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Seleccione una Imagen', 'imagen', ['class' => 'form-label']) ?>
                    <?= form_input(['type' => 'file', 'name' => 'imagen', 'id' => 'imagen', 'class' => 'form-control rounded-2', 'value' => set_value('imagen')]) ?>
                    <?php if (isset($validation['imagen'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['imagen'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <label for="categoria">Categoría</label>
                    <?php
                    $lista['0'] = 'Seleccione categoría';
                    foreach ($categorias as $row) {
                        $categoria_id = $row['id_categoria'];
                        $categoria_desc = $row['nombre'];
                        $lista[$categoria_id] = $categoria_desc;
                    }
                    echo form_dropdown('categoria', $lista, '0', 'class="form-control" id="categoria" required');
                    ?>
                    <?php if (isset($validation['categoria'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['categoria'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <?= form_submit('submit', 'Agregar Producto', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>