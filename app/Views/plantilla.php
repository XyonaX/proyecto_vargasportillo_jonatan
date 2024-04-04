<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <header>
    <div class="conteiner-fluid">
      <div class="row">
        <div class="col w-100">
          <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">Navbar</a>
              <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end text-center me-1 " id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo base_url('Home/products') ;?>">Store</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>



  <footer class="bg-dark mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col w-100">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="social gap-2 col w-100 col-sm-6 d-flex flex-row justify-content-center">
              <p class="text-white">______________________________</p>
              <a class="text-white" href="https://google.com"><i class="bi bi-instagram"></i></a>
              <a class="text-white" href="https://google.com"><i class="bi bi-linkedin"></i></a>
              <a class="text-white" href="https://google.com"><i class="bi bi-twitter"></i></a>
              <p class="text-white">______________________________</p>
            </div>
            <div class="col col-sm-6 d-flex flex-row justify-content-center align-items-center ">
              <p class="text-white">Copyrights©2024</p>
              <p class="text-white ms-2 text-nowrap">Development by <a class="text-white text-decoration-none" href="">Vargas Jonatan</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>