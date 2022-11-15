<?php
require_once '../config/connection.php';
require_once '../models/database.php';

$connection = new Database($host, $user, $pass, $database);

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
    <link href="../assets/img/favicon.ico" rel="icon" />

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
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet" />

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
      <a href="../index.html" class="navbar-brand ml-lg-3">
          <div class="logo-image">
            <img class="img-fluid" src="../assets/img/cheese.png">
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
            <a href="../index.php" class="nav-item nav-link active mx-5">Home</a>
            <a href="../product.php" class="nav-item nav-link mx-5">Produk</a>
          </div>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 text-center">Daftar</h1>
                    <div class="contact-form bg-secondary" style="padding: 50px; border-radius: 20px;">
                        <div id="success"></div>
                        <form method="POST">
                            <div class="control-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control border-0 p-4" id="nama" name="nama"
                                    required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="email">Email</label>
                                <input type="email" class="form-control border-0 p-4" id="email" name="email"
                                    required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="password">Password</label>
                                <input type="password" class="form-control border-0 p-4" id="password" name="password"
                                    required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="password2">Konfirmasi Password</label>
                                <input type="password" class="form-control border-0 p-4" id="password2" name="password2"
                                    required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="alamat">Alamat</label>
                                <textarea name="alamat" name="alamat" class="form-control border-0 p-4" style="resize: none;" required>
                            </textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="telp">No Telepon</label>
                                <input type="text" class="form-control border-0 p-4" id="telp" name="telp"
                                    required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2" type="submit" name="register" id="register">Daftar</button>
                                <p class="mt-2">Sudah Memiliki Akun? <a href="index.php">Login</a></p>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['register'])) {
                            $nama = $connection->conn->real_escape_string($_POST['nama']);
                            $email = $connection->conn->real_escape_string($_POST['email']);
                            $password = $connection->conn->real_escape_string($_POST['password']);
                            $password2 = $connection->conn->real_escape_string($_POST['password2']);
                            $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                            $telp = $connection->conn->real_escape_string($_POST['telp']);

                            //Cek apakah email sudah ada atau belum
                            $ambil = $connection->conn->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
                            $cocok = $ambil->num_rows;
                            if ($cocok == 1) {
                                echo "<script>
                                alert('Email Sudah Digunakan');
                                window.location.href = 'register.php';
                                </script>";
                            } elseif ($password != $password2) {
                                echo "<script>
                                alert('Konfirmasi Password Tidak Sesuai!');
                                window.location.href = 'register.php';
                                </script>";
                            } else{
                                // //Enskripsi Password
                                // $password = password_hash($password, PASSWORD_DEFAULT);

                                //Query memasukkan data kedalam database
                                $connection->conn->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telp', '$alamat')");

                                echo "<script>
                                alert('Daftar Berhasil! Silahkan Login');
                                window.location.href = 'index.php';
                                </script>";
                            }


                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-7 col-md-6">
          <div class="row">
            <div class="col-md-6 mb-5">
              <h3 class="text-primary mb-4">Cheese Roll</h3>
              <p>
                <i class="fa fa-map-marker-alt mr-2"></i>Dramaga Gg Haji Burhan,
                KM 7 Bogor Barat
              </p>
              <p><i class="fa fa-phone-alt mr-2"></i>089531852238</p>
              <p>
                <i class="fa fa-envelope mr-2"></i>miftahfadilah71@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Follow Us</h3>
          <a class="btn btn-outline-light btn-social mr-2" href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
                <a class="btn btn-outline-light btn-social" href="#"
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
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/counterup/counterup.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
