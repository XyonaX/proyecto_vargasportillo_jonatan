<main class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6  d-flex justify-content-center align-align-items-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProduct">
                            <span class="d-flex justify-content-center align-items-center"><i class="bi bi-plus-circle-fill"></i>Agregar Producto</span>
                        </button>
                        <a href="#deleteProductModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Categoría</th>
                        <th>Nombre del producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí debes poner el loop para mostrar los productos -->
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
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
                    <?= form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control rounded-2', 'value' => set_value('nombre'),'required' => 'required']) ?>
                    <?php if (isset($validation['nombre'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['nombre'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Descripción', 'descripcion', ['class' => 'form-label']) ?>
                    <?= form_textarea(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control rounded-2', 'rows' => '3', 'value' => set_value('descripcion'),'required' => 'required']) ?>
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
                    <?= form_input(['type' => 'number', 'name' => 'cantidad', 'id' => 'cantidad', 'class' => 'form-control rounded-2', 'value' => set_value('cantidad'),'required' => 'required']) ?>
                    <?php if (isset($validation['cantidad'])) : ?>
                        <div class="alert alert-danger mt-1" role="alert"><?= $validation['cantidad'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-group">
                    <?= form_label('Seleccione una Imagen', 'imagen', ['class' => 'form-label']) ?>
                    <?= form_input(['type' => 'file','name' => 'imagen', 'id' => 'imagen', 'class' => 'form-control rounded-2','value' => set_value('imagen')]) ?>
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
                    <?= form_submit('submit', 'Guardar cambios', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>