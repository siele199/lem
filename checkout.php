<?php
session_start();
if ($_SESSION['status'] != "Active") 
{
  header("location:Login.php");
}

echo $username;

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$username = $_SESSION['username1'];

$sql = "SELECT *FROM `users` where `username1`= '$username';";
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);
 
if(isset($_SESSION["basket_cart"])){
  $total=0;
  
  $ftotal=0;
   foreach($_SESSION["basket_cart"]as$keys=> $value)
  {
  $sql_bas="SELECT * FROM `includes` WHERE `includes_id`=$key";
   $result_bas=mysqli_query($connection,$sql_bas);
   $row_bas=mysqli_fetch_assoc($result_bas);
   $total= $total+($value["item_quantity"] * $value["item_price"]);
  
}

$pick=0;
$delivery=0;
 $pick=$_POST['pick'];
  $delivery=$_POST['delivery'];
  $ftotal= $total+$pick+$delivery;



if (isset($_POST['confirm'])) {

  $username = $_SESSION['username1'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dop = $_POST['dop'];
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $postalcode = $_POST['postalcode'];
  $payment=$_POST['payment'];
 
  $sqli = "UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`dop`='$dop',`phno`='$phno',`address`='$address',`postalcode`='$postalcode' WHERE username1= '" . $username . "'";
if(mysqli_query($connection,$sqli)){
if(isset($_SESSION["basket_cart"])){
  $total=0;
   foreach($_SESSION["basket_cart"]as$keys=> $value)
  {
  $sql_bas="SELECT * FROM `includes` WHERE `includes_id`=$key";
   $result_bas=mysqli_query($connection,$sql_bas);
   $row_bas=mysqli_fetch_assoc($result_bas);
   $total= $total+($value["item_quantity"] * $value["item_price"]);
    
}}

$insertord="INSERT INTO `order1`(`username`, `total_price`, `orderstatus`, `pickup`, `delivery`, `paymentmode`) VALUES ('$username','$ftotal','Order Placed','$pick','$delivery','$payment');";

 
if (mysqli_query($connection,$insertord)) {
  
  $orderid = mysqli_insert_id($connection);
   foreach($_SESSION["basket_cart"]as$keys=> $value){
   $sql_bas="SELECT * FROM `includes` WHERE `includes_id`=$key";  

   $iname=$value['item_name'];
   $price=$value['item_price'];
  $price_item=$value['item_quantity'] * $value['item_price'];
  $qty=$value['item_quantity'];
  $spec=$value['specification'];
$insertorderitems="INSERT INTO `basket1`(`orderid`,`includes_name`,`price`,`qty`,`total_price`,`specification`) VALUES ('$orderid','$iname','$price','$qty','$price_item','$spec');";
     $insertorderitems1=mysqli_query($connection,$insertorderitems);

}

  }
  
  else {
    echo "<script>alert('Error updating record:');</script> " . mysqli_error($connection);
  }

  if ($insertorderitems1) {
    echo "<script>alert('Order made successfully');</script>";
    header("location:orders.php");
  }
  else {
    echo "<script>alert('Error updating record:');</script> " . mysqli_error($connection);
  }
}

}
//echo"<pre>";
//print_r ($_SESSION["basket_cart"]);
//echo"</pre";
}
if (isset($_POST['editbasket'])) {
  header("location:booking.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head><script>
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
        <li><a class="nav-link scrollto active" href="booking.php">Book your service<i class="material-icons md-48">shopping_basket</i> <span id="basket-item" class="badge badge-pill-danger"><?php $bas = $_SESSION["basket_cart"];
$numb = count($bas);
echo($numb); ?></span></a></li>
          <li><a class="nav-link scrollto" href="orders.php">Orders</a></li>
          <li><a class="nav-link scrollto" href="">Reciept</a></li>
          
          <li><a class="nav-link scrollto" href="indexlog.php #contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
           
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      <br>

    </header>
    
</div>
 <div class="section-title">
<div class="col-md-12">
              
              <?php
      if ($resultCheck > 0){
       while($row=mysqli_fetch_assoc( $result)){

      ?>
              <div class="wrapper">
                  <h2>Confirm Your Credentials</h2>
                  <div class="title">
                      Billing Address
                  </div>
                   <form action = "" name = "RegForm" onsubmit = "return validate();"  method="post">
                 <div class="form">
                      <div class="inputfield">
                          <label for="firstname">First Name</label>
                          <input id="fname" type="text" name="fname" class="input"
                          
                          value="<?php echo $row['firstname']?>"readonly>
                          
                      </div>
                      <div class="inputfield">
                          <label for="lastname">Last Name</label>
                          <input id="lname" type="text" name="lname" class="input" value="<?php echo $row['lastname']?>"readonly>
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
                      <div class="inputfield">
                        <label for="Total">Basket Sub-Total</label>
                          <input type="text" name="total1" class="input" value="<?php echo $total?>">
                      </div>
                       <?php
  }
}
?>              
              <div class="row d-flex">
				    <label >Request Laundry Pick-up?</label>
						<div class="col-md-6">
							<input name="pick" value="100"  id="radio1" class="mr-2 css-checkbox" type="radio" checked>
							<div class="space20">Yes</div>
						</div>
						
						<div class="col-md-6">
							<input name="pick" value="0"  id="radio2" class="mr-2 css-checkbox" type="radio">
							<div class="space20">No</div>
							<p></p>
						</div>
				
                </div>
                <div class="row d-flex">
				    <label >Request Laundry Delivery?</label>
						<div class="col-md-6">
							<input name="delivery" value="100"  id="radio3" class="mr-2 css-checkbox" type="radio"checked>
							<div class="space20">Yes</div>
						</div>
						
						<div class="col-md-6">
							<input name="delivery" value="0"  id="radio4" class="mr-2 css-checkbox" type="radio">
							<div class="space20">No</div>
							<p></p>
						</div>
				
                </div>
           
                <div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
                <div class="payment-method mt-5">
             
				<div class="row d-flex">
				
						<div class="col-md-4">
							<input name="payment" value='Mpesa'  id="radio5" class="mr-2 css-checkbox" type="radio" checked>
            <div class="space20"></div><p>Mpesa</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value='COD'  id="radio6" class="mr-2 css-checkbox" type="radio">
							<div class="space20"></div>
							<p>Cash On Delivery</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value='Paypal'  id="radio3" class="mr-2 css-checkbox" type="radio">
							<div class="space20"></div>
							<p>PayPal</p>
						</div>
				
                </div><br><br>

                  
                   <div class="inputfield">
                         <button action="booking.php" type="submit" name="editbasket" value="submit" class="btn">Edit Basket</button>
                      </div>

                      <div class="inputfield">
                         <button action="" type="submit" name="confirm" value="submit" class="btn">Confirm</button>
                      </div>
                  </div>
                </form>
              </div>
</div>
          </div>
          </div>

                          

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