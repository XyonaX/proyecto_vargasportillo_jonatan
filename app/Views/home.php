<main class="">
  <section class="hero-section d-flex flex-column align-items-center justify-content-center mt-3 container-fluid animate__animated animate__fadeIn">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center" id="button">
          <h1 class="animate__animated animate__fadeInDown">Bienvenidos a UnnePhones</h1>
          <p class="animate__animated animate__fadeInUp">Explora los ultimos smartphones y tecnologias de punta.</p>
          <a href="<?php echo base_url('/store') ?>" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div id="carouselExampleControls" class="carousel slide mt-4 d-none d-md-block" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="position-relative">
                <div class="carrousel-text d-none d-lg-block position-absolute translate-middle-y">
                  <p>Lo mejor de Samsung</p>
                  <p>con beneficios exclusivos</p>
                  <p>Hasta 12 cuotas sin interés y por tener</p>
                  <p>Conexión Total disfrutá 10% OFF extra</p>
                </div>
                <img src="assets/images/optimized-format.webp" class="mx-auto w-100 img-fluid" alt="Slide 1">
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <div class="carrousel-text d-none d-lg-block position-absolute translate-middle-y">
                  <p>Ahorrá hasta $800.000 en tu próximo</p>
                  <p>celu motorola</p>
                  <p>las rebajas que estabas esperando llegaron</p>
                  <p>no las dejes pasar!</p>
                </div>
                <img src="assets/images/optimized-format2.webp" class="mx-auto w-100 img-fluid" alt="Slide 2">
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <div class="carrousel-text d-none d-lg-block position-absolute translate-middle-y">
                  <p>Conseguí tu nuevo celu con</p>
                  <p>descuentos imperdibles</p>
                  <p>Aprovechá hasta 3 cuotas sin interés con tarjetas</p>
                  <p>y 10% OFF extra por tener Conexión Total</p>
                </div>
                <img src="assets/images/optimized-format3.webp" class="mx-auto w-100 img-fluid" alt="Slide 3">
              </div>
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
      </div>
    </div>

    <section class="featured-products my-5">
      <div class="container-fluid">
        <h2 class="text-center">Productos Destacados</h2>
        <div class="row">
          <!-- Productos -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card d-flex justify-content-center align-items-center flex-column p-1">
              <img src="assets/images/Samsung_S23_FE.webp" class="img-fluid card-img" alt="Producto 1">
              <h4 class="">Samsung s23 FE</h4>
              <p class="card-cel-text">El Samsung Galaxy S23 FE es un smartphone de alta gama con pantalla AMOLED, potente rendimiento,
                cámaras versátiles y características premium como resistencia al agua y carga inalámbrica.</p>
              <a href="#" class="btn btn-primary mt-3">Ver detalles</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card d-flex justify-content-center align-items-center flex-column p-1">
              <img src="assets/images/i_Phone_14_Starlight.webp" class="img-fluid card-img" alt="Producto 2">
              <h4>Iphone 14</h4>
              <p class="card-cel-text">El iPhone 14 es el último lanzamiento de Apple que combina un diseño elegante con un potente rendimiento.
                Con una pantalla OLED de alta calidad, cámaras mejoradas y características innovadoras, el iPhone 14 ofrece una experiencia excepcional
                para los usuarios exigentes.</p>
              <a href="#" class="btn btn-primary mb-2">Ver detalles</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card d-flex justify-content-center align-items-center flex-column p-1">
              <img src="assets/images/Samsung_Galaxy_Z_Flip5.webp" class="img-fluid card-img" alt="Producto 3">
              <h4>Samsung Z Flip5</h4>
              <p class="card-cel-text">El Samsung Z Flip 5 es un smartphone innovador que combina un diseño elegante con una funcionalidad única.
                Con su pantalla plegable, el Z Flip 5 ofrece una experiencia versátil para los usuarios.
                Con características de alta gama y un diseño premium.</p>
              <a href="#" class="btn btn-primary mb-2">Ver detalles</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <section class="features-section animate__animated animate__fadeIn">
    <div class="container-fluid mt-5">
      <h2 class="text-center my-5">Nos destacamos en:</h2>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100 ">
              <div class="row d-flex flex-column flex-lg-row no-gutters justify-content-center align-items-center">
                <div class="col-md-4">
                  <svg class='card-img img-thumbnail img-fluid d-none d-md-block ms-1 border-0 mt-1' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff-fill" viewBox="0 0 16 16">
                    <path d="M12.17 9.53c2.307-2.592 3.278-4.684 3.641-6.218.21-.887.214-1.58.16-2.065a3.6 3.6 0 0 0-.108-.563 2 2 0 0 0-.078-.23V.453c-.073-.164-.168-.234-.352-.295a2 2 0 0 0-.16-.045 4 4 0 0 0-.57-.093c-.49-.044-1.19-.03-2.08.188-1.536.374-3.618 1.343-6.161 3.604l-2.4.238h-.006a2.55 2.55 0 0 0-1.524.734L.15 7.17a.512.512 0 0 0 .433.868l1.896-.271c.28-.04.592.013.955.132.232.076.437.16.655.248l.203.083c.196.816.66 1.58 1.275 2.195.613.614 1.376 1.08 2.191 1.277l.082.202c.089.218.173.424.249.657.118.363.172.676.132.956l-.271 1.9a.512.512 0 0 0 .867.433l2.382-2.386c.41-.41.668-.949.732-1.526zm.11-3.699c-.797.8-1.93.961-2.528.362-.598-.6-.436-1.733.361-2.532.798-.799 1.93-.96 2.528-.361s.437 1.732-.36 2.531Z" />
                    <path d="M5.205 10.787a7.6 7.6 0 0 0 1.804 1.352c-1.118 1.007-4.929 2.028-5.054 1.903-.126-.127.737-4.189 1.839-5.18.346.69.837 1.35 1.411 1.925" />
                  </svg>
                </div>
                <div class="col-md-8">
                  <div class="d-flex flex-column justify-content-center">
                    <h5 class="card-title text-center">Tecnología de Vanguardia</h5>
                    <p class="card-text mt-2 text-center">Explora dispositivos con las últimas innovaciones tecnológicas del mercado</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 ">
              <div class="row d-flex flex-column flex-lg-row no-gutters justify-content-center align-items-center ">
                <div class="col-md-4">
                  <svg class="card-img img-thumbnail img-fluid d-none d-md-block ms-1 border-0 mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                    <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68zm.11-3.699c-.797.8-1.93.961-2.528.362-.598-.6-.436-1.733.361-2.532.798-.799 1.93-.96 2.528-.361s.437 1.732-.36 2.531Z" />
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z" />
                  </svg>
                </div>
                <div class="col-md-8">
                  <div class="d-flex flex-column justify-content-center">
                    <h5 class="card-title text-center">Exclusividad</h5>
                    <p class="card-text mt-2 text-center">Encuentra modelos exclusivos disponibles y a buen precio solo en UnnePhones</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 ">
              <div class="row d-flex flex-column flex-lg-row no-gutters justify-content-center align-items-center">
                <div class="col-md-4">
                  <svg class='card-img img-thumbnail img-fluid d-none d-md-block ms-1 border-0 mt-1' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                  </svg>
                </div>
                <div class="col-md-8">
                  <div class="d-flex flex-column justify-content-center">
                    <h5 class="card-title text-center">Ofertas Especiales</h5>
                    <p class="card-text mt-2 text-center">Aprovecha promociones y descuentos únicos para nuestros clientes</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="testimonials animate__animated animate__backInLeft">
    <div class="container-fluid py-5">
      <h2 class="text-center mb-5">Testimonio de Clientes</h2>
      <div class="row">
        <div class="col-lg-4 mb-1">
          <div class="card text-center">
            <div class="card-body ">
              <blockquote class="blockquote mb-0">
                <p class="text-wrap">Excelente servicio, mi pedido llegó mucho antes de lo esperado y en perfecto estado. Les recomiendo mucho!</p>
                <footer class="blockquote-footer">Juan Pérez</footer>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-1">
          <div class="card text-center">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p class="text-wrap">Increíble calidad en los productos y un servicio al cliente excepcional. Definitivamente volveré a comprar aquí.</p>
                <footer class="blockquote-footer">María López</footer>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-center">
            <div class="card-body mb-0">
              <blockquote class="blockquote mb-0">
                <p class="text-wrap">Una gran variedad de productos a buen precio y la atención fue muy amable. ¡Muy satisfecho con mi compra!</p>
                <footer class="blockquote-footer">Carlos Fernández</footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>