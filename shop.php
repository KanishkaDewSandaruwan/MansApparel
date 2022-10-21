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
    <!-- Topbar Start -->
    <?php include 'pages/topbar.php'; ?>
    <!-- Topbar End -->


         <!-- Navbar Start -->
         <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
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
                                <?php } } } ?>

                            </div>
                        </div>

                        <?php } } ?>
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
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="shop.php" class="nav-item nav-link active">Shop</a>
                            <a href="contact.php" class="nav-item nav-link ">Contact</a>
                            <a href="about.php" class="nav-item nav-link ">About Us</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->

    <style>
    /*** Hero Header ***/
    .hero-header {
        background: linear-gradient(rgba(15, 23, 43, .5), rgba(15, 23, 43, .5)), url(<?php echo $header_src; ?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
    <div class="container-fluid mb-5 hero-header">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color: white;">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: white;" href="index.php">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-3 col-sm-12">


                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" onchange="window.location.href='shop.php'" id="color-all" class="custom-control-input" <?php if(!isset($_REQUEST['id']) || $_REQUEST['field'] != 'color_id'){ echo "checked";} ?> >
                            <label class="custom-control-label" for="color-all">All Color</label>
                            <span class="badge border font-weight-normal"><?php echo dataCountwithCondition("products" , "WHERE is_deleted = '0' AND product_active = '1'") ?></span>
                        </div>
                        <?php 
                            $getall = getAllColor();

                            while($row=mysqli_fetch_assoc($getall)){
                                $color_id = $row['color_id'];;?>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" <?php if(isset($_REQUEST['id']) && $_REQUEST['id'] == $color_id && $_REQUEST['field'] == 'color_id'){ echo "checked";} ?>  onchange="checkSelection(<?php echo $row['color_id']; ?>, 'color_id')" id="color_id<?php echo $row['color_id']; ?>"  class="custom-control-input">
                            <label class="custom-control-label" for="color_id<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></label>
                            <span class="badge border font-weight-normal"><?php echo dataCountwithCondition("products" , "WHERE is_deleted = '0' AND product_active = '1' AND color_id = '".$color_id."'") ?></span>
                        </div>

                        <?php } ?>

                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" onchange="window.location.href='shop.php'" <?php if(!isset($_REQUEST['id']) || $_REQUEST['field'] != 'size_id'){ echo "checked";} ?> id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal"><?php echo dataCountwithCondition("products" , "WHERE is_deleted = '0' AND product_active = '1'") ?></span>
                        </div>
                        <?php 
                            $getall = getAllsize();

                            while($row=mysqli_fetch_assoc($getall)){
                                $size_id = $row['size_id'];;?>

                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" <?php if(isset($_REQUEST['id']) && $_REQUEST['id'] == $size_id && $_REQUEST['field'] == 'size_id'){ echo "checked";} ?> class="custom-control-input"  onchange="checkSelection(<?php echo $row['size_id']; ?>, 'size_id')" id="size_id<?php echo $row['size_id']; ?>">
                            <label class="custom-control-label" for="size_id<?php echo $row['size_id']; ?>"><?php echo $row['size_name']; ?></label>
                            <span class="badge border font-weight-normal"><?php echo dataCountwithCondition("products" , "WHERE is_deleted = '0' AND product_active = '1' AND size_id = '".$size_id."'") ?></span>
                        </div>
                        <?php } ?>

                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
              
                    </div>

                    <?php
                    if(isset($_REQUEST['id']) && isset($_REQUEST['field'])){
                        $getallCp2 = getItemsCondition($_REQUEST['id'], $_REQUEST['field']);
                    }else if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] != ""){
                        $getallCp2 = getAllItemsByCategory($_REQUEST['cat_id']);
                    }else{
                        $getallCp2 = getAllAvailableItems();
                    }

                    while ($row3 = mysqli_fetch_assoc($getallCp2)) {
                     
                            
                            $pid = $row3['pid'];
                            $img = $row3['product_image'];
                            $img_src = "server/uploads/products/" . $img; ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid img-thumbnail" style="width: 100%; height: 300px;" src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $row3['product_name']; ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rs. <?php echo $row3['product_price']; ?>.00</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?pid=<?php echo $pid; ?>" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <button
                                    onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row3['product_price']; ?>)"
                                    type="button" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

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