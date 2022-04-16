<?php
session_start();

if ($_SESSION['status'] != "Active") 
{
    header("location:Login_admin.php");
}
try {
    $connection = mysqli_connect("localhost:3308", "root", "root", "lem");

}
catch (mysqli_sql_exception $ex) {
    echo("error in connection");
}
$username = $_SESSION['username'];
$sql = "SELECT *FROM `admin` where `username`= '$username';";
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);
if (isset($_POST['update'])) {

    $username = $_SESSION['username'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dop = $_POST['dop'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];



    $sql = "UPDATE `admin` SET `firstname`='$fname',`lastname`='$lname',`password`='$pass'WHERE username= '" . $username . "'";


    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Record updated successfully');</script>";
    }
    else {
        echo "<script>alert('Error updating record:');</script> " . mysqli_error($connection);
        echo($sql);
    }
}
if (isset($_POST['add'])){
    header("addadmin.php");
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
    
    }

     </script>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Admin</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
    />

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="admin_panel.php">Home</a></li>
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
          <li><a class="nav-link scrollto active" href="editprofile.php">Edit Profile</a></li>
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
                  <h2><?php echo $row['username']?>'S Profile</h2>
                  
                   <form action = "editprofile.php"  name = "RegForm" onsubmit = "return validate();"  method="post">
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
                          <label for="password">Password</label>
                          <input type="password" name="pass" class="input" placeholder="Enter New Password" required>
                      </div>
                      <div class="inputfield">
                          <label>Confirm Password</label>
                          <input type="password" name="pass1" class="input" placeholder="Confirm new password" required>
                      </div>
                      
                      
                       <?php
  }
}
?>
                      
                      <div class="inputfield">
                         <button type="submit" name="update"  class="btn" >Change</button>
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
