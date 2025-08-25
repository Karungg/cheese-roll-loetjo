<?php
session_start();
require_once 'config/connection.php';
require_once 'models/database.php';

$connection = new Database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Cheese Roll Loetjo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <style>
      .logo-image{
        width: 230px;
        height: 46px;
        margin-top: -120px;
      }
    </style>
  </head>

  <body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
      <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center text-white">
            <small><i class="fa fa-phone-alt mr-2"></i>0898-9543-968</small>
            <small class="px-3">|</small>
            <small
              ><i class="fa fa-envelope mr-2"></i
              >cheeserollloetjoe@gmail.com</small
            >
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <div class="d-inline-flex align-items-center">
            <a class="text-white px-2" href="">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="text-white pl-2" href="">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top p-0">
      <nav
        class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5"
      >
        <a href="index.html" class="navbar-brand ml-lg-3">
          <div class="logo-image">
            <img class="img-fluid" src="assets/img/cheese.png">
          </div>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between px-lg-3"
          id="navbarCollapse"
        >
          <div class="navbar-nav m-3 py-0">
            <a href="#home" class="nav-item nav-link active mx-5">Home</a>
            <a href="product.php" class="nav-item nav-link mx-5">Produk</a>
            <a href="cart.php" class="nav-item nav-link mx-5">Keranjang</a>
              <?php if(isset($_SESSION['pelanggan'])) : ?>
                <a href="riwayat.php" class="nav-item nav-link mx-5">Riwayat</a>
              <?php endif; ?>
          </div>
              <?php if (isset($_SESSION['pelanggan'])): ?>
              <!-- Jika sudah login (ada session pelanggan) -->
              <a class="btn btn-primary py-2 px-4 d-none d-lg-block" href="login/logout.php" onclick="return confirm('Apakah anda ingin logout ?')">Logout</a>
              <!-- Jika belum login (tidak ada session pelanggan) -->
              <?php else: ?>
			    <a href="login/index.php" class="btn btn-primary py-2 px-4 d-none d-lg-block"
            >Login</a
          >
			        <?php endif ?>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5" id="home">
      <div class="container text-center py-5">
        <h1 class="text-primary mb-4">Cheese Roll Loetjo</h1>
        <h1 class="text-white display-4 mb-5">Lezat & Ekonomis</h1>
        <div class="mx-auto" style="width: 100%; max-width: 600px;"></div>
      </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <h6 class="text-primary text-uppercase font-weight-bold">
              Tentang Kami
            </h6>
            <h1 class="mb-4">Terpercaya & Ekonomis</h1>
            <p class="mb-4">
              Cheese Roll Loetjo menggunakan bahan pilihan yang berkualitas dan tetap mempertahankan harga yang ekonomis.
            </p>
          </div>
          <div class="col-lg-5 pb-4 pb-lg-0">
            <img class="img-fluid w-100" style="border-radius: 15px;" src="assets/img/about.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <h6 class="text-primary text-uppercase font-weight-bold">Menu</h6>
          <h1 class="mb-4">Best Seller</h1>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div
              class="team card position-relative overflow-hidden border-0 mb-5"
            >
              <img class="card-img-top" src="assets/img/produk.jpg" alt="" />
              <div class="card-body text-center p-0">
                <div
                  class="team-text d-flex flex-column justify-content-center bg-secondary"
                >
                  <h5 class="font-weight-bold">Cheese Roll Original</h5>
                  <span>Cheese Roll Dengan Rasa Original</span>
                </div>
                <div
                  class="team-social d-flex align-items-center justify-content-center bg-primary"
                >
                  <a class="btn btn-outline-dark mr-2" href="product.php">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="team card position-relative overflow-hidden border-0 mb-5"
            >
              <img class="card-img-top" src="assets/img/produk2.jpg" alt="" />
              <div class="card-body text-center p-0">
                <div
                  class="team-text d-flex flex-column justify-content-center bg-secondary"
                >
                  <h5 class="font-weight-bold">Cheese Roll Coklat</h5>
                  <span>Cheese Roll Dengan Topping Chocolate</span>
                </div>
                <div
                  class="team-social d-flex align-items-center justify-content-center bg-primary"
                >
                  <a class="btn btn-outline-dark mr-2" href="product.php">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="team card position-relative overflow-hidden border-0 mb-5"
            >
              <img class="card-img-top" src="assets/img/produk3.jpg" alt="" />
              <div class="card-body text-center p-0">
                <div
                  class="team-text d-flex flex-column justify-content-center bg-secondary"
                >
                  <h5 class="font-weight-bold">Cheese Roll Strawberry</h5>
                  <span>Cheese Roll Dengan Topping Strawberry</span>
                </div>
                <div
                  class="team-social d-flex align-items-center justify-content-center bg-primary"
                >
                  <a class="btn btn-outline-dark mr-2" href="product.php">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="team card position-relative overflow-hidden border-0 mb-5"
            >
              <img class="card-img-top" src="assets/img/produk4.jpg" alt="" />
              <div class="card-body text-center p-0">
                <div
                  class="team-text d-flex flex-column justify-content-center bg-secondary"
                >
                  <h5 class="font-weight-bold">Cheese Roll Tiramisu</h5>
                  <span>Cheese Roll Dengan Topping Tiramisu</span>
                </div>
                <div
                  class="team-social d-flex align-items-center justify-content-center bg-primary"
                >
                  <a class="btn btn-outline-dark mr-2" href="product.php">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Features Start -->
    <div class="container-fluid bg-secondary my-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img class="img-fluid w-100" src="assets/img/feature.jpg" alt="" />
          </div>
          <div class="col-lg-7 py-5 py-lg-0">
            <h6 class="text-primary text-uppercase font-weight-bold">
              Mengapa Harus Beli Produk Kami
            </h6>
            <h1 class="mb-4">
              Menggunakan Bahan Berkualitas Dan Memberikan Pelayanan Terbaik
            </h1>
            <p class="mb-4">
              Misi kami adalah menyajikan cheese roll dengan kualitas terbaik dan mengutamakan kepuasan pelanggan.
            </p>
            <ul class="list-inline">
              <li>
                <h6>
                  <i class="far fa-dot-circle text-primary mr-3"></i>Terbaik Di
                  BSI
                </h6>
              </li>
              <li>
                <h6>
                  <i class="far fa-dot-circle text-primary mr-3"></i>Murah
                </h6>
              </li>
              <li>
                <h6>
                  <i class="far fa-dot-circle text-primary mr-3"></i>24/7
                  Customer Support
                </h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Features End -->

    <!-- Services Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="row pb-3 justify-content-center">
          <div class="col-lg-3 col-md-6 text-center mb-5">
            <h1 class="text-primary mb-2" data-toggle="counter-up">2</h1>
            <h6 class="font-weight-bold mb-4">Pelanggan Senang</h6>
          </div>
          <div class="col-lg-3 col-md-6 text-center mb-5">
            <h1 class="text-primary mb-2" data-toggle="counter-up">10</h1>
            <h6 class="font-weight-bold mb-4">Produk Terjual</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- Services End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="text-center pb-2">
          <h6 class="text-primary text-uppercase font-weight-bold">
            Testimoni
          </h6>
          <h1 class="mb-4">Apa Kata Mereka?</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
          <div class="position-relative bg-secondary p-4">
            <i
              class="fa fa-3x fa-quote-right text-primary position-absolute"
              style="top: -6px; right: 0"
            ></i>
            <div class="d-flex align-items-center mb-3">
              <img
                class="img-fluid rounded-circle"
                src="assets/img/testimonial-1.jpg"
                style="width: 60px; height: 60px"
                alt=""
              />
              <div class="ml-3">
                <h6 class="font-weight-semi-bold m-0">Gadis Syalwa</h6>
                <small>Mahasiswa</small>
              </div>
            </div>
            <p class="m-0">
              Cheese roll yang disajikan sangat enak dan pelayanan yang ramah.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-7 col-md-6">
          <div class="row">
            <div class="col-md-6 mb-5">
              <h3 class="text-primary mb-4">Cheese Roll Loetjo</h3>
              <p>
                <i class="fa fa-map-marker-alt mr-2"></i>Cibanteng Grya Raharja Blok B4 no 2 RT 01
RW 08 Desa Cibanteng Kec. Ciampea, Bogor. 
              </p>
              <p>
              <a target="_blank" href="https://wa.me/628989543968">  
              <i class="fa fa-phone-alt mr-2"></i>0898-9543-968</p>
              </a>
              <p>
                <i class="fa fa-envelope mr-2"></i>cheeserollloetjoe@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Ikuti Kami</h3>
          <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="https://twitter.com/loetjoecheese?t=sAj2hzYlr7bHN_ZYm-nUeA&s=09
"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="https://www.facebook.com/profile.php?id=100086273923445"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="#"
                  ><i class="fab fa-tiktok"></i
                ></a>
                <a class="btn btn-outline-light btn-social" target="_blank" href="https://instagram.com/cheeseroll.loetjoe?igshid=YmMyMTA2M2Y="
                  ><i class="fab fa-instagram"></i
                ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
      style="border-color: #3e3e4e !important"
    >
      <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
          <p class="m-0 text-white">
            &copy; <a href="#">Cheese Roll Loetjo</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a href="https://htmlcodex.com">HTML Codex</a>
            <br />Distributed By:
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </p>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
