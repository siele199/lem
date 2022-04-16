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


$msg = "";
if (isset($_POST['add'])) {

  $laundrytitle = $_POST['laundrytitle'];
  $laundryimg = $_POST['laundryimg'];
  $laundrydes = $_POST['laundrydes'];
  $add_query = "INSERT INTO `laundryoption`( `laundry_title`, `laundry_img`, `laundry_des`) VALUES ('$laundrytitle','$laundryimg', '$laundrydes')";
  $check_query = "SELECT * FROM `laundryoption` WHERE laundry_title='$laundrytitle'";
  $check_res = mysqli_query($connection, $check_query);
  try {
    $add_result = mysqli_query($connection, $add_query);
    if ($add_result) {
      if (mysqli_affected_rows($connection, $add_result) > 0) {
        $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Add Successful.
                      </div>';
        header('location:viewcategory.php');
      }
      else {
        $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> Laundry Option is Available.
                      </div>';
      }
    }
  }
  catch (Exception $ex) {
    echo("error" . $ex->getMessage());
  }
  if (mysqli_num_rows($check_res) > 0) {
    $msg = '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong>  Laundry Option is Available.
                      </div>';

  }

  else {
    $signup_res = mysqli_query($connection, $signup_query);
    $msg = '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong>Add Successful.
                      </div>';
    header('location:viewcategory.php');
  }

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
   function validate() {
   
      if( document.RegForm.laundrytitle.value == "" ) {
         alert( "Please provide a laundry name!" );
         document.RegForm.laundrytitle.focus() ;
         return false;
      }
        

      if( document.RegForm.laundryimg.value == "" ) {
         alert( "Please provide an icon url!" );
         document.RegForm.laundryimg.focus() ;
         return false;
      }
        
      if( document.RegForm.laundrydes.value == "" ) {
         alert( "Please provide a laundry description!" );
         document.RegForm.laundrydes.focus() ;
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
           <li class="dropdown"><a class="nav-link scrollto active"href="#"><span>Laundry</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a active href="addcategory.php">Add Category</a></li>
            
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
     <section id="Add_Laundry">
          <?php echo $msg; ?>
              <div class="section-title">
               <form action = "addcategory.php" name ="RegForm" onsubmit = "return validate();"  method="post" enctype="multipart/form-data">
                  
              <div class="wrapper">
                  <h2>Admin Panel</h2>
                  <div class="title">
                      Add Laundry Category
                  </div>
                  <div class="form">
                  <div class="inputfield">
                          <label for="Laundry Name">Laundry Name</label>
                          <input type="text" name="laundrytitle" class="input">
                      </div>
                       <div class="inputfield">
                          <label for="Laundry Icon Tag">Icon Url</label>
                          <input type="text" name="laundryimg" class="input">
                      </div>
                       <div class="inputfield">
                          <label for="Laundry description">Laundry description</label>
                          <input type="text" name="laundrydes" class="input">
                      </div>
              <div class="inputfield">
                         <button type="submit" name="add" value="submit" class="btn">Add</button>
                      </div>
                      </div>
              </div>
               </form>
              </div>
</section>
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