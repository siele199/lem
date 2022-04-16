
<!DOCTYPE html>

<?php

$connection = mysqli_connect("localhost:3308", "root", "root", "lem");
$msg1 = "";

if (isset($_POST['submit'])) {
  session_start();
  $_SESSION['username1'] = $_POST['username1'];

  $username1 = mysqli_real_escape_string($connection, strtolower($_POST['username1']));

  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $password = md5($password);

  $login_query = "SELECT * FROM `users` WHERE username1='$username1' and password='$password'";

  $login_res = mysqli_query($connection, $login_query);
  $row = mysqli_fetch_assoc($login_res);

  if (mysqli_num_rows($login_res) > 0) {
    $_SESSION['username1'] = $username1;
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['status'] = "Active";
    header('Location:indexlog.php');
  }
  else {
    $msg1 = '<div class="alert alert-danger alert-dismissable" style="margin-top:30px";>
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                      <strong>Unsuccessful!</strong> Login Unsuccessful.
                    </div>';
  }
}


?> 
<html lang="en">
  <head>
    
     <script type = "text/javascript">
   
       function validateUser() {
        
       if( document.myForm.username1.value == "" ) {
            alert( "Please enter your username1!" );
            document.myForm.username1.focus() ;
            return false;
         }

       
       if( document.myForm.password.value == "" ) {
            alert( "Please enter your password!" );
            document.myForm.password.focus() ;
            return false;
         }
         return( true );
       }
    
 </script>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM || Login</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />

 
  </head>

  <body>

      <!-- ======= Header ======= -->
      <header id="header"
              class="fixed-top d-flex justify-content-center align-items-center">
                        <nav id="navbar" class="navbar">
              <ul>
                  <li>
                      <a class="nav-link scrollto " href="index.html #home">Home</a>
                  </li>
                  <li>
                      <a class="nav-link scrollto" href="index.html #about">About Us</a>
                  </li>
                  <li>
                      <a class="nav-link scrollto" href="index.html #services">Services</a>
                  </li>
                  <li>
                      <a class="nav-link scrollto" href="index.html #works">How we do it</a>
                  </li>
                  
                  <li class="dropdown">
                      <a class="nav-link scrollto active" href="#">
                          <span>Sign Up/Sign In</span> <i class="bi bi-chevron-down"></i>
                      </a>
                      <ul>
                          <li><a href="customer-registration.php">Sign Up</a></li>
                          <li><a href="Login.php">Sign In</a></li>
                      </ul>
                  </li>

                 
                  <li>
                      <a class="nav-link scrollto" href="index.html #contact">Contact</a>
                  </li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
      </header>
     

      <section id="Sign_In">
        <?php echo $msg1; ?>
              <div class="section-title">
              <form  name = "myForm" onsubmit = "return validateUser();" method="post"  action="">  
              
              <div class="wrapper">
                  <h2>LOGIN</h2>
                  <div class="title">
                      Sign In
                  </div>
                  <div class="form">
                      <div class="inputfield">
                          <label>Username</label>
                          <input type="text" name="username1" class="input">
                      </div>
                    
                      <div class="inputfield">
                          <label>Password</label>
                          <input type="password" name="password" class="input">
                      </div>
      <br>
                     <a href="forgot.php">Forgot Password?</a>
                         <br>
                      
                      <div class="inputfield">
                        <button type="submit" name="submit" value="submit" class="btn">LOGIN</button>
                          
                      </div>
                  </div>
              </div>
              </form>
          </div>

              
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