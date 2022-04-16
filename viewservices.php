<?php
session_start();

if ($_SESSION['status'] != "Active") 
{
    header("location:Login_admin.php");
}
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');

$query = "SELECT includes.includes_id, includes.img, includes.includes_name, includes.includes_price, includes.status, includes.laundryid,laundryoption.laundryid,laundryoption.laundry_title FROM includes INNER JOIN laundryoption ON includes.laundryid = laundryoption.laundryid";

$result = $connection->query($query);


if (isset($_POST['check'])) {
    $on = "UPDATE `laundryoption` SET `status`= 1 WHERE 'laundryid'= '$id'";
    $on_run = mysqli_query($connection, $on);
}
if (isset($_POST['off'])) {
    $off = "UPDATE `laundryoption` SET `status`= 0 WHERE 'laundryid'= '$id'";
    $off_run = mysqli_query($connection, $off);
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
     <div class="section-title">
              <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
              <div class="wrapper">
                  <h2>Admin Panel</h2>

                  <div class="title">
                     Laundry Items
                  </div>
                  </div>
              
                <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
              <div class="table-wrap">
                <table class="table table-bordered table-dark table-hover" id="customers">
                   <thead>
                <tr>
                  <th>ID</th>
                  <th>Item Name</th>
                  <th>Image url</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Action</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php
     
       while($row=mysqli_fetch_assoc($result)){
       
      ?>
                <tr>
                <td><?php echo $row["includes_id"]; ?></td>
                 <td><?php echo $row["includes_name"]; ?></td>
                 <td><?php echo $row["img"]; ?></td>
                 <td><?php echo $row["includes_price"]; ?></td>   
                 <td><?php echo $row["laundry_title"]; ?></td> 
                       
              <form action="deletei.php" method="post">
<input type="hidden" name="includesid" value="<?php echo $row["includes_id"]?>">
                   <th><input type="submit" name="delete" class="btn btn-danger" value="Delete" ></th>

                 </form>
                 <form action="viewservice.php" method="post">
<input type="hidden" name="id" value="<?php echo $row["includes_id"] ?>">
                   <th><input type="submit" name="about" class="btn btn-success" value="About" ></th>
                  
                 </form>
                <td> <?php
    if($row["status"]==1){
                 echo '<p><a href="statusa.php?id='.$row['includes_id'].'&status=0" class="btn btn-success">Enable</a></p>';
                 }else{
                 echo '<p><a href="statusa.php?id='.$row['includes_id'].'&status=1" class="btn btn-danger">Disable</a></p>';
                 }
                 ?>
                </td>
                </tr>
                <?php } ?>
              </tbody>
                </table>

                  
          </div></div></section>
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
