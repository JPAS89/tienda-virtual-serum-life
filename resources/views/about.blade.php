@extends('layouts.app')

@section('seccion')
<style>
  .blockquote-footer {
    margin-top: -1rem;
    margin-bottom: 1rem;
    font-size: 0.875em;
    color: #6c757d;
  }

  .blockquote-footer::before {
    content: "— ";
  }

  .footer {
    padding-top: 5rem;
    padding-bottom: 5rem;
    background-color: #2c3e50;
    color: #fff;
  }


  .container,
  .container-fluid,
  .container-xxl,
  .container-xl,
  .container-lg,
  .container-md,
  .container-sm {
    width: 100%;
    padding-right: var(--bs-gutter-x, 0.75rem);
    padding-left: var(--bs-gutter-x, 0.75rem);
    margin-right: auto;
    margin-left: auto;
  }

  @media (min-width: 576px) {

    .container-sm,
    .container {
      max-width: 540px;
    }
  }

  @media (min-width: 768px) {

    .container-md,
    .container-sm,
    .container {
      max-width: 720px;
    }
  }

  @media (min-width: 992px) {

    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 960px;
    }
  }

  @media (min-width: 1200px) {

    .container-xl,
    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 1140px;
    }
  }

  @media (min-width: 1400px) {

    .container-xxl,
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 1320px;
    }
  }

  .divider-custom {
    margin: 1.25rem 0 1.5rem;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .divider-custom .divider-custom-line {
    width: 100%;
    max-width: 7rem;
    height: 0.25rem;
    background-color: #2c3e50;
    border-radius: 1rem;
    border-color: #2c3e50;
  }

  .divider-custom .divider-custom-line:first-child {
    margin-right: 1rem;
  }

  .divider-custom .divider-custom-line:last-child {
    margin-left: 1rem;
  }

  .divider-custom .divider-custom-icon {
    color: #2c3e50;
    font-size: 2rem;
  }

  .divider-custom.divider-light .divider-custom-line {
    background-color: #fff;
  }

  .divider-custom.divider-light .divider-custom-icon {
    color: #fff;
  }
  
</style>
<!-- Jumbotron -->
<section class="page-section bg-secondary text-white mb-0" id="about">
  <div class="container">
    <!-- About Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase text-white">MISION / VISION </h2>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
      <div class="divider-custom-line"></div>
    </div>
    <!-- About Section Content-->
    <div class="row">
      <div class="col-lg-4 ms-auto">
        <p class="lead">Crear y apoyar empresas uniendo a los productores para generar, incentivar e impulsar el desarrollo social e incrementar valor en la industria láctea.</p>
      </div>
      <div class="col-lg-4 me-auto">
        <p class="lead">Ser una empresa líder en la industria láctea, con altos estándares de calidad y competitividad, basados en la innovación, creando así un desarrollo económico.  </p>
      </div>
    </div>
    <!-- About Section Button-->
  </div>
  <div class="text-center">
    <iframe width="860" height="615" src="https://www.youtube.com/embed/2ClRuyUa2hY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</section>


<!-- Footer-->
<footer class="footer text-center bg-dark">
  <div class="container">
    <div class="row">
      <!-- Footer Location-->
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h4 class="text-uppercase mb-4">Localizacion</h4>
        <p class="lead mb-0">
          San Carlos Florencia
          <br />
          Costa Rica
        </p>
      </div>
      <!-- Footer Social Icons-->
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h4 class="text-uppercase mb-4">CONOCE NUESTROS PRODUCTOS</h4>
        <a class="btn btn-outline-light  " href="{{ route('catalogo')}}"><i class="bi bi-cart4"></i>Catalogo</a>
      </div>
      <!-- Footer About Text-->
      <div class="col-lg-4">
        <h4 class="text-uppercase mb-4">Acerca de Serum life</h4>
        <p class="lead mb-0">
          Somos una empresa  innovadora en tecnologias alimenticas

        </p>
      </div>
    </div>
  </div>
</footer>
@endsection