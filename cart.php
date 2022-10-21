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
    <?php include 'pages/auth.php'; ?>
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
    <div class="container-fluid mb-5 hero-header">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color: white;">Our Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: white;" href="index.php">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <?php
                $getall = getAllCart($_SESSION['customer']);
                $count = mysqli_num_rows($getall);
                if($count > 0){ ?>
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">


                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                    $getall = getAllCart($_SESSION['customer']);
                    $total = 0;

                    while ($row = mysqli_fetch_assoc($getall)) {
                        $pid = $row['pid'];
                        $sub_total = $row['qty'] * $row['price'];
                        $total = $total + $sub_total;
                        $final_amount = $total +$res['shpping_fee'];

                        $img = $row['product_image'];
                        $img_src = "server/uploads/products/" . $img; ?>
                        <tr>
                            <td class="align-middle"><img src="<?php echo $img_src; ?>" alt="" style="width: 50px;">
                            </td>
                            <td class="align-middle"><?php echo $row['product_name']; ?></td>
                            <td class="align-middle">Rs. <?php echo $row['product_price']; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button
                                            onclick="qtryChange('<?php echo $row['cart_id']; ?>', 'qty' , 0 ,'<?php echo $row['qty']; ?>');"
                                            class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="qty" id="qty <?php echo $row['cart_id']; ?>"
                                        class="form-control form-control-sm bg-secondary text-center"
                                        value="<?php echo $row['qty']; ?>">
                                    <div class="input-group-btn">
                                        <button
                                            onclick="qtryChange('<?php echo $row['cart_id']; ?>', 'qty', 1 ,'<?php echo $row['qty']; ?>');"
                                            class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">Rs. <?php echo $total; ?>.00</td>
                            <td class="align-middle"><button
                                    onclick="cartDelete(<?php echo $row['cart_id']; ?>, 'cart', 'cart_id')"
                                    type="button" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>
                
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rs. <?php echo $total; ?>.00</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs. <?php echo $res['shpping_fee']; ?>.00</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rs. <?php echo $final_amount; ?>.00</h5>
                        </div>
                        <a href="checkout.php?total=<?php echo $final_amount; ?>"
                            class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout Rs.
                            <?php echo $final_amount; ?>.00</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
                <h1 class="p-5">Cart is empty</h1>
                <?php } ?>
    </div>
    <!-- Cart End -->


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