<?php

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');

$id = $_POST['id'];
$query = "SELECT * FROM rider where riderid='$id'";
$query_run = mysqli_query($connection,$query)
 
 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
          <li class="dropdown"><a class="nav-link scrollto " href="#"><span>Orders</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
              <li><a href="release.php">Release Rider</a></li>
            <li><a href="vieworders.php">View Orders</a></li>
            
          </ul>
        </li>
          <li><a class="nav-link scrollto active" href="admin_crider.php">Riders</a></li>
          <li><a class="nav-link scrollto" href="reports.php">Reports</a></li>
          <li><a class="nav-link scrollto" href="editprofile.php">Edit Profile</a></li>
          <li><a class="nav-link scrollto" href="logouta.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </header>
    <!-- End Header -->

<section id="Registration-Rider">
  <div class="section-title">
       <?php
      
       while($row=mysqli_fetch_assoc( $query_run)){
         

      ?>     
              
              <div class="wrapper">
                  <h2>Profile</h2>
                  <div class="title">
                      Rider Profile
                  </div>
                  <div class="form">
                  <div class="inputfield">
                          <label for="riderid">RiderID</label>
                          <input type="text" name="riderid" class="input" value="<?php echo $row['riderid']?> ">
                      </div>  
                  <div class="inputfield">
                          <label for="firstname">First Name</label>
                          <input type="text" name="fname" class="input" value="<?php echo $row['firstname']?> ">
                      </div>
                      <div class="inputfield">
                          <label for="lastname">Last Name</label>
                          <input name="lname" class="input"
                          value="<?php echo $row['lastname']?> ">
                      </div>
                      <div class="inputfield">
                          <label for="username">User Name</label>
                          <input type="text" name="uname" class="input"
                          placeholder="<?php echo $row['username']?> ">
                      </div>
                      <div class="inputfield">
                          <label>National ID</label>
                          <input type="text" name="nid" class="input"
                          value="<?php echo $row['nationalid']?> ">
                      </div>
                      <div class="inputfield">
                          <label for="vehiclereg">Vehicle Registration Number</label>
                          <input type="text" name="vreg" class="input"
                          value="<?php echo $row['vregistration_no']?> ">
                      </div>
                       <div class="inputfield">
                          <label for="vehicletype">Vehicle Type</label>
                          <input type="text" name="vtype" class="input"
                          value="<?php echo $row['vehicle_type']?>">
                      </div>
                     
                      <div class="inputfield">
                          <label for="vehicleimg">Vehicle Image</label>
                          <input type="text" name="vtype" class="input"
                          value="<?php echo $row['vimg']?>">
                          
                      </div>
                      
                          
                      
                      <div class="inputfield">
                          <label for="email">Email Address</label>
                          <input type="email" name="email1" class="input"
                         value="<?php echo $row['email']?> ">
                      </div>
                      <div class="inputfield">
                          <label for="phoneno">Phone Number</label>
                          <input type="text" name="phno" class="input" 
                          value="<?php echo $row['phno']?> ">
                      </div>
                      <div class="inputfield">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="input"
                         placeholder="<?php echo $row['address']?> ">
                          
                      </div>
                      <div class="inputfield">
                          <label for="postalcode">Postal Code</label>
                          <input type="text" name="pcode" class="input"
                          value="<?php echo $row['pcode']?> ">
                      </div>
                      <form action="uconf.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['riderid'] ?>">
                   <th><input type="submit" name="confirm" class="btn btn-success" value="Unconfirm"></th>
                   

                 </form>
                    </div>   
                  </div>
                <?php
          }
         ?>  
        
          </div>
       </section>
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
