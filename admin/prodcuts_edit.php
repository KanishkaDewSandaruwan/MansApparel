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

                    <li class="menu-item active">
                        <a href="products.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Analytics">Products</div>
                        </a>
                    </li>
                    <li class="menu-item ">
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
                                        <li class="breadcrumb-item"><a href="products.php">Product Edit</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Product Edit</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <?php 
                    if (isset($_REQUEST['pid'])) {
                        $getall = getAllItemsByID($_REQUEST['pid']);
                        $row = mysqli_fetch_assoc($getall);
                        $pid = $row['pid'];
                        $img = $row['product_image'];
                        $img_src = "../server/uploads/products/" . $img;
                            ?>

                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="product_name">Product Name</label>
                                    <input id="product_name  <?php echo $pid; ?>" type="text" name="product_name"
                                        onchange="updateData(this, '<?php echo $pid; ?>', 'product_name', 'products', 'pid');"
                                        value="<?php echo $row['product_name']; ?>" data-parsley-trigger="change"
                                        required="" placeholder="Enter Product Name" autocomplete="off"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="product_highlight">Product Highlight</label>
                                    <input id="product_highlight <?php echo $pid; ?>" type="text"
                                        name="product_highlight"
                                        onchange="updateData(this, '<?php echo $pid; ?>', 'product_highlight', 'products', 'pid');"
                                        value="<?php echo $row['product_highlight']; ?>" data-parsley-trigger="change"
                                        required="" placeholder="Enter Product Highlight" autocomplete="off"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <select
                                        onchange='updateData(this, "<?php echo $pid; ?>","color_id", "products", "pid")'
                                        id="color_id <?php echo $pid; ?>" class='form-control norad tx12'
                                        name="color_id" type='text'>
                                        <?php 
                                        $getallCat = getAllColor();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                        <option value="<?php echo $row2['color_id']; ?>"
                                            <?php if ($row['color_id']== $row2['color_id']) echo "selected"; ?>>
                                            <?php echo $row2['color_name']; ?><span class="m-3"
                                                style=" height: 25px; width: 25px; background-color: <?php echo $row2['color_code']; ?>; border-radius: 50%; display: inline-block;"></span>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <select
                                        onchange='updateData(this, "<?php echo $pid; ?>","size_id", "products", "pid")'
                                        id="size_id <?php echo $pid; ?>" class='form-control norad tx12' name="size_id"
                                        type='text'>
                                        <?php 
                                        $getallCat = getAllsize();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                        <option value="<?php echo $row2['size_id']; ?>"
                                            <?php if ($row['size_id']== $row2['size_id']) echo "selected"; ?>>
                                            <?php echo $row2['size_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="form-group mt-3">
                                    <label for="product_price">Price</label>
                                    <input id="product_price <?php echo $pid; ?>" type="number" name="product_price"
                                        onchange="updateData(this, '<?php echo $pid; ?>', 'product_price', 'products', 'pid');"
                                        value="<?php echo $row['product_price']; ?>" data-parsley-trigger="change"
                                        required="" placeholder="Enter Product Price" autocomplete="off"
                                        class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <select
                                        onchange='updateData(this, "<?php echo $pid; ?>","cat_id", "products", "pid")'
                                        id="cat_id <?php echo $pid; ?>" class='form-control norad tx12' name="cat_id"
                                        type='text'>
                                        <?php 
                                        $getallCat = getAllSubcat();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                        <option value="<?php echo $row2['cat_id']; ?>"
                                            <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                            <?php echo $row2['cat_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="product_qty">Qty</label>
                                    <input id="product_qty <?php echo $pid; ?>" type="number" name="product_qty"
                                        onchange="updateData(this, '<?php echo $pid; ?>', 'product_qty', 'products', 'pid');"
                                        value="<?php echo $row['product_qty']; ?>" data-parsley-trigger="change"
                                        required="" placeholder="Enter Qty" autocomplete="off" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="inputPassword">Active</label>
                                    <select
                                        onchange="updateData(this, '<?php echo $pid; ?>', 'product_active', 'products', 'pid');"
                                        id="product_active <?php echo $pid; ?>" class='form-control norad tx12'
                                        name="product_active" type='text'>
                                        <option value="1"
                                            <?php if ($row['product_active'] == "1" ) echo "selected" ; ?>>
                                            Active
                                        </option>
                                        <option value="0"
                                            <?php if ($row['product_active'] == "0" ) echo "selected" ; ?>>
                                            Deactive
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <form enctype="multipart/form-data" method="POST">
                                        <div class="mb-3">
                                            <input class="form-control" value="<?php echo $row['pid'] ?>" name="id"
                                                type="hidden" id="id">
                                            <input class="form-control" value="pid" name="id_fild" type="hidden"
                                                id="id_fild">
                                            <input class="form-control" value="products" name="table" type="hidden"
                                                id="table">
                                            <input class="form-control" value="product_image" name="field" type="hidden"
                                                id="field">
                                            <input onchange="uploadImageProducts(this.form);" class="form-control"
                                                name="file" type="file" id="formFile">
                                        </div>
                                    </form>
                                    <img width="100px" src='<?php echo $img_src; ?>'>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="mb-3">
                                        <textarea id="product_description"
                                            name="product_description"><?php echo $row['product_description']; ?></textarea>
                                        <input class="form-control" value="<?php echo $row['pid'] ?>" name="id"
                                            type="hidden" id="id">
                                        <button type="button" onclick="changeDescription(this.form)"
                                            class="btn btn-primary">Update Description</button>
                                    </div>
                                </form>
                                    <script>
                                    $('#product_description').summernote({
                                        placeholder: 'Product Description',
                                        tabsize: 2,
                                        height: 120,
                                        toolbar: [
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['view', ['fullscreen', 'codeview', 'help']]
                                        ]
                                    });
                                    </script>

                            </div>


                            <div class="form-group mt-3 mt-5">

                                <button type="button" class="btn btn-dark mr-5"
                                    onclick="window.location.href='products.php'">Back</button>

                            </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>
                <!-- / Content -->

                <?php include 'template/footer.php'; ?>
</body>



</html>