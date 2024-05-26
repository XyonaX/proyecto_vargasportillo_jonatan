<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?></title>
    <link rel="icon" href="assets/images/icon.webp" type="image/x-icon">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/miestilo.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="">
    <div id="loading" class="loader"></div>
    <section id="content" style="display: none;" class="container-fluid">
        <header class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="col col-sm-12 col-lg-12">
                        <nav class="container-fluid navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="<?php echo base_url('/') ?>">
                                    <img class="img-fluid" src="assets/images/brand.webp" alt="brand" style="height: 50px;">
                                </a>
                                <?php if (isset($isLoggedIn) && $isLoggedIn) : ?>

                                    <div class="gap-2 d-flex justify-content-end align-items-end">
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse-user">
                                            <button class="user-btn btn btn-dark dropdown-toggle d-lg-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="assets/images/person-icon.svg" class="img-fluid" alt="">
                                                <span><?= esc($usuario_nombre) ?></span>
                                            </button>

                                            <?php if (isset($rol_id) && $rol_id === '1') : ?>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto  <?php echo (current_url() == base_url('/gestionProductos')) ? 'active' : ''; ?>" href="<?php echo base_url('/gestionProductos'); ?>">Gestionar Productos</a></li>
                                                    <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto " href="<?php echo base_url('/logout'); ?>"><svg class="logo-salir" alt="cerrar sesión" width="24" height="24" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 4.354v6.651l7.442-.001L17.72 9.28a.75.75 0 0 1-.073-.976l.073-.084a.75.75 0 0 1 .976-.073l.084.073 2.997 2.997a.75.75 0 0 1 .073.976l-.073.084-2.996 3.004a.75.75 0 0 1-1.134-.975l.072-.085 1.713-1.717-7.431.001L12 19.25a.75.75 0 0 1-.88.739l-8.5-1.502A.75.75 0 0 1 2 17.75V5.75a.75.75 0 0 1 .628-.74l8.5-1.396a.75.75 0 0 1 .872.74ZM8.502 11.5a1.002 1.002 0 1 0 0 2.004 1.002 1.002 0 0 0 0-2.004Z" fill="#212121" />
                                                                <path d="M13 18.501h.765l.102-.006a.75.75 0 0 0 .648-.745l-.007-4.25H13v5.001ZM13.002 10 13 8.725V5h.745a.75.75 0 0 1 .743.647l.007.102.007 4.251h-1.5Z" fill="#212121" />
                                                            </svg></a></li>
                                                </ul>
                                            <?php else : ?>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto " href="<?php echo base_url('/logout'); ?>"><svg class="logo-salir" alt="cerrar sesión" width="24" height="24" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 4.354v6.651l7.442-.001L17.72 9.28a.75.75 0 0 1-.073-.976l.073-.084a.75.75 0 0 1 .976-.073l.084.073 2.997 2.997a.75.75 0 0 1 .073.976l-.073.084-2.996 3.004a.75.75 0 0 1-1.134-.975l.072-.085 1.713-1.717-7.431.001L12 19.25a.75.75 0 0 1-.88.739l-8.5-1.502A.75.75 0 0 1 2 17.75V5.75a.75.75 0 0 1 .628-.74l8.5-1.396a.75.75 0 0 1 .872.74ZM8.502 11.5a1.002 1.002 0 1 0 0 2.004 1.002 1.002 0 0 0 0-2.004Z" fill="#212121" />
                                                                <path d="M13 18.501h.765l.102-.006a.75.75 0 0 0 .648-.745l-.007-4.25H13v5.001ZM13.002 10 13 8.725V5h.745a.75.75 0 0 1 .743.647l.007.102.007 4.251h-1.5Z" fill="#212121" />
                                                            </svg></a></li>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse mx-auto text-center justify-content-end" id="navbarTogglerDemo02">
                                        <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/')) ? 'active' : ''; ?>" href="<?php echo base_url('/') ?>">Inicio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/about')) ? 'active' : ''; ?>" href="<?php echo base_url('/about'); ?>">Nosotros</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/contact')) ? 'active' : ''; ?>" href="<?php echo base_url('/contact'); ?>">Contacto</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/products')) ? 'active' : ''; ?>" href="<?php echo base_url('/products'); ?>">Productos</a>
                                            </li>
                                            <li class="nav-item">
                                                <ul class="navbar-nav">
                                                    <div class="collapse-user">
                                                        <li class="nav-item dropdown">
                                                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                                <ul class="navbar-nav">
                                                                    <li class="nav-item dropdown">
                                                                        <button class="user-btn btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <img src="assets/images/person-icon.svg" class="img-fluid" alt="">
                                                                            <span><?= esc($usuario_nombre) ?></span>
                                                                        </button>
                                                                        <?php if (isset($rol_id) && $rol_id === '1') : ?>
                                                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                                                <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto <?php echo (current_url() == base_url('/gestionProductos')) ? 'active' : ''; ?>" href="<?php echo base_url('/gestionProductos'); ?>">Gestionar Productos</a></li>
                                                                                <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto" href="<?php echo base_url('/logout'); ?>"><svg class="logo-salir" alt="cerrar sesión" width="24" height="24" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M12 4.354v6.651l7.442-.001L17.72 9.28a.75.75 0 0 1-.073-.976l.073-.084a.75.75 0 0 1 .976-.073l.084.073 2.997 2.997a.75.75 0 0 1 .073.976l-.073.084-2.996 3.004a.75.75 0 0 1-1.134-.975l.072-.085 1.713-1.717-7.431.001L12 19.25a.75.75 0 0 1-.88.739l-8.5-1.502A.75.75 0 0 1 2 17.75V5.75a.75.75 0 0 1 .628-.74l8.5-1.396a.75.75 0 0 1 .872.74ZM8.502 11.5a1.002 1.002 0 1 0 0 2.004 1.002 1.002 0 0 0 0-2.004Z" fill="#212121" />
                                                                                            <path d="M13 18.501h.765l.102-.006a.75.75 0 0 0 .648-.745l-.007-4.25H13v5.001ZM13.002 10 13 8.725V5h.745a.75.75 0 0 1 .743.647l.007.102.007 4.251h-1.5Z" fill="#212121" />
                                                                                        </svg></a></li>
                                                                            </ul>
                                                                        <?php else : ?>
                                                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                                                <li><a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto" href="<?php echo base_url('/logout'); ?>"><svg class="logo-salir" alt="cerrar sesión" width="24" height="24" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M12 4.354v6.651l7.442-.001L17.72 9.28a.75.75 0 0 1-.073-.976l.073-.084a.75.75 0 0 1 .976-.073l.084.073 2.997 2.997a.75.75 0 0 1 .073.976l-.073.084-2.996 3.004a.75.75 0 0 1-1.134-.975l.072-.085 1.713-1.717-7.431.001L12 19.25a.75.75 0 0 1-.88.739l-8.5-1.502A.75.75 0 0 1 2 17.75V5.75a.75.75 0 0 1 .628-.74l8.5-1.396a.75.75 0 0 1 .872.74ZM8.502 11.5a1.002 1.002 0 1 0 0 2.004 1.002 1.002 0 0 0 0-2.004Z" fill="#212121" />
                                                                                            <path d="M13 18.501h.765l.102-.006a.75.75 0 0 0 .648-.745l-.007-4.25H13v5.001ZM13.002 10 13 8.725V5h.745a.75.75 0 0 1 .743.647l.007.102.007 4.251h-1.5Z" fill="#212121" />
                                                                                        </svg></a></li>
                                                                            </ul>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                <?php else : ?>
                                    <div class="gap-2 d-flex justify-content-end align-items-end">
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse-user">
                                            <button class="user-btn btn btn-dark dropdown-toggle d-lg-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="assets/images/person-icon.svg" class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li class="nav-item">
                                                    <a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto <?php echo (current_url() == base_url('/login')) ? 'active' : ''; ?>" href="<?php echo base_url('/login'); ?>">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto <?php echo (current_url() == base_url('/register')) ? 'active' : ''; ?>" href="<?php echo base_url('/register'); ?>">Registro</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse text-center justify-content-end" id="navbarTogglerDemo02">
                                        <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/')) ? 'active' : ''; ?>" href="<?php echo base_url('/') ?>">Inicio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/about')) ? 'active' : ''; ?>" href="<?php echo base_url('/about'); ?>">Nosotros</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/contact')) ? 'active' : ''; ?>" href="<?php echo base_url('/contact'); ?>">Contacto</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo (current_url() == base_url('/products')) ? 'active' : ''; ?>" href="<?php echo base_url('/products'); ?>">Productos</a>
                                            </li>
                                            <ul class="navbar-nav d-none d-lg-block">
                                                <div class="collapse-user">
                                                    <li class="nav-item dropdown">
                                                        <button class="user-btn btn btn-dark dropdown-toggle ms-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <img src="assets/images/person-icon.svg" class="img-fluid" alt="">
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-dark">
                                                            <li class="nav-item">
                                                                <a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto <?php echo (current_url() == base_url('/login')) ? 'active' : ''; ?>" href="<?php echo base_url('/login'); ?>">Login</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link dropdown-item text-center mb-2 mx-2 w-auto <?php echo (current_url() == base_url('/register')) ? 'active' : ''; ?>" href="<?php echo base_url('/register'); ?>">Registro</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </div>
                                            </ul>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>