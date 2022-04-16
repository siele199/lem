<?php

session_start();
if ($_SESSION['status'] != "Active") 
{
  header("location:Login.php");
}

echo $username;

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$username = $_SESSION['username1'];
$iid =$_GET['id'];
$sql = "SELECT * FROM `basket1` WHERE `orderid`= '$iid';";
$result = mysqli_query($connection, $sql);
$sql1 = "SELECT *FROM `users` where `username1`= '$username';";
$result1 = mysqli_query($connection, $sql1);

if(isset($_POST['cancel'])){
    $orderid=$_POST['orderid'];
    $status='cancelled';
    $reason=trim($_POST['reason']);
    

$insertcancel="INSERT INTO `ordertracking`(`orderid`,`status`,`reason`) VALUES ('$iid','$status','$reason')";
echo $insertcancel;
if(mysqli_query($connection,$insertcancel)){
    
 $upsql="UPDATE `order1` SET `orderstatus`='Cancelled' WHERE `id`='$iid'";
 $updated=mysqli_query($connection,$upsql);
 echo$up_sql;
}
 else {
    echo "<script>alert('Error updating record:');</script> " . mysqli_error($connection);
  }
echo "<script>alert('Order $iid has been cancelled');</script> " ;
header("location:orders.php");
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
           <li><a class="nav-link scrollto" href="indexlog.php">Home</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
        <li><a class="nav-link scrollto" href="booking.php">Book your service<i class="material-icons md-48">shopping_basket</i> <span id="basket-item" class="badge badge-pill-danger"><?php $bas = $_SESSION["basket_cart"];
$numb = count($bas);
echo($numb); ?></span></a></li>
          <li><a class="nav-link scrollto active" href="orders.php">Orders</a></li>
          <li><a class="nav-link scrollto" href="">Reciept</a></li>
          
          <li><a class="nav-link scrollto" href="indexlog.php #contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
           
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      <br>

    </header>
    
</div>
<div class="container text-white">
    <h2 class='text-center text-white'>My Account</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">
<form method="post">
			<h3>Cancel Order</h3>
			<br>
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
                    while($row=mysqli_fetch_assoc($result)){
                         
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
                 $username = $_SESSION['username1'];
              $out = "SELECT * FROM `order1` WHERE `id`='$iid';";
              $out1= mysqli_query($connection, $out);
                 while($row=mysqli_fetch_assoc($out1)){ ?>
           
                    
                    <tr>
                              
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Transport</th>
                        <th><?php echo $row['pickup']+$row['delivery']; ?></th>
                        
					
					</tr>
                        <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Total Price</th>
                        <th><?php echo $row['total_price'];?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Order Status</th>
                        <th><?php echo $row['orderstatus'];?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Laundry Status</th>
                        <th><?php echo $row['process'];?></th>
						
					</tr>
                     <tr>
						<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th>Date</th>
                        <th><?php echo $row['date'];?></th>
						
					</tr>
                    </tfooter>
                 <?php
                   }
                    ?>
               
			</table>		
                    </div>
                    <h3 style="color:black;text-align:center;:">Reason</h3>
                    <div>
                        <textarea class="form-control" name="reason" id="reason" cols="30" rows="10"></textarea>
                    </div>
                   <div class="inputfield">
                        <div class="col-md-12 text-center">
                            <br>
                            <div class="inputfield">
                            <input type="hidden" name="orderid" value='<?php $iid?>' >
                         <button action="" type="submit" name="cancel" value="submit" class="btn">Cancel</button>
                      </div>

                        </div>

                    </div>
                </form>

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default</p>

			<div class="row  bg-white text-dark px-5 py-3">
				<div class="col-md-12">
                    
								<h4>Billing And Shipping Address <a href="profile.php">Edit</a></h4>
                                <?php
                    while($rows=mysqli_fetch_assoc($result1)){
                    ?>
					<p>
						<?php echo $rows['dop']; ?><br>
						<?php echo $rows['email']; ?><br>
						<?php echo $rows['phno']; ?><br>
						<?php echo $rows['address']; ?><br>
						<?php echo $rows['postalcode']; ?><br>
						 
						
					</p>
                    <?php
                    }
                ?>
				</div>

				
			</div>



			</div>

					</div>
				</div>
			</div>
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



