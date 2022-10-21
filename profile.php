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
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color: white;">Profile</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: white;" href="">Home</a></p>
                <p class="m-0 px-2" style="color: white;">-</p>
                <p class="m-0" style="color: white;">Profile</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <?php 
$getall = getAllcustomerById($_SESSION['customer']);
$row=mysqli_fetch_assoc($getall);
$customer_id = $row['customer_id']; ?>

    <!-- Profile Start -->
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex flex-column justify-content-center bg-primary h-100 p-5">
                    <div class="d-inline-flex border  p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>Full Name</h4>
                            <p class="m-0 text-white"><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                    <div class="d-inline-flex border  p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>Email</h4>
                            <p class="m-0 text-white"><?php echo $row['email']; ?></p>
                        </div>
                    </div>
                    <div class="d-inline-flex border  p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>Phone Number</h4>
                            <p class="m-0 text-white"><?php echo $row['phone']; ?></p>
                        </div>
                    </div>
                    <div class="d-inline-flex border  p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>Address</h4>
                            <p class="m-0 text-white"><?php echo $row['address']; ?></p>
                        </div>
                    </div>
                    <div class="d-inline-flex border p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>NIC</h4>
                            <p class="m-0 text-white"><?php echo $row['nic']; ?></p>
                        </div>
                    </div>
                    <div class="d-inline-flex border  p-2 mb-4">
                        <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h4>Gender</h4>
                            <p class="m-0 text-white">
                                <?php if ($row['gender']=="1") echo "Male"; else echo "Female"; ?></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 mb-5 my-lg-12 py-5 pl-lg-5 bg-white">
                <div class="contact-form">
                    <div id="success"></div>
                    <div class="col-md-12 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-primary">Profile Settings</h4>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="text"
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","name", "customer", "customer_id")'
                                        class="form-control" id="name" placeholder="Your name"
                                        value="<?php echo $row['name']; ?>">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="text"
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","phone", "customer", "customer_id")'
                                        class="form-control" id="phone" placeholder="enter phone number"
                                        value="<?php echo $row['phone']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12"><input type="text"
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","address", "customer", "customer_id")'
                                        class="form-control" id="address" placeholder="enter address"
                                        value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="text" disabled
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","nic", "customer", "customer_id")'
                                        id="nic" class="form-control" placeholder="Enter NIC"
                                        value="<?php echo $row['nic']; ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="email"
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","email", "customer", "customer_id")'
                                        id="email" class="form-control" placeholder="Enter Email Address"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <select
                                        onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","gender", "customer", "customer_id")'
                                        id="gender <?php echo $customer_id; ?>" class='form-control norad tx12'
                                        name="gender" type='text'>
                                        <option value="1" <?php if ($row['gender']=="1") echo "selected"; ?>>
                                            Male</option>
                                        <option value="0" <?php if ($row['gender']=="0") echo "selected"; ?>>
                                            Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center experience mt-5">
                                <a class="border px-3 p-1 add-experience text-primary" id="change"
                                    href="change_email.php"><i class="fa fa-lock"></i>&nbsp;Change Email</a>
                                <a href="change_password.php" class="border px-3 p-1 add-experience text-primary"><i
                                        class="fa fa-lock"></i>&nbsp;Change Password</a>
                                <button class="btn btn-primary text-white btn-lg border px-3 p-1 add-experience"
                                    onclick="deleteDataFromHome(<?php echo $row['customer_id']; ?>, 'customer', 'customer_id')"><i
                                        class="fa fa-trash"></i>&nbsp;Delete</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile End -->
    

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