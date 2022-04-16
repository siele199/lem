<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:Login.php");
}

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$username = $_SESSION['username1'];
/*echo("this it");
echo($username);*/
session_start();
if (isset($_POST["add_to_basket"] ))
{
  if(isset($_SESSION["basket_cart"]))
  {
   $item_array_id = array_column($_SESSION["basket_cart"],"item_id");
    if(!in_array($_GET["includes_id"], $item_array_id)){
      $count = count($_SESSION["basket_cart"]);
       $item_array = array(
        'item_id' =>$_GET["includes_id"],
        'item_name'=>$_POST["hname"],
        'item_price'=>$_POST["hprice"],
        'item_quantity'=>$_POST["qty"],
        'specification'=>$_POST["specification"]
        
        );
       $_SESSION["basket_cart"][$count] = $item_array;


    }else{
      echo'<script>alert ("Item Already Added")</script>';
      

    }


  }else{
    $item_array = array(
        'item_id'=>$_GET["includes_id"],
        'item_name' =>$_POST["hname"],
        'item_price'=>$_POST["hprice"],
        'item_quantity'=>$_POST["qty"],
        'specification'=>$_POST["specification"]
        
        );
    
    $_SESSION["basket_cart"][0]= $item_array;
  }
$bas=$_SESSION["basket_cart"];






}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["basket_cart"] as $keys => $value)
    {
      if($value["item_id"] == $_GET["includes_id"])
      {
        unset($_SESSION["basket_cart"][$keys]);
        echo'<script>alert ("Item Removed")</script>';
        echo'<script>window.location="booking.php"</script>';
      }
    }
  }

}


if(isset($_POST['check'])){
$username = $_SESSION['username1'];


header("location:checkout.php");

}






  $get = "SELECT * FROM `laundryoption` where `status`=1 ";
  

  $get1=mysqli_query($connection,$get);
  

  if (mysqli_num_rows($get1) == FALSE)
  {
    #echo "There are no laundry option to be displayed";
  }
 
  $kid =$_GET['id'];
  $cat = "SELECT * FROM `includes`where `laundryid`=$kid and  `status`=1 ";
  
$cat1=mysqli_query($connection,$cat);
if (mysqli_num_rows($cat1) == FALSE)
  {
    #echo "There are no laundry option to be displayed";
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
          <li><a class="nav-link scrollto" href="receipts.php">Reciept</a></li>
          
          <li><a class="nav-link scrollto" href="indexlog.php #contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
          
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      <br>

    </header>
    
</div>
    <!-- End Header -->
    <!-- Booking -->
    <section id="bookingpage" class="services">
      <div id="message"></div>
      <script>
        var x = document.getElementById("menu");
        x.addEventListener("click", myFunction);
        function component($lid) {
          
        }

        function myFunction() {
          document.getElementById("menu").style.display = "block";
         
        }
      </script>
      


      <div class="container">
        
        <div class="section-title">
          <h2>Book your service</h2>
        </div>

        <div class="section-title">
          <p><strong>Choose services</strong></p>
        </div>
 
        <div class="row" >
           
           <div
            class=" d-flex  justify-content-around " >
         <?php
      while($row=mysqli_fetch_assoc($get1)){
        
        
        ?>
        <?php '<a href="?id=' . $row['laundryid'] . '"></a>'?>
            <div  class="icon-box" <?php '<a href="?id='.$row['laundryid'].'"></a>'?>onclick="myFunction()">
            
              <div class="icon" onclick="myFunction()">
                
                <img src="<?php echo $row['laundry_img'] ?>"/>
              </div>
              <h4 class="title">
                <p onclick="myFunction()"><?php echo '<a href="?id='.$row['laundryid'].'">'.$row['laundry_title'].'</a>'?> </p onclick="myFunction()">

              </h4>
              <p class="description" onclick="myFunction()">
                <?php echo $row['laundry_des']?>
               
              </p>
            </div>
            
            <?php
          }
         ?>  
          </div>
        </div>
          
        
        

        <div id="menu" class="sub-menu">
          <h2 class=" d-flex  justify-content-around ">Laundry Type</h2>
        
          <div class="row">
            
            <div
              class="col-md-12 d-flex justify-content-around mb-5 mb-lg-0"
            >
             
             <?php
            
              
            
      while($row=mysqli_fetch_assoc($cat1)){
        ?>
              <div class="icon-box">
                <form method="post" action="booking.php?includes_id=<?php echo $row['includes_id']; ?>">
                
                <div class="icon"><img src="<?php echo $row['img']?>"/></i></div>
                <h4 class="title"><p><?php echo $row['includes_name']?></p></h4>
                <p class="description">Ksh<?php echo $row['includes_price']?></p>
                <input type="number" name="qty" class="input" value="1">
                <p>Cloth specification</p>
                 <input type="text" name="specification" class="input" placeholder="Optional">
            <input type="hidden" name="hname"  value="<?php echo $row['includes_name'];?>">
            <input type="hidden" name="hprice"  value="<?php echo $row['includes_price'];?>">
    
                 <input type="submit" name="add_to_basket" style="margin-top:5px;"class="btn btn-success" value="Add to Basket" >
                 
                 <div>
                  
                
                </div>
      
     </form>
              </div>
              <?php
          }
         ?>
         
            </div>

            
            
          </div>
        </div>
       
        <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card m-b-30">
                <div class="card-header">
                  <h5 class="card-title">Basket</h5>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                      <div class="basket-container">
                        <div class="basket-head">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  
                                  <th width="20%">Laundry Item</th>
                                  <th width="10%">Quantity</th>
                                  <th width="15%">Price</th>
                                  <th width="15%">Total Price</th>
                                  <th width="15%">Action</th>
                      
                                </tr>
                                 </thead>
                                <?php
                                if(!empty($_SESSION["basket_cart"])){
                                $total = 0;  
                          foreach($_SESSION["basket_cart"]as$keys=> $value)
                                  {
                        $sql="SELECT * FROM `includes` WHERE `includes_id`=$key";
                        
                                 ?>
                                   
            <tr>
                      <td><?php echo $value['item_name'];?></td>
                    <td type="number"><?php echo $value['item_quantity'];?></td>
                    <td>Ksh<?php echo $value['item_price']; ?></td></td>
 <td>Ksh<?php echo number_format($value['item_quantity'] * $value['item_price'],2);?></td>
<td><a href="booking.php?action=delete&includes_id=<?php echo $value['item_id']; ?>"><input type="submit" class="btn btn-danger" value="Remove"></a></td>
                                  </tr>
                               <?php 
$total= $total+($value["item_quantity"] * $value["item_price"]); 
                              }
                             ?> 
<tr>
  <td colspan="3" align="right">Total</td>
  <td align="right">Ksh<?php echo number_format($total, 2);?></td>
  <td><form action="booking.php" method="post">
    <input type="hidden" name="usern" value="$username">
    <input type="submit" name="check" value="Proceed to Checkout"  class="btn btn-success">
                            </form>
  </td>
</tr>
<?php $value['specification'];?>
                             <?php

                                }
                                ?>
                              
                            </table>
                          
    </section>
    <!-- Booking -->
     <?php
#$a=var_dump($_SESSION['basket_cart']);

?>
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
