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
                                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Product Category List</h3>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal">
                                    Add
                                    New</button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Cat ID</th>
                                        <th>Category Name</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cat ID</th>
                                        <th>Category Name</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                            $getall = getAllCategory();

                            while($row=mysqli_fetch_assoc($getall)){

                                $cat_id = $row['cat_id'];
                                $img = $row['cat_image'];
                                $img_src = "../server/uploads/category/".$img;?>
                                    <tr>
                                        <td>#<?php echo $row['cat_id']; ?></td>
                                        <td>
                                            <div class="form-group">
                                                <input id="cat_name  <?php echo $cat_id; ?>" type="text" name="cat_name"
                                                    onchange="updateData(this, '<?php echo $cat_id; ?>', 'cat_name', 'category', 'cat_id');"
                                                    value="<?php echo $row['cat_name']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Category Name" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <select
                                                onchange='updateSubCatData(this, "<?php echo $cat_id; ?>","sub_category", "category", "cat_id")'
                                                id="sub_category <?php echo $cat_id; ?>" class='form-control norad tx12 
                                                <?php if($row['sub_category'] == 0) {?>
                                                bg-dark text-white
                                                <?php } ?>
                                                '
                                                name="sub_category" type='text'>
                                                <?php if($row['sub_category'] == 0 ){?>
                                                <option value="0" selected>... This is Main Category ...</option>
                                                <?php  }else{ ?>
                                                <option value="0">... This is Main Category ...</option>
                                                <?php }
                                        $getallCat = getAllParentCategoryWithoutMe($cat_id);
                                        while($row2=mysqli_fetch_assoc($getallCat)){  ?>
                                                <option value="<?php echo $row2['cat_id']; ?>"
                                                    <?php if ($row['sub_category']== $row2['cat_id']) echo "selected"; ?>>
                                                    <?php echo $row2['cat_name']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </td>

                                        <td>


                                            <form class="w-20" enctype="multipart/form-data" method="POST">
                                                <div class="mb-3">
                                                    <input class="form-control" value="<?php echo $row['cat_id'] ?>"
                                                        name="id" type="hidden" id="id">
                                                    <input class="form-control" value="cat_id" name="id_fild"
                                                        type="hidden" id="id_fild">
                                                    <input class="form-control" value="category" name="table"
                                                        type="hidden" id="table">
                                                    <input class="form-control" value="cat_image" name="field"
                                                        type="hidden" id="field">
                                                    <input onchange="uploadImage(this.form);" class="form-control"
                                                        name="file" type="file" id="formFile">
                                                </div>
                                            </form>
                                            <img width="200px" src='<?php echo $img_src; ?>'>

                                        </td>
                                        <!-- <td>
                                            <?php if($row['sub_category'] == 0) {?>
                                            <div class="form-group">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input"
                                                        id="cart_button  <?php echo $cat_id; ?>" name="cart_button"
                                                        value="<?php if ($row['cart_button']== 1){ echo "0";}else{ echo "1";} ?>"
                                                        onchange="updateData(this, '<?php echo $cat_id; ?>', 'cart_button', 'category', 'cat_id');"
                                                        type="checkbox"
                                                        <?php if ($row['cart_button']== 0) echo "checked"; ?>>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </td> -->
                                        <td><button type="button"
                                                onclick="deleteDataCategory(<?php echo $row['cat_id']; ?>,'category', 'cat_id')"
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
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form method="POST" accept="php_parts/addCat.php" class="row g-3 needs-validation" novalidate
                    enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="cat_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="cat_name"
                            placeholder="Category Name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <select class="form-select" name="sub_category" id="sub_category"
                            aria-label="Default select example">
                            <option value="0" selected>... Sub Category Selected None ...</option>
                            <?php $getall = getAllParentCategory();
                                    while($row=mysqli_fetch_assoc($getall)){ ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="file" class="form-label">Category Image file</label>
                        <input class="form-control" name="file" type="file" id="file">
                    </div>
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addCategory(this.form)" name="submit" class="btn btn-primary">Save
                    changes</button>
            </div>
            </form>

        </div>
    </div>
</div>


</html>