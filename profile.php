<?php
session_start();
if ($_SESSION['status'] != "Active") 
{
  header("location:Login.php");
}


//echo $username;

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');

$username = $_SESSION['username1'];
$sql = "SELECT *FROM `users` where `username1`= '$username';";
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);



if (isset($_POST['update'])) {

  $username = $_SESSION['username1'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dop = $_POST['dop'];
  $pass = $_POST['pass'];
  $pass = md5($pass);
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $postalcode = $_POST['postalcode'];



  $sql = "UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`dop`='$dop',`password`='$pass',`phno`='$phno',`address`='$address',`postalcode`='$postalcode' WHERE username1= '" . $username . "'";


  if (mysqli_query($connection, $sql)) {
    echo "<script>alert('Record updated successfully');</script>";
  }
  else {
    echo "<script>alert('Error updating record:');</script> " . mysqli_error($connection);
  }
}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
   function validate() {
   
      if( document.RegForm.fname.value == "" ) {
         alert( "Please provide your First name!" );
         document.RegForm.fname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.fname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.fname.focus() ;
         return false;
      }

      if( document.RegForm.lname.value == "" ) {
         alert( "Please provide your Last name!" );
         document.RegForm.lname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.lname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.lname.focus() ;
         return false;
      }
      
      if( document.RegForm.dop.value == "" ) {
         alert( "Please provide your Estate and House number!" );
         document.RegForm.dop.focus() ;
         return false;
      }
      if( document.RegForm.pass.value == "" ) {
         alert( "Please provide your password!" );
         document.RegForm.pass.focus() ;
         return false;
      }
      else if( document.RegForm.pass.value.length < 8 ) {
         alert( "Please provide more than 8 Characters!" );
         document.RegForm.pass.focus() ;
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

      password1 = RegForm.pass.value; 
      password2 = RegForm.pass1.value; 

       // If Not same return False.     
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

      if( document.RegForm.postalcode.value == "" ) {
         alert( "Please provide your Postal Code!" );
         document.RegForm.postalcode.focus() ;
         return false;
      }


   }
  
</script>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM || User Profile</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Vendor CSS Files -->
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
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
     <nav id="navbar" class="navbar">
        <ul>
           <li><a class="nav-link scrollto" href="indexlog.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="profile.php">Profile</a></li>
        <li><a class="nav-link scrollto" href="booking.php">Book your service<i class="material-icons md-48">shopping_basket</i> <span id="basket-item" class="badge badge-pill-danger"><?php $bas = $_SESSION["basket_cart"];
$numb = count($bas);
echo($numb); ?></span></a></li>
          <li><a class="nav-link scrollto" href="orders.php">Orders</a></li>
          <li><a class="nav-link scrollto" href="receipts.php">Reciept</a></li>
          
          <li><a class="nav-link scrollto" href="indexlog.php #contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
           
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </header>
    <!-- End Header -->
<div class="section-title">
                  
              <?php
      if ($resultCheck > 0){
       while($row=mysqli_fetch_assoc( $result)){

      ?>
              <div class="wrapper">
                  <h2>My Profile</h2>
                  <div class="title">
                      Edit your profile
                  </div>
                   <form action = "profile.php"  name = "RegForm" onsubmit = "return validate();"  method="post">
                  <div class="form">
                      <div class="inputfield">
                          <label for="firstname">First Name</label>
                          <input id="fname" type="text" name="fname" class="input"
                          
                          value="<?php echo $row['firstname']?>"required>
                          
                      </div>
                      <div class="inputfield">
                          <label for="lastname">Last Name</label>
                          <input id="lname" type="text" name="lname" class="input" value="<?php echo $row['lastname']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="email">Email Address</label>
                          <input type="text" name="email" class="input" value="<?php echo $row['email']?>"required>
                      </div>
                      
                      <div class="inputfield">
                          <label for="dop">Delivery and Pick up point</label>
                          <input type="text" name="dop" class="input" value="<?php echo $row['dop']?>">
                      </div>
                      
                      <div class="inputfield">
                          <label for="password">Password</label>
                          <input type="password" name="pass" class="input" placeholder="Enter New Password" required>
                      </div>
                      <div class="inputfield">
                          <label>Confirm Password</label>
                          <input type="password" name="pass1" class="input" placeholder="Confirm new password" required>
                      </div>
                      
                      
                      <div class="inputfield">
                          <label for="phno">Phone Number</label>
                          <input type="text" name="phno" class="input" value="<?php echo $row['phno']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="input" value="<?php echo $row['address']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="postalcode">Postal Code</label>
                          <input type="text" name="postalcode" class="input" value="<?php echo $row['postalcode']?>" required>
                      </div>
                       <?php
  }
}
?>
                      
                      <div class="inputfield">
                         <button type="submit" name="update"  class="btn" >Change</button>
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
          &copy; Copyright <strong><span>LEM LaundroMat</span></strong
          >. All Rights Reserved
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
