<?= $this->extend('fe_assets') ?>

<?= $this->section('content')?>
 <!-- Hero Section -->
 <section id="hero" class="hero section">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
      <h1>Selamat datang di SIDITA</h1>
      <p>Sistem Informasi Daftar Penyedia Tetap</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started">Login</a>
        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"></a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img">
      <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- /Hero Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">

<div class="container" data-aos="fade-up">

  <div class="row gy-4">

    <div class="col-xl-4 col-md-4 col-4 client-logo">
      <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-4 col-md-4 col-4 client-logo">
      <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-4 col-md-4 col-4 client-logo">
      <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

  </div>

</div>

</section><!-- /Clients Section -->

<!-- About Section -->
<section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Daftar Pengadaan</h2>
  <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
   <!-- table start -->
   <div class="card p-4" style="border-radius:20px overflow-x: scroll">
        <table id="example" class="display stripe table-responsive" style="width:100%;">
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011-04-25</td>
                      <td>$320,800</td>
                  </tr>
                  <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td>$170,750</td>
                  </tr>
                  <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td>$170,750</td>
                  </tr>
              </tbody>   
        </table>
      </div>
   <!-- Table Ends  -->
</div><!-- End Section Title -->

<div class="container">

 

</div>

</section><!-- /About Section -->

<!-- Stats Section -->
<section id="stats" class="stats section">

<div class="container " data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4 align-items-center">

    <div class="col-lg-5">
      <img src="assets/img/stats-img.svg" alt="" class="img-fluid">
    </div>

    <div class="col-lg-7">

      <div class="row gy-4">

        <div class="col-lg-6">
          <div class="stats-item d-flex">
            <i class="bi bi-emoji-smile flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-6">
          <div class="stats-item d-flex">
            <i class="bi bi-journal-richtext flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-6">
          <div class="stats-item d-flex">
            <i class="bi bi-headset flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
            </div>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-6">
          <div class="stats-item d-flex">
            <i class="bi bi-people flex-shrink-0"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
            </div>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>

  </div>

</div>

</section><!-- /Stats Section -->

<!-- Services Section -->
<section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Pengadaan Terbaru</h2>
  <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item position-relative">
        <i class="bi bi-activity"></i>
        <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item position-relative">
        <i class="bi bi-bounding-box-circles"></i>
        <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item position-relative">
        <i class="bi bi-calendar4-week"></i>
        <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item position-relative">
        <i class="bi bi-broadcast"></i>
        <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section><!-- /Services Section -->

<script>
  new DataTable('#example');
</script>

<?= $this->endSection() ?>