<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <?php include 'template/head.php'; ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase;">Black & White</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item ">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="customer.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Analytics">Customer</div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Category</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="category.php" class="menu-link">
                                    <div data-i18n="Without menu">Cloth Category</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="color.php" class="menu-link">
                                    <div data-i18n="Without navbar">Colors</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="size.php" class="menu-link">
                                    <div data-i18n="Container">Sizes</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item ">
                        <a href="products.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Analytics">Products</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="orders.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Analytics">Orders</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="message.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Analytics">Message</div>
                        </a>
                    </li>


                </ul>
            </aside>
            <!-- / Menu -->


            <?php include 'template/navbar.php'; ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">

                        <div class="row">
                            <div class="col-lg-10">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="products.php">Order</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Order List</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Order List</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <?php 
                            $getall = getAllOrders();

                            while($row=mysqli_fetch_assoc($getall)){ 
                                $order_id = $row['order_id'];
                                ?>
                            <article class="card mt-5" style="border: 2px solid #fff">
                                <header class="card-header text-white bg-primary"> Orders /
                                    Tracking | #<?php echo $row['order_id']; ?></header>
                                <div class="card-body">
                                    <div class="row mt-3">

                                        <div class="col-md-3">
                                            <label for="order_status" class="form-label">Order Current State
                                                Change</label>
                                            <select
                                                onchange='updateData(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                                                id="order_status <?php echo $order_id; ?>"
                                                class='form-control norad tx12' name="order_status" type='text'>
                                                <option value="1"
                                                    <?php if ($row['order_status']=="1") echo "selected"; ?>>
                                                    Order confirmed
                                                </option>
                                                <option value="2"
                                                    <?php if ($row['order_status']=="2") echo "selected"; ?>>
                                                    Prepare Order
                                                </option>
                                                <option value="3"
                                                    <?php if ($row['order_status']=="3") echo "selected"; ?>>
                                                    Shipped Order
                                                </option>
                                                <option value="4"
                                                    <?php if ($row['order_status']=="4") echo "selected"; ?>>
                                                    Deliverd
                                                </option>
                                                <option value="5"
                                                    <?php if ($row['order_status']=="5") echo "selected"; ?>>
                                                    Canceled
                                                </option>
                                            </select>
                                        </div>
                                        <?php if ($row['order_status'] != "5") { ?>
                                        <div class="col-md-3">

                                            <label for="tracking" class="form-label">Tracking Number</label>
                                            <input type="text"
                                                onchange='updateData(this, "<?php echo $order_id; ?>","tracking", "product_orders", "order_id")'
                                                class="form-control" name="tracking"
                                                value="<?php echo $row['tracking'] ?>"
                                                id="tracking<?php echo $row['order_id'] ?>">

                                        </div>
                                        <?php } ?>
                                    </div>
                                    <article class="card mt-5">
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
                                    $img_src = "../server/uploads/products/".$img;?>
                                        <li class="col-md-4">
                                            <figure class="itemside mb-3">
                                                <div class="aside"><img src="<?php echo $img_src; ?>"
                                                        class="img-sm border">
                                                </div>
                                                <figcaption class="info align-self-center">
                                                    <p class="title"><?php echo $row2['product_name']; ?> <br>
                                                        <?php echo $row2['product_highlight']; ?></p> <span
                                                        class="text-muted">Rs.
                                                        <?php echo $row2['product_price']; ?> </span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <hr>

                                </div>
                            </article>
                            <?php } ?>

                        </div>

                    </div>

                </div>
                <!-- / Content -->

                <?php include 'template/footer.php'; ?>
</body>

</html>