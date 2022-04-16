<?php
session_start();
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LEM || Basket</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="assets/img/LEM_Logo.png" rel="icon" />
    <link href="assets/img/LEM_Logo.png" rel="apple-touch-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
      rel="stylesheet"
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
            <a class="nav-link scrollto" href="profile.php">Profile</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="booking.php">Book your service</a>
          </li>
          <li>
            <a class="active" class="nav-link scrollto" href="basket.php">Basket</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="">Orders</a
            >
          </li>
          <li>
            <a class="nav-link scrollto" href=""
              >Reciept</a>
           </li>
         
            <a class="nav-link scrollto" href="index.html #contact">Contact</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </header>
    <!-- End Header -->
  <br>
  <br>
  <br> 
   <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card m-b-30">
                <div class="card-header"> 
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
