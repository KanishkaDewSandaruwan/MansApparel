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

<?php include 'pages/auth.php'; ?>
    <?php include 'pages/topbar.php'; ?>
    <?php include 'pages/navbar.php'; ?>


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
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color: white;">Orders</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: white;" href="index.php">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">Orders</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Orders Start -->
    <div class="container-fluid pt-5">
        <div class="row p-5">
        <?php 
    $getall = getAllOrders();

    while($row=mysqli_fetch_assoc($getall)){ 
        $order_id = $row['order_id'];
        ?>
                <article class="card mt-5 w-100">
                    <header class="card-header text-white bg-primary">
                        Orders / Tracking </header>
                    <div class="card-body">
                        <h6>Order ID: #<?php echo $row['order_id']; ?> </h6>
                        <article class="card">
                            <div class="card-body row">

                                <div class="col"> <strong>Shipping To:</strong>
                                    <br><?php echo $row['shipping_address']; ?>
                                </div>
                                <div class="col"> <strong>Billing To:</strong>
                                    <br><?php echo $row['billing_address']; ?>
                                </div>
                                <div class="col"> <strong>Current Status:</strong>
                                    <br>
                                    <?php if($row['order_status'] == 1){
                                echo 'Order confirmed';
                            }else if($row['order_status'] == 2){
                                echo 'Prepare Order';
                            } else if($row['order_status'] == 3){
                                echo 'Shipped Order';
                            } else if($row['order_status'] == 4){
                                echo 'Deliverd';
                            } else if($row['order_status'] == 5){
                                echo 'Canceled';
                            } ?>
                                </div>
                                <div class="col"> <strong>Tracking #:</strong> <br>
                                    <?php if($row['tracking'] != 'Pending'){ echo $row['tracking']; }else{echo "Pending";}?>
                                </div>
                                <div class="col"> <strong>Order Purchase Date:</strong>
                                    <br><?php echo $row['date_updated']; ?>
                                </div>
                            </div>
                        </article>
                        <?php if($row['order_status'] != 5) {?>
                        <div class="track">

                            <div
                                class="step <?php if($row['order_status'] == 1 || $row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                <span class="text">Order confirmed</span>
                            </div>
                            <div
                                class="step <?php if($row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                                <span class="icon"> <i class="fa fa-user"></i> </span>
                                <span class="text">Prepare Order</span>
                            </div>
                            <div
                                class="step <?php if($row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                                <span class="icon"> <i class="fa fa-truck"></i> </span>
                                <span class="text"> Shipped Order </span>
                            </div>
                            <div class="step <?php if($row['order_status'] == 4) {echo 'active';}?>">
                                <span class="icon"> <i class="fa fa-box"></i> </span>
                                <span class="text">Deliverd</span>
                            </div>
                        </div>
                        <?php } ?>
                        <hr>
                        <ul class="row">
                            <?php 
                            $getdetails = getAllOrderItemsBYOrder($row['order_id']);

                            while($row2=mysqli_fetch_assoc($getdetails)){
                                
                                $img = $row2['product_image'];
                                $img_src = "server/uploads/products/".$img;?>
                            <li class="col-md-4">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="<?php echo $img_src; ?>" class="img-sm border">
                                    </div>
                                    <figcaption class="info align-self-center">
                                        <p class="title"><?php echo $row2['product_name']; ?> <br>
                                            <?php echo $row2['product_highlight']; ?></p> <span class="text-muted">Rs.
                                            <?php echo $row2['product_price']; ?> </span>
                                    </figcaption>
                                </figure>
                            </li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <div class="row">

                            <?php if ($row['order_status'] != "5") { ?>
                            <div class="col-md-3">
                                <label for="order_status" class="form-label">Order Cancel</label>

                                <select
                                    onchange='updateDataFromHome(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                                    id="order_status <?php echo $order_id; ?>" class='form-control norad tx12'
                                    name="order_status" type='text'>
                                    <option value="1" <?php if ($row['order_status']=="1") echo "selected"; ?> disabled>
                                        Make Order Back
                                    </option>
                                    <option value="2" <?php if ($row['order_status']=="2") echo "selected"; ?> disabled>
                                        Prepare Order
                                    </option>
                                    <option value="3" <?php if ($row['order_status']=="3") echo "selected"; ?> disabled>
                                        Shipped Order
                                    </option>
                                    <option value="4" <?php if ($row['order_status']=="4") echo "selected"; ?> disabled>
                                        Deliverd
                                    </option>
                                    <option value="5" <?php if ($row['order_status']=="5") echo "selected"; ?>>
                                        Canceled
                                    </option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </article>
                <?php } ?>
        </div>
    </div>
    <!-- Orders End -->
    

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