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
                            $row2 = mysqli_fetch_assoc($getallCp2);

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
                                    <a href="shop.php?cat_id=<?php echo $cat_id2; ?>" class="dropdown-item"><?php echo $row4['cat_name']; ?></a>
                                    <?php } } ?>

                                </div>
                            </div>

                        <?php } } ?>
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
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="admin/login" class="nav-item nav-link">Login</a>
                            <a href="admin/register" class="nav-item nav-link">Register</a>
                            <a href="admin/logout.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="<?php echo $header_src; ?>" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3"> <?php echo $res['header_title']; ?></h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4"> <?php echo $res['header_desc']; ?></h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->