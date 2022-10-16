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
                         
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Men's Apparel</span>
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
                    <li class="menu-item active">
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
                                        <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Products List</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Products List</h3>
                            </div>
                            <div class="col-lg-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductModal"> Add
                            New</button>
                    </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Highlight</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Category</th>
                                        <th>Price (Rs.)</th>
                                        <th>Qty</th>
                                        <th>Available</th>
                                        <th>Date Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $getall = getAllItems();
                                while ($row = mysqli_fetch_assoc($getall)) {
                                    $pid = $row['pid'];
                                    $img = $row['product_image'];
                                    $img_src = "../server/uploads/products/" . $img; ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['product_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['product_description']; ?>
                                        </td>
                                        <td><img width="50px" src='<?php echo $img_src; ?>'></td>
                                        <td>
                                            <?php echo $row['product_highlight']; ?>
                                        </td>
                                        
                                        <td>
                                            <select
                                            onchange='updateData(this, "<?php echo $pid; ?>","size_id", "products", "pid")'
                                            id="size_id <?php echo $pid; ?>" class='form-control norad tx12'
                                            name="size_id" type='text'>
                                            <?php 
                                        $getallCat = getAllsize();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                        <option value="<?php echo $row2['size_id']; ?>"
                                        <?php if ($row['size_id']== $row2['size_id']) echo "selected"; ?>>
                                        <?php echo $row2['size_name']; ?></option>
                                        <?php } ?>
                                        </select>

                                        </td>
                                        <td>
                                            <select
                                                onchange='updateData(this, "<?php echo $pid; ?>","color_id", "products", "pid")'
                                                id="color_id <?php echo $pid; ?>" class='form-control norad tx12'
                                                name="color_id" type='text'>
                                                <?php 
                                        $getallCat = getAllColor();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                <option value="<?php echo $row2['color_id']; ?>"
                                                    <?php if ($row['color_id']== $row2['color_id']) echo "selected"; ?>>
                                                    <?php echo $row2['color_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <td><select
                                                onchange='updateData(this, "<?php echo $pid; ?>","cat_id", "products", "pid")'
                                                id="cat_id <?php echo $pid; ?>" class='form-control norad tx12'
                                                name="cat_id" type='text'>
                                                <?php 
                                        $getallCat = getAllSubcat();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                <option value="<?php echo $row2['cat_id']; ?>"
                                                    <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                                    <?php echo $row2['cat_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input type="number" class="form-control"
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_price', 'products', 'pid');"
                                                name="product_price" id="product_price <?php echo $pid; ?>"
                                                value="<?php echo $row['product_price']; ?>">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_qty', 'products', 'pid');"
                                                name="product_qty" id="product_qty <?php echo $pid; ?>"
                                                value="<?php echo $row['product_qty']; ?>">
                                        </td>

                                        <td>
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
                                        </td>
                                        <td>
                                            <?php echo $row['date_updated']; ?>
                                        </td>
                                        <td>

                                            <a href="prodcuts_edit.php?pid=<?php echo $row['pid']; ?>"
                                                class="btn btn-darkblue">
                                                <i class="fa-solid fa-pen-to-square"></i> </a>
                                            <?php if ($row['product_active']=="0"): ?>
                                            <button type="button"
                                                onclick="deleteData(<?php echo $row['pid']; ?>,'products', 'pid')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <?php endif ?>

                                        </td>
                                        <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>

                    </div>

                </div>
                <!-- / Content -->

                <?php include 'template/footer.php'; ?>
</body>


<!-- Modal -->
<div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input id="product_name" type="text" name="product_name" data-parsley-trigger="change"
                            required="" placeholder="Enter Product Name" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_description">Product Description</label>
                        <input id="product_description" type="text" name="product_description"
                            data-parsley-trigger="change" required="" placeholder="Enter Product Description"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="product_highlight">Product Highlight</label>
                        <input id="product_highlight" type="text" name="product_highlight" data-parsley-trigger="change"
                            required="" placeholder="Enter Product Highlight" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Price</label>
                        <input id="product_price" type="number" name="product_price" data-parsley-trigger="change"
                            required="" placeholder="Enter Product Price" autocomplete="off" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="color_id" class="form-label">Color</label>
                        <select class="form-select" name="color_id" id="color_id" aria-label="Default select example">
                            <?php $getall = getAllColor();
                                while($row=mysqli_fetch_assoc($getall)){ ?>
                            <option style="background-color: <?php echo $row['color_code']; ?>;" value="<?php echo $row['color_id'] ?>"><?php echo $row['color_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="size_id" class="form-label">Size</label>
                        <select class="form-select" name="size_id" id="size_id" aria-label="Default select example">
                            <?php $getall = getAllsize();
                                while($row=mysqli_fetch_assoc($getall)){ ?>
                            <option value="<?php echo $row['size_id'] ?>"><?php echo $row['size_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="cat_id" class="form-label">Category</label>
                        <select class="form-select" name="cat_id" id="cat_id" aria-label="Default select example">
                            <?php $getall = getAllSubcat();
                                while($row=mysqli_fetch_assoc($getall)){ ?>
                            <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_qty">Qty</label>
                        <input id="product_qty" type="number" name="product_qty" data-parsley-trigger="change"
                            required="" placeholder="Enter Qty" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Active</label>
                        <select class="form-select" name="product_active" id="product_active"
                            aria-label="Default select example">
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control" required name="file" type="file" id="file">
                    </div>

            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addItems(this.form)" name="submit" class="btn btn-primary">Save
                    changes</button>
            </div>
            </form>

        </div>
    </div>
</div>

</html>