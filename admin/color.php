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
                    <li class="menu-item active">
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
                                        <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product Colors</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Product Color List</h3>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ColorModal">
                                    Add
                                    New</button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Color ID</th>
                                        <th>Color Name</th>
                                        <th>Color</th>
                                        <th>Date</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Color ID</th>
                                        <th>Color Name</th>
                                        <th>Color</th>
                                        <th>Date</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                            $getall = getAllColor();

                            while($row=mysqli_fetch_assoc($getall)){
                                $color_id = $row['color_id'];;?>
                                    <tr>
                                        <td>#<?php echo $row['color_id']; ?></td>
                                        <td>
                                            <div class="form-group">
                                                <input id="color_name  <?php echo $color_id; ?>" type="text"
                                                    name="color_name"
                                                    onchange="updateData(this, '<?php echo $color_id; ?>', 'color_name', 'colors', 'color_id');"
                                                    value="<?php echo $row['color_name']; ?>" class="form-control">
                                            </div>
                                        </td>



                                        <td>
                                            <div class="form-group">
                                                <input id="color_code  <?php echo $color_id; ?>" type="text"
                                                name="color_code"
                                                onchange="updateData(this, '<?php echo $color_id; ?>', 'color_code', 'colors', 'color_id');"
                                                value="<?php echo $row['color_code']; ?>" class="form-control">
                                            </div>
                                            <span class="m-3" style=" height: 25px; width: 25px; background-color: <?php echo $row['color_code']; ?>; border-radius: 50%; display: inline-block;"></span>

                                        </td>

                                        <td><button type="button"
                                                onclick="deleteData(<?php echo $row['color_id']; ?>,'colors', 'color_id')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                            </button></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>
                <!-- / Content -->

                <?php include 'template/footer.php'; ?>
</body>

<!-- Modal -->
<div class="modal fade" id="ColorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Colors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form method="POST" accept="" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="color_name" class="form-label">Color Name</label>
                        <input type="text" class="form-control" name="color_name" id="color_name"
                            placeholder="Color Name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="color_code" class="form-label">Color Code</label>
                        <input type="text" class="form-control" name="color_code" id="color_code"
                            placeholder="Color Code" required>
                    </div>


            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addColor(this.form)" name="submit" class="btn btn-primary">Save
                    changes</button>
            </div>
            </form>

        </div>
    </div>
</div>


</html>