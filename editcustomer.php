<?php
session_start();
if ($_SESSION['status'] != "Active") 
{
 header("location:Login_admin.php");
}


//echo $username;

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');

$username = $_POST['username1'];
$sql = "SELECT *FROM `users` where `username1`= '$username';";
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);



if (isset($_POST['update'])) {

  $username = $_POST['username1'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $nid=$_POST['nationalid'];
  $email = $_POST['email'];
  $dop = $_POST['dop'];
  $pass = $_POST['pass'];
  $pass = md5($pass);
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $postalcode = $_POST['postalcode'];



  $sql = "UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`nationalid`='$nid',`email`='$email',`dop`='$dop',`password`='$pass',`phno`='$phno',`address`='$address',`postalcode`='$postalcode' WHERE username1= '" . $username . "'";


  if (mysqli_query($connection, $sql)) {
    echo "<script>alert('Record updated successfully');</script>";
    header("location:admin_customer.php");
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
         alert( "Please provide the First name!" );
         document.RegForm.fname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.fname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.fname.focus() ;
         return false;
      }

      if( document.RegForm.lname.value == "" ) {
         alert( "Please provide the Last name!" );
         document.RegForm.lname.focus() ;
         return false;
      }
         else if(!/^[a-zA-Z]*$/g.test(document.RegForm.lname.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.lname.focus() ;
         return false;
      }
       if( document.RegForm.nationalid.value == "" ) {
         alert( "Please provide the National ID number!" );
         document.RegForm.nationalid.focus() ;
         return false;
      }
         else if(!/^[0-9]*$/g.test(document.RegForm.nationalid.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.nationalid.focus() ;
         return false;
      }
      
      if( document.RegForm.dop.value == "" ) {
         alert( "Please provide the Estate and House number!" );
         document.RegForm.dop.focus() ;
         return false;
      }
      if( document.RegForm.pass.value == "" ) {
         alert( "Please provide  password!" );
         document.RegForm.pass.focus() ;
         return false;
      }
      else if( document.RegForm.pass.value.length < 8 ) {
         alert( "Please provide more than 8 Characters!" );
         document.RegForm.pass.focus() ;
         return false;
      }
      if( document.RegForm.pass1.value == "" ) {
         alert( "Please confirm password!" );
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
            alert( "Please enter email!" );
            document.RegForm.email.focus() ;
            return false;
          }
         else if (atpos < 1 || ( dotpos - atpos < 2 )) {
             alert("Please enter correct email ID")
             document.RegForm.email.focus() ;
             return false;
          }
        if( document.RegForm.phno.value == "" ) {
         alert( "Please provide the Phone number!" );
         document.RegForm.phno.focus() ;
         return false;
      }
         else if(!/^[0-9]*$/g.test(document.RegForm.phno.value)) {
         alert( "Invalid Characters!" );
         document.RegForm.phno.focus() ;
         return false;
      }
      if( document.RegForm.address.value == "" ) {
         alert( "Please provide the Address!" );
         document.RegForm.address.focus() ;
         return false;
      }

      if( document.RegForm.postalcode.value == "" ) {
         alert( "Please provide the Postal Code!" );
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
          <li><a class="nav-link scrollto active" href="admin_panel.php">Home</a></li>
          <li><a class="nav-link scrollto " href="admin_customer.php">Customers</a></li>
          <li><a class="nav-link scrollto " href="admin_urider.php">Unapproved Riders</a></li>
          <li class="dropdown"><a href="#"><span>Add Users</span> <i class="bi bi-chevron-down"></i></a>
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
      </nav>
     
    </header>
    
<div class="section-title">
                  
              <?php
      if ($resultCheck > 0){
       while($row=mysqli_fetch_assoc( $result)){

      ?>
              <div class="wrapper">
                  <h2>Profile</h2>
                  <div class="title">
                      Edit profile
                  </div>
                   <form action = "editcustomer.php"  name = "RegForm" onsubmit = "return validate();"  method="post">
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
                          <label for="username1">Username</label>
                          <input readonly="text" name="username1" class="input"value="<?php echo $row['username1']?>">
                      </div>
                       <div class="inputfield">
                          <label for="nationalid">National ID</label>
                          <input type="text" name="nationalid" class="input"value="<?php echo $row['nationalid']?>" required>
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
                   <form>
 <input type="button" value="Back"class="btn btn-primary" onclick="history.back()">
</form>
                  
                 
                      
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
