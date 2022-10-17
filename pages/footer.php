

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Man's</span>Apparel</h1>
                </a>
                <p><?php echo $res['header_desc']; ?></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $res['company_address']; ?></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $res['company_email']; ?></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $res['company_phone']; ?></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">

                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Shopping</h5>
                        <form action="">
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Shop Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Man's Apparel. All rights reserved.
                  , Created By A.G.A.P.C.AKMEEMANA
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->



        
    <script src="https://kit.fontawesome.com/6e8b05f9c5.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
    <script src="admin/js/include/alerts.js"></script>
    <script src="admin/js/include/validation.js"></script>
    <script src="admin/js/include/homejs.js"></script>
    <script src="admin/js/include/upload.js"></script>
    <script src="admin/js/include/add.js"></script>
    <script src="admin/js/include/delete.js"></script>

    <script src="admin/js/admin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- toast -->
        <script src="admin/assets/plugin/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="admin/assets/plugin/iziToast-master/dist/css/iziToast.min.css">
    <!-- endbuild -->