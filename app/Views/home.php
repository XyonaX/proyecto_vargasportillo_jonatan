<section class="hero-section d-flex flex-column align-items-center justify-content-center mt-3 container-fluid animate__animated animate__fadeIn">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6 text-center" id="button">
        <h1 class="animate__animated animate__fadeInDown">Welcome to UnnePhones</h1>
        <p class="animate__animated animate__fadeInUp">Explore the latest smartphones and cutting-edge technologies.</p>
        <a href="<?php echo base_url('/store')?>" class="btn btn-primary">Shop Now</a>
      </div>
    </div>
  </div>
  <div id="carouselExampleControls" class="carousel slide mt-4 " data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" >
        <img src="assets/images/iphone.webp" class="d-none d-sm-block mx-auto w-sm-100 img-fluid " alt="Slide 1" style="height: 600px; width: 400px !important;"> 
      </div>
      <div class="carousel-item">
        <img src="assets/images/xiaomi.webp" class="d-none d-sm-block mx-auto w-100 img-fluid" alt="Slide 2" style="height: 600px; width: 400px !important;"> 
      </div>
      <div class="carousel-item" >
        <img src="assets/images/samsung.webp" class="d-none d-sm-block mx-auto w-100 img-fluid" alt="Slide 3" style="height: 600px; width: 400px !important;"> 
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
