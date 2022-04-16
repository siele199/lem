<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:Login.php");
}


$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$username = $_SESSION['username1'];

$contact= "SELECT * FROM `users`where username1='$username'";

$contactus= mysqli_query($connection,$contact);

$name = $_POST['fname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$mess = $_POST['mess'];

if (isset($_POST['submit'])){
  
$send="INSERT INTO issues (`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$mess');";
$send1=mysqli_query($connection,$send);
echo$send;
}
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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0c1896e814.js" crossorigin="anonymous"></script>
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
  <header id="header" class="fixed-top d-flex justify-content-center align-items-center header-transparent">

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#home">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About Us</a></li>
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a href="profile.php" data-after="Welcome  <?php echo htmlspecialchars($username) ?>"><?php echo htmlspecialchars($username) ?>'s Profile </a></li>
         
        <li><a class="nav-link scrollto" href="#works">How we do it</a></li>

        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>

    </nav>
  </header>
  <section id="home">
    <div class="home-container">
      <h1>Reliable Laundry 
And Household 
Cleaning Services</h1>
      <h2>It is all about giving you back your free time. You should
never have to 'clean' up for the 'cleaners' again.</h2>
      <a href="#about" class="btn-scroll scrollto" title="Scroll Down"><i class="bx bx-chevron-down"></i></a>
    </div>
  </section>

  <main id="main">
    <section id="about" class="about ">
      <div class="container">

        <div class="section-title">
          <span>About Us</span>
          <h2>About Us</h2>
          <p><strong>Customer Centric 
Laundry Company</strong></p>
        </div>

        <div class="row">
          <div class="image col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start"></div>
          <div class="col-lg-8 d-flex flex-column align-items-stretch"style="max-height: 500px;">
            <div class="content ps-lg-4 d-flex flex-column justify-content-center">
              </div>
              <div class="row">
                <p>At The LEM Laundromat Company, we adopt a new and inventive strategy to two of life’s every day tasks: washing and cleaning. We are a practical, earth cognizant business, with a mission to keep garments clean while not disregarding your wellbeing, and that of our planet. Our areas are perfect vitality controlled, and our high-effectiveness washers spare a lot of water and power.
We utilize just non-poisonous, biodegradable, sans phosphate cleansers, making our wash and overlap totally ok for you and the earth. Our eco cordial cleaning process does without the standard business harmful solvents, making it the most advantageous, most secure approach to think about your dry-clean-just things.
Since we opened in 2022, our following has developed to incorporate a network of both private and corporate clients who grasp our idea and reasoning. Our customers go from well being focused organizations, to workmanship displays and mold brands.
Join the development, drop by and make proper acquaintance!
</p>
               
              </div>
              <div class="row mt-n4">
                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile" style="color: #20b38e;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Client Visits Today</strong> This was our today's visit count</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtextr" style="color: #8a1ac2;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Deliveries Made Today</strong> Today we delivered to our most important people. </p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock" style="color: #2cbdee;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Years of experience</strong> We are quite proficient in your laundry </p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award" style="color: #ffb459;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Awards</strong> </p>
                  </div>
                </div>
              </div>
            </div>
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Our Services</span>
          <h2>Our Services</h2>
          <p>At LEM LaundroMat we offer only the best for our customers. Below are some of our services</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-closet"></i></div>
              <h4 class="title"><a href="">Laundry Service</a></h4>
              <p class="description">A full laundry service best for the specific laundry with options of custom selection</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-home"></i></div>
              <h4 class="title"><a href="">Household Cleaning</a></h4>
              <p class="description">Have the weekend to yourself and let us take care of your household laundry in full</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-basket"></i></div>
              <h4 class="title"><a href="">Dry Cleaning</a></h4>
              <p class="description">Executive dry cleaning for specific fabric which we consider before cleaning</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-money"></i></div>
              <h4 class="title"><a href="">Online Payment</a></h4>
              <p class="description">Mpesa payment is available</p>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-truck"></i></div>
              <h4 class="title"><a href="">Fast Delivery</a></h4>
              <p class="description">We offer delivery to and fro our laundry station</p>
            </div>
          </div>

        </div>

      </div>
    </section>
        <section id="works" class="works">
       <div class="section-title">
      <span>How we function</span>
      
      
      
          
          </div>
      <div class="container position-relative">

        <div class="works-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            

            <div class="swiper-slide">
              <div class="work-item">
                <img src="https://img.icons8.com/dotty/100/000000/click-and-collect.png"/>
                <h3>We collect</h3>
               
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  We make a collection on your laundry or you drop off your laundry at our station
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><

            <div class="swiper-slide">
              <div class="work-item">
                <img src="https://img.icons8.com/wired/100/000000/washing-machine.png"/>
                <h3>Laundry Operation</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  We carry out the laundry service demanded
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="work-item">
                <img src="https://img.icons8.com/ios/100/000000/iron.png"/>
                <h3>Ironing and Folding</h3>
                
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  We perform ironing on the fabric if need be
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="work-item">
                <img src="https://img.icons8.com/ios/100/000000/truck.png"/>
                <h3>We deliver</h3>
                
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 We finally deliver the laundry or you pick up                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <span>Pricing</span>
          <h2>Pricing</h2>
          <p>Below are our current pricing packages</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box">
              <h3>Price indicated</h3>
              <h4><sup>Ksh</sup>0<span> / month</span></h4>
              
                <p>This is the single laundry package that involves the laundry option selected for a specific laundry</p>
           
              <div class="btn-wrap">
                <a href="booking.php" class="btn-buy">Book Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured">
              <h3>Home Laundry Package</h3>
              <h4><sup>Ksh</sup>2,500<span> / month</span></h4>
              <ul>
                <li>4 Sets of Beddings</li>
                <li>20 Upper body clothing </li>
                <li>20 Lower body clothing</li>
                <li>20 Pairs of socks</li>
                <li>Baby clothing</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Book Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Commercial Laundry Package</h3>
              <h4><sup>Ksh</sup>5,000-10,000<span> / month</span></h4>
              Package requires an agreement, book to get the offer
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Book Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <span class="advanced">Advanced</span>
              <h3>Function Laundry Package</h3>
              <h4><sup>Ksh</sup>10,000<span> / month</span></h4>
              Package requires an agreement, book to get the offer 
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Book Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <section id="contact" class="contact">
      <div class="container">
        

        <div class="section-title">
          <span>Contact Us</span>
          <h2>Contact Us</h2>
          <p>Reach Us via our contact pages</p>
        </div>

        <div class="row">

          <div class="col-lg-12">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-share-alt"></i>
                  <h3>Social Profiles</h3>
                  <div class="social-links">
                    
                    <a href="https://www.instagram.com/_.siele_/" class="instagram"><i class="bi bi-instagram"></i></a>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                 <a href = "mailto: evanssiele6@gmail.com"><i class="bx bx-envelope"></i></a>
                  
                  <h3>Email</h3>
                  <p>evanssiele6@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <a href = "tel:+254702482705"><i class="bx bx-phone-call"></i></a>
                  <h3>Call At</h3>
                  <p>+254702482705</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
           
            

        </div>
        
      </div>
    </section><

  </main>
  <footer id="footer">
    <div class="container">
      <h3>LEM LaundroMat</h3>
      <p>Reliable Laundry 
And Household 
Cleaning Services.</p>
      <div class="social-links">
        
      
        <a href="https://www.instagram.com/_.siele_/" class="instagram"><i class="bx bxl-instagram"></i></a>
        
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>LEM LaundroMat</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframeworks.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>