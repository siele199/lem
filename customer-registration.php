<!DOCTYPE html>
<?php
session_start();

try {
    $connection = mysqli_connect("localhost:3308", "root", "root", "lem");
}
catch (mysqli_sql_exception $ex) {
    echo("error in connection");
}


$msg = "";

if (isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username1 = $_POST['username1'];
    $nationalid = $_POST['nationalid'];
    $dop = $_POST['dop'];
    $password = $_POST['password'];
    $password = md5($password);
    $email = $_POST['email1'];
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];

    $signup_query = "INSERT INTO `users`(`firstname`, `lastname`, `username1`, `nationalid`, `dop`, `password`, `email`, `phno`, `address`, `postalcode`) VALUES (' $firstname','$lastname','$username1','$nationalid','$dop','$password','$email','$phno','$address','$postalcode')";
    $check_query = "SELECT * FROM `users` WHERE username1='$username' or nationalid=' $nationalid'";






    if (mysqli_query($connection, $check_query)) {

        try {
            $signup_result = mysqli_query($connection, $signup_query);


            if ($signup_result) {
                if (mysqli_affected_rows($connection) > 0) {
                    $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Registration Succefull.
                      </div>';

                }
                else {
                    $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> username or national already exists.
                      </div>';
                }
            }
        }
        catch (Exception $ex) {
            echo("error" . $ex->getMessage());
        }


        if (mysqli_num_rows($check_res) > 0) {
            $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> Username or National ID already exists.
                      </div>';

        }

        else {
            $signup_res = mysqli_query($connection, $signup_query);
            $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Registration Succefull.
                      </div>';

        }
        $_SESSION['username1'] = $username;
        $_SESSION['userid'] = mysqli_insert_id($connection);
        header("location:Login.php");
    }
}


?>
<html lang="en">
  <head>

    <script>
   function validate() {
   
      if( document.RegForm.firstname.value == "" ) {
         alert( "Please provide your First name!" );
         document.RegForm.firstname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.firstname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.firstname.focus() ;
         return false;
      }

      if( document.RegForm.lastname.value == "" ) {
         alert( "Please provide your Last name!" );
         document.RegForm.lastname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.lastname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.lastname.focus() ;
         return false;
      }
      if( document.RegForm.username1.value == "" ) {
         alert( "Please provide your user name!" );
         document.RegForm.username1.focus() ;
         return false;
      }

      if( document.RegForm.nationalid.value == "" ) {
         alert( "Please provide your National ID number!" );
         document.RegForm.nationalid.focus() ;
         return false;
      }
         else if(!/^[0-9]*$/g.test(document.RegForm.nationalid.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.nationalid.focus() ;
         return false;
      }
      if( document.RegForm.dop.value == "" ) {
         alert( "Please provide your Estate and House number!" );
         document.RegForm.dop.focus() ;
         return false;
      }
      if( document.RegForm.password.value == "" ) {
         alert( "Please provide your password!" );
         document.RegForm.password.focus() ;
         return false;
      }
      else if( document.RegForm.password.value.length < 8 ) {
         alert( "Please provide more than 8 Characters!" );
         document.RegForm.password.focus() ;
         return false;
      }
      if( document.RegForm.pass1.value == "" ) {
         alert( "Please confirm your password!" );
         document.RegForm.pass1.focus() ;
         return false;
      }
      else if( document.RegForm.pass1.value.length < 8 ) {
         alert( "Please provide more than 8 Characters!" );
         document.RegForm.pass1.focus() ;
         return false;
      }

      password1 = RegForm.password.value; 
      password2 = RegForm.pass1.value; 

       // If Not same return False.     
        if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 

       var email1 = document.RegForm.email1.value;
       atpos = email1.indexOf("@");
       dotpos = email1.lastIndexOf(".");
          

       if( document.RegForm.email1.value == "" ) {
            alert( "Please enter your email!" );
            document.RegForm.email1.focus() ;
            return false;
          }
         else if (atpos < 1 || ( dotpos - atpos < 2 )) {
             alert("Please enter correct email ID")
             document.RegForm.email1.focus() ;
             return false;
          }
        if( document.RegForm.phno.value == "" ) {
         alert( "Please provide your Phone number!" );
         document.RegForm.phno.focus() ;
         return false;
      }
         else if(!/^[0-9]*$/g.test(document.RegForm.phno.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.phno.focus() ;
         return false;
      }
      if( document.RegForm.address.value == "" ) {
         alert( "Please provide your Address!" );
         document.RegForm.address.focus() ;
         return false;
      }

      if( document.RegForm.postalcode.value == "" ) {
         alert( "Please provide your Postal Code!" );
         document.RegForm.postalcode.focus() ;
         return false;
      }


   }
  
</script>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM ||Customer Registration</title>
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
                  
                  <li class="dropdown ">
                      <a class="nav-link scrollto active href="#">
                          <span>Sign Up/Sign In</span> <i class="bi bi-chevron-down"></i>
                      </a>
                      <ul>
                          <li><a href=customer-registration.php">Sign Up</a></li>
                          <li><a href="Login.php">Sign In</a></li>
                      </ul>
                  </li>

                  
                  <li>
                      <a class="nav-link scrollto" href="index.html #contact">Contact</a>
                  </li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </header>
      <!-- End Header -->

      <section id="Customer_Registration">
        <?php echo $msg; ?>
               <div class="section-title">
                  
              
              <div class="wrapper">
                  <h2>Join Us Today</h2>
                  <div class="title">
                      Sign up Now
                  </div>
                   <form action = "customer-registration.php" name = "RegForm" onsubmit = "return validate();"  method="post">
                  <div class="form">
                      <div class="inputfield">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="username1">Username</label>
                          <input type="text" name="username1" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="nationalid">National ID</label>
                          <input type="text" name="nationalid" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="dop">Delivery and Pick up point</label>
                          <input type="text" name="dop" class="input">
                      </div>
                      
                      <div class="inputfield">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="input">
                      </div>
                      <div class="inputfield">
                          <label>Confirm Password</label>
                          <input type="password" name="pass1" class="input">
                      </div>
                      
                      <div class="inputfield">
                          <label for="email1">Email Address</label>
                          <input type="text" name="email1" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="phno">Phone Number</label>
                          <input type="text" name="phno" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="postalcode">Postal Code</label>
                          <input type="text" name="postalcode" class="input">
                      </div>
                      
                      <div class="inputfield terms">
                          <label class="check">
                              <input type="checkbox">
                              <p class="checkmark"></p>
                          </label>
                          <a href="">Agreed to terms and conditions</a>
                      </div>
                      <div class="inputfield">
                         <button action="Login.php" type="submit" name="register" value="submit" class="btn">Sign Up Now</button>
                      </div>
                  </div>
                </form>
              </div>
          </div>

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