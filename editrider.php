<?php
   session_start(); 
   if($_SESSION['status']!="Active")
{
    header("location:Login_admin.php");
}
try{
 $connection=mysqli_connect("localhost:3308","root","root","lem");

 }catch(mysqli_sql_exception $ex){
  echo("error in connection");
 }
 
$username= $_POST['username'];
    $sql="SELECT *FROM `rider` where `username`= '$username';";
    $result = mysqli_query($connection, $sql);
    $resultCheck=mysqli_num_rows($result);
     
if (isset($_POST['update']))
{
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $username = $_POST['uname'];
  $nationalid = $_POST['nid'];
  $vehiclereg = $_POST['vreg'];
  $vehicletype = $_POST['car'];
  $vimg = $_FILES['file']['name'];
  $password = $_POST['pass'];
  $password = md5($password);
  $email = $_POST['email1'];
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $postalcode = $_POST['pcode'];
  move_uploaded_file($_FILES['file']['tmp_name'], "picture/" . $_FILES['file']['name']);

$query = "UPDATE `rider` SET `firstname`='$firstname',`lastname`='$lastname',`nationalid`='$nationalid',`vregistration_no`='$vehiclereg',`vehicle_type`='$vehicletype',`vimg`='$vimg',`password`='$password',`email`='$email',`phno`='$phno',`address`='$address',`pcode`='$postalcode' where `username`= '".$username."' ";

$query_run = mysqli_query($connection,$query);

if($query_run){
  echo '<script type= "text/javascript">alert("Data Updated")</script>';
  header("location:admin_crider.php");
}else{
  echo '<script type= "text/javascript">alert("Data Not Updated")</script>';
}

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

      if( document.RegForm.pcode.value == "" ) {
         alert( "Please provide your Postal Code!" );
         document.RegForm.pcode.focus() ;
         return false;
      }


   }
  
</script>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM ||Customer Registration</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
    />
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
          <li><a class="nav-link scrollto active" href="admin_crider.php">Riders</a></li>
          <li><a class="nav-link scrollto" href="reports.php">Reports</a></li>
          <li><a class="nav-link scrollto" href="editprofile.php">Edit Profile</a></li>
          <li><a class="nav-link scrollto" href="logouta.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
    </header>
    <section id="Registration-Rider">
      <?php
      if ($resultCheck > 0){
       while($row=mysqli_fetch_assoc( $result)){

      ?>
              <div class="section-title">
              
              <form action ="editrider.php"name="RegForm" onsubmit = "return validate();"  method="post" enctype="multipart/form-data">     
              
              <div class="wrapper">
                  <h2>Rider Log</h2>
                  <div class="title">
                      Rider Log
                  </div>
              <div class="wrapper">
              
                  <div class="form">
                      <div class="inputfield">
                          <label for="firstname">First Name</label>
                          <input type="text" name="fname" class="input" value="<?php echo $row['firstname']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="lastname">Last Name</label>
                          <input name="lname" class="input"
                          value="<?php echo $row['lastname']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="username">User Name</label>
                          <input readonly type="text" name="uname" class="input"
                          value="<?php echo $row['username']?>">
                      </div>
                      <div class="inputfield">
                          <label>National ID</label>
                          <input type="text" name="nid" class="input"
                          value="<?php echo $row['nationalid']?>">
                      </div>
                      <div class="inputfield">
                          <label for="vehiclereg">Vehicle Registration Number</label>
                          <input type="text" name="vreg" class="input"
                          value="<?php echo $row['vregistration_no']?>">
                      </div>
                      <div class="inputfield">
                          <label for="vehicletype">Vehicle Type</label>
                          <div class="custom_select">
                              <select name="car">
                                  <option value="<?php echo $row['vehicle_type']?>">Select</option>
                                  <option value="Motorbike">Motorbike</option>
                                  <option value="TukTuk">TukTuk</option>
                                  <option value="Saloon Car">Saloon Car</option>
                                  <option value="Truck">Truck</option>
                              </select>
                          </div>
                      </div>
                     <div class="inputfield">
                          <label for="vimg">Vehicle Image</label>
                          <input type="file" name="file" class="input">
                      </div>
                    <div class="inputfield">
                          <label for="vimg">Vehicle Img</label>
                          <input readonly type="text" name="vimg" class="input"
                          value="<?php echo $row['vimg']?>">
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
                          <label for="email">Email Address</label>
                          <input type="email" name="email1" class="input"
                         value="<?php echo $row['email']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="phoneno">Phone Number</label>
                          <input type="text" name="phno" class="input" 
                          value="<?php echo $row['phno']?>" required>
                      </div>
                      <div class="inputfield">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="input"
                         value="<?php echo $row['address']?>" required>
                          
                      </div>
                      <div class="inputfield">
                          <label for="postalcode">Postal Code</label>
                          <input type="text" name="pcode" class="input"
                          value="<?php echo $row['pcode']?>" required>
                      </div>
                      
                     <form>
 <input type="button" value="Back"class="btn btn-primary" onclick="history.back()">
</form>
<div class="inputfield">
                         <button type="submit" name="update" class="btn">Update</button>
                      </div>
                      
                  </div>
                   
          </div></form>
         
        </div>
        <?php
          }}
         ?>
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