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

$iid = $_POST['id'];
echo$iid;

$sql = "SELECT * FROM `basket1` WHERE `orderid`= '$iid';";
$result = mysqli_query($connection, $sql);
$rider="SELECT * FROM `rider` WHERE `approve`='1'AND `available`= '0'";
$rider1=mysqli_query($connection,$rider);
$rider2 = "SELECT * FROM `rider` WHERE `approve`='1'AND `available`= '0'";
$rider3 = mysqli_query($connection, $rider2);


$customeruser="SELECT * FROM `order1` WHERE `id`='$orderid';";
$customeruser1=mysqli_query($connection,$customeruser);
while ($user = mysqli_fetch_assoc($customeruser1)){
$oid=$user['id'];
$username=$user['username'];
$mode = $user['paymentmode'];
$progress = $user['process'];
}

if(isset($_GET['id'])){
    $iid=$_GET['id'];
}

if (isset($_POST['add'])) {
    $iid=$_POST['id'];
    $status1 = $_POST['status'];
    $riderid = $_POST['riderid'];
    $orderid=$_POST['nationalid'];
    $username = $_POST['username'];    
    $mode = $_POST['paymentmode'];    
    $progress = $_POST['process'];
    $note = trim($_POST['note']);
    $updateo = "UPDATE `order1` SET `process`='$status1' WHERE `id`='$orderid';";
    $query_run1 = mysqli_query($connection, $updateo);
    $insert="INSERT INTO `ordertracking`(`orderid`,`status`,`reason`) VALUES ('$orderid','$status1','$note');";
    $insert1 = mysqli_query($connection, $insert);
    echo $insert;

   
    $updater = "UPDATE `rider` SET `available`='1' WHERE `riderid` = '$riderid';";
    $query_run = mysqli_query($connection, $updater);
    //echo $updater;
   
        
    

    if ($query_run) {
        
        $riderid = $_POST['riderid'];
        $note = trim($_POST['note']);
       $orderider="INSERT INTO `orderdeli`(`orderid`, `customer_user`, `riderid`, `note`, `paymentmode`) VALUES ('$orderid','$username','$riderid','$note','$mode');";
       $orderider1 = mysqli_query($connection, $orderider);
       echo $orderider;
       echo '<script type= "text/javascript">alert("Data Updated")</script>';
    }
    else {
        echo '<script type= "text/javascript">alert("Datax Not Updated")</script>';
    }

header("location:vieworders.php");
}
?>
<!DOCTYPE html>
<html lang="en"><meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM || Booking Page</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
    />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
          <li class="dropdown" ><a class="nav-link scrollto active" href="#"><span>Orders</span> <i class="bi bi-chevron-down"></i></a>
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
      <!-- .navbar -->
      <br>

    </header>
    
</div>
<div class="container text-white">
    <h2 class='text-center text-white'>My Account</h2>
    <form method="post">
    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
               
                  
				<div class="row">
				 
					<div class="col-md-12">

			 <div class="wrapper">
                  <div class="title">
                    Order: <?php echo $iid?>
                  </div></div>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>OrderID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
						<th>Total Price</th>
                        <th>Specification</th>
						
					</tr>
				</thead>
				<tbody>
                    <?php

while ($row = mysqli_fetch_assoc($result)) {

?>
					<tr>
						<td><?php echo $row['orderid']; ?></td>
						<td><?php echo $row['includes_name']; ?></td>
						<td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo $row['total_price']; ?></td>
                        <td><?php echo $row['specification']; ?></td>
						
						
					</tr>
					
                   <?php
}
?>
				</tbody>
                 <?php

$out = "SELECT * FROM `order1` WHERE `id`='$iid';";
$out1 = mysqli_query($connection, $out);
while ($row = mysqli_fetch_assoc($out1)) { ?>
           
                    
                    <tr>
                              
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Transport</th>
                        <th><?php echo $row['pickup'] + $row['delivery']; ?></th>
                        
					
					</tr>
                        <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Total Price</th>
                        <th><?php echo $row['total_price']; ?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Order Status</th>
                        <th><?php echo $row['orderstatus']; ?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Laundry Status</th>
                        <th><?php echo $row['process']; ?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Date</th>
                        <th><?php echo $row['date']; ?></th>
						
					</tr>
                    </tfooter>
                    <div class="inputfield">
                          <input type="hidden" name="nationalid" class="input" value="<?php echo $row['id']; ?>">
                      </div>
                   
                 <?php
}

?> <div>
                        <?php
                        $query = "SELECT * FROM order1 JOIN users on order1.username=users.username1  where order1.id='$iid'ORDER BY `order1`.`id` DESC";
                         $query1= mysqli_query($connection,$query);
                         while ($row = mysqli_fetch_assoc($query1)) {?>
 <input type="hidden" name="username" class="input" value="<?php echo $row['username']; ?>">
 <input type="hidden" name="paymentmode" class="input" value="<?php echo $row['paymentmode']; ?>">
 <input type="hidden" name="process" class="input" value="<?php echo $row['process']; ?>">
                         <?php }
                        ?>
                    </div>
			</table>
        
             <div class="inputfield">
                          <label for="status" style="color:black;">Order Progress</label>
                          <div class="custom_select">
                              <select class="form-control"name="status">
                                  <option><?php echo $progress;?></option>
                                  <option value="In Progress">In Progress</option>
                                  <option value="Completed">Completed</option>
                                  <option value="Delayed">Delayed</option>
                                  
                              </select>
                          </div>
            <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
              <div class="table-wrap">
                  <h3 style="color:black;text-align:center;">Available Riders</h3>
                <table class="table table-bordered table-dark table-hover" id="customers">
                   <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Vehicle Type</th>
                  <th>Email</th>
                  <th>Phone No.</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php
     
       while($row=mysqli_fetch_assoc( $rider1)){

      ?>
                <tr>
                 <td><?php echo $row['riderid']; ?></td>
                 <td><?php echo $row['username']; ?></td>
                 <td><?php echo $row['vehicle_type']; ?></td>
                 <td><?php echo $row['email']; ?></td>
                 <td><?php echo $row['phno']; ?></td>
             
                
                </tr>
                <?php } ?>
              </tbody>
                </table>

                  
             <div class="inputfield">
                 
                          <label for="riderid" style="color:black;">Rider ID</label>
                          <div class="custom_select">
                              <select class="form-control" name="riderid">
                                  <?php
                               while($row=mysqli_fetch_assoc($rider3)) {  ?>
                                  <option><?php echo $row['riderid']; ?></option>
                                  <?php
                                     }
                                     ?>
                              </select>
                          </div>	
            <h3 style="color:black;text-align:center;:">Note</h3>
                    <div>
                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                     
                   <div class="inputfield">
                        <div class="col-md-12 text-center">
                            <br>
                            <div class="inputfield">
                            <input type="hidden" name="orderid" value='<?php $iid?>' >
                         
                      </div>

                        </div>

                    </div>
               
         <div>
             <input type="hidden" name="id" value="<?php $iid ?>">
		<input type="submit" name="add" class="btn btn-success" value="Add rider" >
</div>
                 </form>

			
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

    
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframeworks.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Template Main JS File -->
        
  </body>
</html>



