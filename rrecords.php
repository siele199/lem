<?php
session_start();

if ($_SESSION['status'] != "Active") 
{
    header("location:Login_rider.php");
}
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$username = $_SESSION['username'];

$ride = "SELECT * FROM orderdeli INNER JOIN rider on rider.riderid=orderdeli.riderid INNER JOIN order1 on order1.id=orderdeli.orderid INNER JOIN users on users.username1=orderdeli.customer_user where order1.process='In Progress'AND order1.process='Completed'AND order1.process='Delayed' OR rider.username='$username' AND order1.delivered='1'  ORDER BY `rider`.`username` ASC";
$ride1 = mysqli_query($connection, $ride);


/*while ($row = mysqli_fetch_assoc($ride1)) {
 echo $row['orderid'];
 }*/
//SELECT * FROM `orderdeli` INNER JOIN `rider` on `rider`.`riderid`=`orderdeli`.`riderid` INNER JOIN `order1` on `order1`.`id`=`orderdeli`.`orderid` INNER JOIN `users` on `users`.`username1`=`orderdeli`.`customer_user` where `username`='Me'and `process`='In Progress'or'Completed'or'Delayed' 
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LEM LaundroMat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/LEM_Logo.png" rel="icon">
  <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0c1896e814.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
 <body>
    
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="indexlogrider.php">Home</a></li>
    <li><a class="nav-link scrollto"href="rider_panel.php">Rider Panel</a> </li>
    <li><a class="nav-link scrollto" href="rider_panel_log.php">Rider's Log</a></li>
    <li><a class="nav-link scrollto " href="rides.php">Rides</a></li>
    <li><a class="nav-link scrollto active" href="rrecords.php">Ride Records</a></li>
    <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
    </header>
    <section id="Registration-Rider">
              <div class="section-title">
                  
              
              <div class="wrapper">
                  <h2>Rides Panel</h2>
                  <div class="title">
                      Rider Jobs
                  </div>
</div>
           
                  


    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
			 <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
              <div class="table-wrap">
                <table class="table table-bordered table-dark table-hover" id="customers">
				<thead>
					<tr>
						<th>OrderID</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Delivery To</th>
                        <th>Delivery From</th>
						<th>Date</th>
                        
						
					</tr>
				</thead>
                 <?php
                 if (mysqli_num_rows($ride1) == 0) {
    echo "There are no Jobs avaliable Curently!";
}

while ($row = mysqli_fetch_assoc($ride1)) {

?><tr>
				<td><?php echo $row['orderid']; ?></td>
				<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                <td><?php echo $row['process']; ?></td>
				<td><?php if ($row['process'] == 'In Progress') {
        echo("LEM LaundroMat");
    }
    else {
        echo $row['dop'];
    }
    ; ?></td>
	<td><?php if ($row['process'] == 'In Progress') {
        echo $row['dop'];
    }
    else {
        echo("LEM LaundroMat");
    }
    ; ?></td>					
<td><?php echo $row['date']; ?></td>
                       
						
						
					
					<?php
}

?>
             </tr>      
				</tbody>
          </div></div></div></section>
              <!-- ======= Footer ======= -->
   
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