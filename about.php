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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

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
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="about.php" class="nav-item nav-link active">About Us</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color: white;">About Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: white;" href="index.php">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">About Us</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">About Us</span></h2>
        </div>
           <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <?php 
                    $getall = getAllgalleryImages();

                    while($row=mysqli_fetch_assoc($getall)){

                        $gallery_id = $row['gallery_id'];
                        $img = $row['gallery_image'];
                        $img_src = "server/uploads/about/".$img;?>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo $img_src; ?>">
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4"><?php echo $res['about_title']; ?></h1>
                <p class="mb-4"><?php echo $res['about_desc']; ?></p>

            </div>
        </div>
    </div>
    <!-- Contact End -->

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