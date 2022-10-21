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


    <?php include 'pages/navbar.php'; ?>
    <style>
    /*** Hero Header ***/
    .hero-header {
        background: linear-gradient(rgba(15, 23, 43, .5), rgba(15, 23, 43, .5)), url(<?php echo $header_src; ?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid hero-header">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"  style="color: white;">Product Detail</h1>
            <div class="d-inline-flex">
            <p class="m-0"><a style="color: white;" href="">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">Products Details</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <?php
    $getallCp2 = getAllItemsByID($_REQUEST['pid']);
    $row3 = mysqli_fetch_assoc($getallCp2);

        $pid = $row3['pid'];
        $img = $row3['product_image'];
        $img_src = "server/uploads/products/" . $img;?>

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img style="width: 500px; height: 600px;" src="<?php echo $img_src; ?>" alt="Image">
                        </div>
                        <?php
                        $getall = getAllProductgalleryImagesByPID($pid);
                        while ($row = mysqli_fetch_assoc($getall)) {
                            $img = $row['products_image'];
                            $gallery_img_src = "server/uploads/gallery/" . $img; ?>
                        <div class="carousel-item">
                            <img style="width: 500px; height: 600px;" src="<?php echo $gallery_img_src; ?>" alt="Image">
                        </div>
                        <?php } ?>

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $row3['product_name']; ?></h3>

                <h3 class="font-weight-semi-bold mb-4 text-danger">Rs. <?php echo $row3['product_price']; ?></h3>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <?php 
                
                $size_id = $row3['size_id'];
                if(isset($row3['size_id'])) : 
                    $getsize = getAllsizeByID($size_id);
                    $row2 = mysqli_fetch_assoc($getsize);
                    ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="checkbox" class="custom-control-input " checked="checked" id="size-1"
                                name="size">
                            <label class="custom-control-label" for="size-1"><?php echo $row2['size_name']; ?></label>
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <?php 
                
                            $color_id = $row3['color_id'];
                            if(isset($row3['color_id'])) : 
                                $getColour = getAllColorByID($color_id);
                                $row2 = mysqli_fetch_assoc($getColour);
                                ?>
                            <span class=""
                                style=" height: 25px; width: 25px; margin-top: -1px !important;  background-color: <?php echo $row2['color_code']; ?>; border-radius: 50%; display: inline-block;"></span>
                            <?php endif; ?>

                        </div>

                    </form>
                </div>

                <p class="mb-4 mt-5"><?php echo $row3['product_highlight']; ?></p>

                <div class="d-flex mb-3">

                </div>
                <div class="d-flex mb-4">

                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="qty" id="qty" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button
                        onclick="addtoCartProductwithQty(<?php echo $pid; ?>, <?php echo $row3['product_price']; ?>)"
                        class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>

            </div>
        </div>

        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (<?php echo reviewCount($pid); ?> )</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <?php echo $row3['product_description']; ?>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?php echo reviewCount($pid); ?>  review for "<?php echo $row3['product_name']; ?>"</h4>
                                <?php 
                                $getall = getAllReviews($_REQUEST['pid']);

                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6><?php echo $row['review_name']; ?><small> - <i><?php echo $row['date_updated']; ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p><?php echo $row['review_review']; ?></p>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="review_review">Your Review *</label>
                                        <textarea id="review_review" cols="30" rows="5" name="review_review" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="review_name">Your Name *</label>
                                        <input type="text" class="form-control" id="review_name" name="review_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="review_email">Your Email *</label>
                                        <input type="email" class="form-control" id="review_email" name="review_email">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="pid" name="pid" value="<?php echo $pid; ?>">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input onclick="addReview(this.form)" type="button" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <?php include 'pages/suggestion.php'; ?>

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