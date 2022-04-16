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
  $username = $_POST['username'];
  $nationalid = $_POST['nationalid'];
  $vehiclereg = $_POST['vregistration_no'];
  $vehicletype = $_POST['type'];
  $vimg = $_FILES['file']['name'];
  $password = $_POST['password'];
  $password = md5($password);
  $email = $_POST['email'];
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $postalcode = $_POST['pcode'];

  move_uploaded_file($_FILES['file']['tmp_name'], "picture/" . $_FILES['file']['name']);

  $signup_query = "INSERT INTO `rider`(`firstname`, `lastname`, `username`, `nationalid`, `vregistration_no`, `vehicle_type`, `vimg`, `password`, `email`, `phno`, `address`, `pcode`) VALUES ('$firstname','$lastname','$username','$nationalid','$vehiclereg','$vehicletype','$vimg','$password','$email','$phno','$address','$postalcode')";

  $check_query = "SELECT * FROM `rider` WHERE username='$username' or email='$email'";
  $check_res = mysqli_query($connection, $check_query);
  try {
    $signup_result = mysqli_query($connection, $signup_query);
    if ($signup_result) {
      if (mysqli_affected_rows($connection, $signup_result) > 0) {
        $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Registration Succefull.
                      </div>';
      }
      else {
        $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> username or Email already exists.
                      </div>';
      }
    }
  }
  catch (Exception $ex) {
    echo("error" . $ex->getMessage());
  }


  if (mysqli_num_rows($check_res) > 0) {
    $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> Username or Email already exists.
                      </div>';

  }

  else {
    $signup_res = mysqli_query($connection, $signup_query);
    $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Registration Succefull.
                      </div>';

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
      if( document.RegForm.username.value == "" ) {
         alert( "Please provide your user name!" );
         document.RegForm.username.focus() ;
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
      if( document.RegForm.vregistration_no.value == "" ) {
         alert( "Please provide your vehicle registration number !" );
         document.RegForm.vregistration_no.focus() ;
         return false;
      }
      if( document.RegForm.vregistration_no.value == "" ) {
         alert( "Please select your vehicle type!" );
         document.RegForm.vregistration_no.focus() ;
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
      if( document.RegForm.password_2.value == "" ) {
         alert( "Please confirm your password!" );
         document.RegForm.password_2.focus() ;
         return false;
      }
      else if( document.RegForm.password_2.value.length < 8 ) {
         alert( "Please provide more than 8 Characters!" );
         document.RegForm.password_2.focus() ;
         return false;
      }

      password1 = RegForm.password.value; 
      password2 = RegForm.password_2.value; 

        
        if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 

       var email = document.RegForm.email.value;
       atpos = email.indexOf("@");
       dotpos = email.lastIndexOf(".");
          

       if( document.RegForm.email.value == "" ) {
            alert( "Please enter your email!" );
            document.RegForm.email.focus() ;
            return false;
          }
         else if (atpos < 1 || ( dotpos - atpos < 2 )) {
             alert("Please enter correct email ID")
             document.RegForm.email.focus() ;
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

      if( document.RegForm.pcode.value == "" ) {
         alert( "Please provide your Postal Code!" );
         document.RegForm.pcode.focus() ;
         return false;
      }


   }
  
</script>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM ||Be a Rider || Registration</title>
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
          <li><a class="nav-link scrollto " href="admin_panel.php">Home</a></li>
          <li><a class="nav-link scrollto " href="admin_customer.php">Customers</a></li>
          <li><a class="nav-link scrollto " href="admin_urider.php">Unapproved Riders</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Add Users</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="addcustomer.php">Add Customer</a></li>
            <li><a href="addrider.php">Add Rider</a></li>
            
          </ul>
        </li>
           <li class="dropdown"><a href="#"><span>Laundry</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="addcategory.php">Add Category</a></li>
            
            <li><a href="viewcategory.php">View Categories</a></li>
            
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="addservice.php">Add Service</a></li>
            
            <li><a href="viewservices.php">View Services</a></li>
            
          </ul>
        </li>
          <li class="dropdown"><a href="#"><span>Orders</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
          <li><a href="release.php">Release Rider</a></li>
          <li><a href="vieworders.php">View Orders</a></li>
            
          </ul>
        </li>
          <li><a class="nav-link scrollto " href="admin_crider.php">Riders</a></li>
<li><a class="nav-link scrollto" href="reports.php">Reports</a></li>
          <li><a class="nav-link scrollto" href="editprofile.php">Edit Profile</a></li>
          <li><a class="nav-link scrollto" href="logouta.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>bile-nav-toggle"></i>
          </nav>
         
      </header>
      

      <section id="Registration-Rider">
          <?php echo $msg; ?>
              <div class="section-title">
                  <div class="wrapper">
                  <h2>Be A Rider</h2>
                  <div class="title">
                      Registration Form
                  </div>

               <form action = "addrider.php" name = "RegForm" onsubmit = "return validate();"  method="post" enctype="multipart/form-data">    
              
              
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
                          <label for="username">User Name</label>
                          <input type="text" name="username" class="input">
                      </div>
                      <div class="inputfield">
                          <label>National ID</label>
                          <input type="text" name="nationalid" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="vehiclereg">Vehicle Registration Number</label>
                          <input type="text" name="vregistration_no" class="input">
                      </div>
                       <div class="inputfield">
                          <label for="vehicletype">Vehicle Type</label>
                          <div class="custom_select">
                              <select name="type">
                                  <option value="">Select</option>
                                  <option value="Motorbike">Motorbike</option>
                                  <option value="TukTuk">TukTuk</option>
                                  <option value="Saloon Car">Saloon Car</option>
                                  <option value="Truck">Truck</option>
                              </select>
                          </div>
                      </div>
                     <div class="inputfield">
                          <label for="vimg">Vehicle Image</label>
                          <input type="file" name="file" class="input">
                      </div>
                      
                      <div class="inputfield">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="cpassword">Confirm Password</label>
                          <input type="password" name="password_2" class="input">
                      </div>
                      
                      <div class="inputfield">
                          <label for="email">Email Address</label>
                          <input type="email" name="email" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="phoneno">Phone Number</label>
                          <input type="text" name="phno" class="input">
                      </div>
                      <div class="inputfield">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="input">
                          
                      </div>
                      <div class="inputfield">
                          <label for="postalcode">Postal Code</label>
                          <input type="text" name="pcode" class="input">
                      </div>
                      <!--  
                        <div class="inputfield terms"> 
                          
                            <input type="checkbox" name="check">
                            <label class="check" for="check">
                              
                          </label>
                          <a href="">Agreed to terms and conditions</a>
                      </div>-->
                      <div class="inputfield">
                         <button type="submit" name="register" value="submit" class="btn">Register</button>
                      </div>
                  </div>
                  
              </div>
            
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