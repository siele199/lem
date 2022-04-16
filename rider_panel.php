<?php
session_start(); 
if($_SESSION['status']!="Active")
{
    header("location:Login_rider.php");
}
    
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LEM LaundroMat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/LEM_Logo.png" rel="icon">
  <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0c1896e814.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
 <body>
    
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="indexlogrider.php">Home</a></li>
    <li><a class="nav-link scrollto active"href="rider_panel.php">Rider Panel</a> </li>
    <li><a class="nav-link scrollto" href="rider_panel_log.php">Rider's Log</a></li>
    <li><a class="nav-link scrollto" href="rides.php">Rides</a></li>
    
    <li><a class="nav-link scrollto" href="">Ride Records</a></li>
    <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
    </header>
    <section id="Registration-Rider">
              <div class="section-title">
                  
              
              <div class="wrapper">
                  <h2>Rider Panel</h2>
                  <div class="title">
                      Rider PAge
                  </div>
              
              <div class="wrapper">
                  <h5>You can Check your info from here</h5>
          </div></div></div></section>
              <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <h3>LEM LaundroMat</h3>
        <p>Reliable Laundry And Household Cleaning Services.</p>
        <div class="social-links">
          <a href="https://www.instagram.com/_.siele_/" class="instagram"
            ><i class="bx bxl-instagram"></i
          ></a>
        </div>
        <div class="copyright">
          &copy; Copyright LEM LaundroMat. All Rights Reserved
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframeworks.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>