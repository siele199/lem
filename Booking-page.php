<?php

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$query = "SELECT * FROM laundryoption";

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
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header
      id="header"
      class="fixed-top d-flex justify-content-center align-items-center"
    >
      <nav id="navbar" class="navbar">
        <ul>
          <li>
            <a class="nav-link scrollto" href="">Profile</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="">Book your service</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="">Orders</a
            >
          </li>
          <li>
            <a class="nav-link scrollto" href=""
              >Reciept</a
            >
         
            <a class="nav-link scrollto" href="index.html #contact">Contact</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </header>
    <!-- End Header -->
    <!-- Booking -->
    <section id="bookingpage" class="services">
      <script>
        var x = document.getElementById("menu");
        x.addEventListener("click", myFunction);
        function myFunction() {
          document.getElementById("menu").style.display = "block";
          document.getElementById("menua").style.display = "none";
          document.getElementById("menub").style.display = "none";
        }
      </script>
      <script>
        var x = document.getElementById("menua");
        x.addEventListener("click", myFunctiona);
        function myFunctiona() {
          document.getElementById("menua").style.display = "block";
          document.getElementById("menub").style.display = "none";
          document.getElementById("menu").style.display = "none";
        }
      </script>
      <script>
        var x = document.getElementById("menub");
        x.addEventListener("click", myFunctionb);
        function myFunctionb() {
          document.getElementById("menua").style.display = "none";
          document.getElementById("menub").style.display = "block";
          document.getElementById("menu").style.display = "none";
        }
      </script>

      <div class="container">
        <div class="section-title">
          <h2>Book your service</h2>
        </div>

        <div class="section-title">
          <p><strong>Choose services</strong></p>
        </div>

        <div class="row">
          <!-- Service1 -->
          <div
            class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          >
            <div class="icon-box" onclick="myFunction()">
              <div class="icon">
                <img src="https://img.icons8.com/dotty/50/000000/washing-machine.png"/>
              </div>
              <h4 class="title">
                <p href="">Washing</p>
              </h4>
              <p class="description">
                Complementary Washing 
              </p>
            </div>
          </div>
          <!-- End Service1 -->
          <!-- Service2 -->
          <div
            class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
          >
            <div class="icon-box" onclick="myFunctiona()">
              <div class="icon">
                <img src="https://img.icons8.com/ios-filled/32/000000/dry.png"/>
              </div>
              <h4 class="title">
                <a href="">Dry Cleaning</a>
              </h4>
              <p class="description">Best suited for Tuxedos</p>
            </div>
          </div>
          <!-- End Service2 -->

          <!-- Service3 -->
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" onclick="myFunctionb()">
              <div class="icon">
                <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/50/000000/external-car-wash-automobile-kiranshastry-lineal-kiranshastry-2.png"/>
              </div>
              <h4 class="title">
                <a href="">Car wash</a>
              </h4>
              <p class="description">Choose car wash option</p>
            </div>
          </div>
        </div>
        <!-- End Service3 -->
        
        
        
          
        <!-- Service1 clothing -->

        <div id="menu" class="sub-menu">
          <h2>Cloth type</h2>
          <div class="row">
            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-justicon-lineal-justicon/32/000000/external-jacket-autumn-clothes-justicon-lineal-justicon.png"/></i></div>
                <h4 class="title"><a href="">Jacket</a></h4>
                <p class="description">Ksh30</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-photo3ideastudio-flat-photo3ideastudio/32/000000/external-sweater-winter-photo3ideastudio-flat-photo3ideastudio.png"/></i></div>
                <h4 class="title"><a href="">Sweater</a></h4>
                <p class="description">Ksh30</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/ios/32/000000/trousers.png"/></i></div>
                <h4 class="title"><a href="">Trouser</a></h4>
                <p class="description">Ksh20</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-smashingstocks-hand-drawn-black-smashing-stocks/32/000000/external-shirt-clothes-and-accessories-smashingstocks-hand-drawn-black-smashing-stocks-3.png"/></i></div>
                <h4 class="title"><a href="">Shirt</a></h4>
                <p class="description">Ksh20</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-dress-clothes-dreamstale-lineal-dreamstale-1.png"/></i></div>
                <h4 class="title"><a href="">Dress</a></h4>
                <p class="description">Ksh30</p>
              </div>
            </div>
</div>
            
          </div>
          <div id="menua" class="sub-menu">
             <h2>Cloth type</h2>
          <div class="row">
            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/32/000000/external-suit-wedding-xnimrodx-lineal-color-xnimrodx.png"/></i></div>
                <h4 class="title"><a href="">2 piece suit</a></h4>
                <p class="description">Ksh250</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/32/000000/external-suit-wedding-xnimrodx-lineal-color-xnimrodx.png"/></i></div>
                <h4 class="title"><a href="">3 piece suit</a></h4>
                <p class="description">Ksh300</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-photo3ideastudio-flat-photo3ideastudio/50/000000/external-dress-travel-checklist-photo3ideastudio-flat-photo3ideastudio.png"/></i></div>
                <h4 class="title"><a href="">Dress</a></h4>
                <p class="description">Ksh300</p>
              </div>
            </div>
</div>
            
          </div>
<div id="menub" class="sub-menu">
             <h2>Car wash selection</h2>
          <div class="row">
            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/ios-filled/50/000000/automatic-car-wash.png"/></i></div>
                <h4 class="title"><a href="">Full car wash</a></h4>
                <p class="description">Ksh1000</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-phatplus-lineal-phatplus/50/000000/external-engine-car-racing-phatplus-lineal-phatplus.png"/></i></div>
                <h4 class="title"><a href="">Engine Wash</a></h4>
                <p class="description">Ksh500</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/ios/45/000000/automatic-car-wash.png"/></i></div>
                <h4 class="title"><a href="">Body Wash</a></h4>
                <p class="description">Ksh300</p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box">
                <div class="icon"><img src="https://img.icons8.com/external-wanicon-lineal-wanicon/50/000000/external-chassis-car-service-wanicon-lineal-wanicon.png"/></i></div>
                <h4 class="title"><a href="">Under Wash</a></h4>
                <p class="description">Ksh500</p>
              </div>
            </div>
</div>
            
          </div>

        </div>
        <div
          class="basket-container"
          class="fixed-right d-flex justify-content-right align-items-right"
        >
          <div class="contentbar">
            <!-- Start row -->

            <!-- Start col -->
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
                            <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Action</th>
                                  <th scope="col">Photo</th>
                                  <th scope="col">Product</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Price</th>
                                  <th scope="col" class="text-right">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>
                                    <a href="#" class="text-danger"
                                      ><i class="ri-delete-bin-3-line"></i
                                    ></a>
                                  </td>
                                  <td>
                                    <img
                                      src="https://themesbox.in/admin-templates/olian/html/light-vertical/assets/images/ecommerce/product_01.svg"
                                      class="img-car"
                                      width="35"
                                      alt="product"
                                    />
                                  </td>
                                  <td>Car wash</td>
                                  <td>
                                    <div class="form-group mb-0">
                                      <input
                                        type="number"
                                        class="form-control basket-qty"
                                        name="basketQty1"
                                        id="basketQty1"
                                        value="1"
                                      />
                                    </div>
                                  </td>
                                  <td>Ksh10</td>
                                  <td class="text-right">Ksh100</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>
                                    <a href="#" class="text-danger"
                                      ><i class="ri-delete-bin-3-line"></i
                                    ></a>
                                  </td>
                                  <td>
                                    <img
                                      src="https://themesbox.in/admin-templates/olian/html/light-vertical/assets/images/ecommerce/product_02.svg"
                                      class="img-fluid"
                                      width="35"
                                      alt="product"
                                    />
                                  </td>
                                  <td>Dry cleaning</td>
                                  <td>
                                    <div class="form-group mb-0">
                                      <input
                                        type="number"
                                        class="form-control basket-qty"
                                        name="basketQty2"
                                        id="basketQty2"
                                        value="1"
                                      />
                                    </div>
                                  </td>
                                  <td>Ksh20</td>
                                  <td class="text-right">Ksh200</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>
                                    <a href="#" class="text-danger"
                                      ><i class="ri-delete-bin-3-line"></i
                                    ></a>
                                  </td>
                                  <td>
                                    <img
                                      src="https://themesbox.in/admin-templates/olian/html/light-vertical/assets/images/ecommerce/product_03.svg"
                                      class="img-fluid"
                                      width="35"
                                      alt="product"
                                    />
                                  </td>
                                  <td>Washing</td>
                                  <td>
                                    <div class="form-group mb-0">
                                      <input
                                        type="number"
                                        class="form-control basketqty"
                                        name="basketQty3"
                                        id="basketQty3"
                                        value="1"
                                      />
                                    </div>
                                  </td>
                                  <td>Ksh30</td>
                                  <td class="text-right">Ksh300</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="basket-body">
                          <div class="row">
                            <div
                              class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6"
                            >
                              <div class="order-note">
                                <form>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Coupon Code"
                                        aria-label="Search"
                                        aria-describedby="button-addonTags"
                                      />
                                      <div class="input-group-append">
                                        <button
                                          class="input-group-text"
                                          type="submit"
                                          id="button-addonTags"
                                        >
                                          Apply
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="specialNotes"
                                      >Special Note for this order:</label
                                    >
                                    <textarea
                                      class="form-control"
                                      name="specialNotes"
                                      id="specialNotes"
                                      rows="3"
                                      placeholder="Message here"
                                    ></textarea>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div
                              class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6"
                            >
                              <div class="order-total table-responsive">
                                <table
                                  class="table table-borderless text-right"
                                >
                                  <tbody>
                                    <tr>
                                      <td>Sub Total :</td>
                                      <td>Ksh1000.00</td>
                                    </tr>
                                    <tr>
                                      <td>Shipping :</td>
                                      <td>Ksh0.00</td>
                                    </tr>
                                    <tr>
                                      <td>Tax(18%) :</td>
                                      <td>Ksh180.00</td>
                                    </tr>
                                    <tr>
                                      <td class="f-w-7 font-18">
                                        <h4>Amount :</h4>
                                      </td>
                                      <td class="f-w-7 font-18">
                                        <h4>Ksh1180.00</h4>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="basket-footer text-right">
                          <button type="button" class="btn btn-info my-1">
                            <i class="ri-save-line mr-2"></i>Update basket
                          </button>
                          <a
                            href="page-checkout.html"
                            class="btn btn-success my-1"
                            >Proceed to Checkout<i
                              class="ri-arrow-right-line ml-2"
                            ></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End col -->
            <!-- End row -->
          </div>
        </div>
      </div>
    </section>
    <!-- Booking -->
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
          &copy; Copyright LEM LaundroMat
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
