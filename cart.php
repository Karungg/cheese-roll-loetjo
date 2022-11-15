<?php
session_start();
require_once 'config/connection.php';
require_once 'models/database.php';
include 'models/product.php';

$connection = new Database($host, $user, $pass, $database);
$product = new Product($connection);

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>
    alert('Keranjang Kosong Silahkan Belanja Terlebih Dahulu.');
    window.location.href = 'product.php';
    </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Cheese Roll</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

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
            <small><i class="fa fa-phone-alt mr-2"></i>089531852238</small>
            <small class="px-3">|</small>
            <small
              ><i class="fa fa-envelope mr-2"></i
              >miftahfadilah71@gmail.com</small
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
            <a href="index.php" class="nav-item nav-link mx-5">Home</a>
            <a href="product.php" class="nav-item nav-link mx-5">Produk</a>
            <a href="cart.php" class="nav-item nav-link active mx-5">Keranjang</a>
            <?php if(isset($_SESSION['pelanggan'])) : ?>
              <a href="riwayat.php" class="nav-item nav-link mx-5">Riwayat</a>
            <?php endif; ?>
          </div>
          <!-- Jika sudah login (ada session pelanggan) -->
			    <?php if (isset($_SESSION['pelanggan'])): ?>
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

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <h1 class="text-primary font-weight-bold">Keranjang</h1>
        </div>
        <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="product.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                </div>
                <?php $total_belanja = 0; ?>
                <?php
                foreach ($_SESSION['keranjang'] as $id => $jumlah) : ?>
                <?php
                $ambil = $product->tampil($id);
                $pecah = $ambil->fetch_object();
                $subharga = $pecah->harga_produk * $jumlah;
                ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="ms-3">
                          <h5><?= $pecah->nama_produk; ?></h5>
                          <p class="small mb-0"><?= $pecah->harga_produk; ?> / pack</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 70px;">
                          <h5 class="fw-normal mb-0"><?= $jumlah; ?></h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0"><?= number_format($subharga); ?></h5>
                        </div>
                        <a href="delete-cart.php?id=<?= $id; ?>" style="color: #cecece;" onclick="return confirm('Delete from cart?')"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $total_belanja+= $subharga; ?>
                <?php endforeach; ?>
              </div>
              <div class="col-lg-5">
                <div class="card bg-dark text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">Rp. <?= number_format($total_belanja); ?></p>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total</p>
                      <p class="mb-2">Rp. <?= number_format($total_belanja); ?></p>
                    </div>

                    <a href="checkout.php" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </a>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- Team End -->

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
    <div
      class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
      style="border-color: #3e3e4e !important"
    >
      <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
          <p class="m-0 text-white">
            &copy; <a href="#">Cheese Roll</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a href="https://htmlcodex.com">HTML Codex</a>
            <br />Distributed By:
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
          <ul class="nav d-inline-flex">
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Privacy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Terms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Help</a>
            </li>
          </ul>
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
