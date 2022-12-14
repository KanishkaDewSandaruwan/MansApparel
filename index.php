<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Man's Apparel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include 'pages/topbar.php'; ?>
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <?php 
                        $getall = getAllParentCategory();
                        while($row=mysqli_fetch_assoc($getall)){ 
                            $cat_id = $row['cat_id'];

                            $getallCp2 = getAllSubCategory($cat_id);
                            if( $row2 = mysqli_fetch_assoc($getallCp2)){

                            $getallCp3 = getAllItemsByParentCategory($row2['cat_id']);
                            $getallCp2 = getAllSubCategory($cat_id);

                            if (mysqli_fetch_assoc($getallCp2) && mysqli_fetch_assoc($getallCp3)) {
                                ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><?php echo $row['cat_name']; ?> <i
                                    class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">

                                <?php 
                                    $getallCat = getAllSubCategory($cat_id);

                                    while($row3 = mysqli_fetch_assoc($getallCat)){ 
                                        $cat_id2 = $row3['cat_id'];

                                    $getallCp3 = getAllItemsByParentCategory($cat_id2);
                                    if ($row4 = mysqli_fetch_assoc($getallCp3)) {
                                        ?>
                                <a href="shop.php?cat_id=<?php echo $cat_id2; ?>"
                                    class="dropdown-item"><?php echo $row4['cat_name']; ?></a>
                                <?php } } ?>

                            </div>
                        </div>

                        <?php } } } ?>
                        <!-- <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a> -->
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="about.php" class="nav-item nav-link">About Us</a>
                        </div>
                    </div>
                </nav>

                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                    $getall = getAllSlideShow();
                    $count =1;
                    while ($row = mysqli_fetch_assoc($getall)) {
                        $img = $row['slideshow_image'];
                        $img_src = "server/uploads/slideshow/" . $img;

                    ?>
                        <div class="carousel-item <?php if($count == 1) echo 'active'; ?> " style="height: 410px;">
                            <img class="img-fluid" src="<?php echo $img_src; ?>" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3"><?php echo $res['header_title']; ?></h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4"><?php echo $row['slideshow_title']; ?></h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <?php  $count++; } ?>

                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->





    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php 
        $getallCat = AllSubCategory();

        while($row = mysqli_fetch_assoc($getallCat)){ 
            $cat_id = $row['cat_id'];
            $img = $row['cat_image'];
            $img_src = "server/uploads/category/".$img;

        $result = getAllItemsByParentCategory($cat_id);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            ?>
            <div class="col-lg-2 col-md-3 col-sm-12 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right"><?php echo $count; ?> Products</p>
                    <a href="shop.php?cat_id=<?php echo $cat_id; ?>"
                        class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="<?php echo $img_src; ?>" alt="">
                    </a>
                    <h6 class="font-weight-semi-bold m-0"><?php echo $row['cat_name']; ?></h6>
                </div>
            </div>
            <?php } } ?>

        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="<?php echo $banner_01_src; ?>" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3"><?php echo $res['banner_01_desc']; ?></h5>
                        <h1 class="mb-4 font-weight-semi-bold"><?php echo $res['banner_01_title']; ?></h1>
                        <a href="shop.php" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img width="50%" src="<?php echo $banner_02_src; ?>" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3"><?php echo $res['banner_02_desc']; ?></h5>
                        <h1 class="mb-4 font-weight-semi-bold"><?php echo $res['banner_02_title']; ?></h1>
                        <a href="shop.php" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->



    <?php
    $getallCp2 = getAllItemsLatest();
    while ($row3 = mysqli_fetch_assoc($getallCp2)) {
        $pid = $row3['pid'];
        $img = $row3['product_image'];
        $img_src = "server/uploads/products/" . $img;
        $count = mysqli_num_rows($getallCp2);
        if($count > 0 || $count < 6){ ?>

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
        $getallCp2 = getAllItemsLatest();
        while ($row3 = mysqli_fetch_assoc($getallCp2)) {
            $pid = $row3['pid'];
            $img = $row3['product_image'];
            $img_src = "server/uploads/products/" . $img;?>

            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid img-thumbnail" style="width: 100%; height: auto;"
                            src="<?php echo $img_src; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"> <?php echo $row3['product_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs. <?php echo $row3['product_price']; ?>.00</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?pid=<?php echo $pid; ?>" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <!-- Products End -->
    <?php } } ?>



    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3 ">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ">
                <div class="d-flex align-items-center border mb-4 border border-primary " style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ">
                <div class="d-flex align-items-center border mb-4 border border-primary " style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ">
                <div class="d-flex align-items-center border mb-4 border border-primary " style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ">
                <div class="d-flex align-items-center border mb-4 border border-primary " style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Our Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
            $getallCp2 = getAllAvailableItems();
            $count = 0;
            while ($row3 = mysqli_fetch_assoc($getallCp2)) {
                $pid = $row3['pid'];
                $img = $row3['product_image'];
                $img_src = "server/uploads/products/" . $img;
                if($count < 6){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid img-thumbnail" style="width: 100%; height: auto;"
                            src="<?php echo $img_src; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"> <?php echo $row3['product_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs. <?php echo $row3['product_price']; ?>.00</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?pid=<?php echo $pid; ?>" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <button onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row3['product_price']; ?>)"
                            type="button" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </div>
                </div>
            </div>
            <?php } $count++; } ?>


        </div>
    </div>
    <!-- Products End -->



    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <?php include 'pages/footer.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>