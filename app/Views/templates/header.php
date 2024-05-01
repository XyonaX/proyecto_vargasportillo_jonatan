<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?></title>
    <link rel="icon" href="assets/images/icon.webp" type="image/x-icon">
    <link href="<?php base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/miestilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="">

    <div id="loading" class="loader"></div>

    <section id="content" style="display: none;" class="container-fluid">
        <header class="conteiner-fluid">
            <div class="row">
                <div class="col">
                    <div class="col col-sm-12 col-lg-12">
                        <nav class="container-fluid navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="<?php echo base_url('/') ?>"><img class="img-fluid" src="assets/images/brand.webp" alt="brand"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon "></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end text-center me-1 " id="navbarTogglerDemo02">
                                    <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/')) ? 'active' : ''; ?>" href="<?php echo base_url('/') ?>">Incio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/about')) ? 'active' : ''; ?>" href="<?php echo base_url('/about'); ?>">Nosotros</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/contact')) ? 'active' : ''; ?>" href="<?php echo base_url('/contact'); ?>">Contacto</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/store')) ? 'active' : ''; ?>" href="<?php echo base_url('/store'); ?>">Comercializacion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/terms')) ? 'active' : ''; ?>" href="<?php echo base_url('/terms'); ?>">Terms&Usos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/login')) ? 'active' : ''; ?>" href="<?php echo base_url('/login'); ?>">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (current_url() == base_url('/register')) ? 'active' : ''; ?>" href="<?php echo base_url('/register'); ?>">Registro</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>