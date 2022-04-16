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
$id = $_POST['id'];

$query = "SELECT * FROM includes INNER JOIN laundryoption ON includes.laundryid = laundryoption.laundryid WHERE `includes_id`='" . $id . "';";


$query_run = mysqli_query($connection, $query);

$id = $_POST['id'];

if (isset($_POST['edit'])) 

{
  $connection = mysqli_connect("localhost:3308", "root", "root", "lem");
  
  $category = $_POST['category'];  
  $iname = $_POST['iname']; 
   $img = $_POST['img'];
   $price= $_POST['price'];
   $includeid = $_POST['iid'];
  
  $sql = "UPDATE `includes` SET  `includes_name`='$iname',`img`='$img',`includes_price`='$price'WHERE `includes_id`='".$includeid."' ";
  $query1 = mysqli_query($connection, $sql);
  echo($sql);
  if ($connection->query($sql) === TRUE) {
    echo '<script> alert("Laundry Updated"); </script>';
    header("Location:viewservices.php");
  }
  else {
    echo '<script> alert("Laundry Not Updated"); </script>';
  }
}




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
        <li class="dropdown"><a class="nav-link scrollto active"href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
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
    <section id="Admin Panel">
              
                  
               
      <div class="section-title">
      <form action = "viewservice.php" method="post">
              <div class="wrapper">
                  <h2>Admin Panel</h2>
                  <div class="title">
                      Laundry Option
                  </div>
             
                  <div class="form">
                    <?php

while ($row = mysqli_fetch_assoc($query_run)) {


?>     
                  <div class="inputfield">
                          <label for="laundrycategory">Laundry Category</label>
                          <input hidden="text" name="iid" class="input" value="<?php echo $row['includes_id']?>">
                          <input readonly type="text" name="category" class="input" value="<?php echo $row['laundry_title']?>">
                      </div>
                <div class="inputfield">
                          <label for="itemname">Item Name</label>
                          <input type="text" name="iname" class="input"
                          value="<?php echo $row['includes_name']?> ">
                      </div>  
                <div class="inputfield">
                          <label for="img">Image Url</label>
                          <input type="text" name="img" class="input"
                          value="<?php echo $row['img']?> ">
                      </div>  
                <div class="inputfield">
                          <label for="price">Price</label>
                          <input type="text" name="price" class="input"
                          value="<?php echo $row['includes_price']?>">
                      </div> 
                      <div class="inputfield">
                         <button type="submit" name="edit" class="btn">Save and Exit</button>
                      </div>
               
                
                  <?php
}
?>
                    

                  </div>
                 
                       
</div></div>
             
                
             </form> 
                  
          </div>
        
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