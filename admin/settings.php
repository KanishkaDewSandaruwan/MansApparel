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
                                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                    </ol>
                                </nav>
                                <h3 class="mb-4">Settings</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <div class="col-12">
                                <div class=" rounded h-100 p-4">

                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                            <h6>Gallery : </h6>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <a href="gallery_image.php"> Gallery</a>
                                            </div>
                                        </div>
                                        <?php 
                                    $setting = getAllSettings();
                                    if($res = mysqli_fetch_assoc($setting)){ ?>

                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                            <h6>Shipping Fee : </h6>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <input type="text" onchange='settingsUpdate(this, "shpping_fee")'
                                                    value="<?php echo $res['shpping_fee']; ?>" class="form-control"
                                                    name="shpping_fee" id="shpping_fee"
                                                    placeholder="Shipping Fee" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2">
                                                <h6>Shop Status : </h6>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            id="cart_button  <?php echo $cat_id; ?>" name="cart_button"
                                                            value="<?php if ($res['shop_status']== 1){ echo "0";}else{ echo "1";} ?>"
                                                            onchange='settingsUpdate(this, "shop_status")'
                                                            type="checkbox"
                                                            <?php if ($res['shop_status']== 0) echo "checked"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-12">
                                            <div class=" rounded h-100 p-4">



                                                <div class="tab-pane fade show" id="nav-home" role="tabpanel"
                                                    aria-labelledby="nav-home-tab">
                                                    <h6>HEADER INFORMATION</h6>
                                                    <hr>
                                                    <?php
                                                    $setting = getAllSettings();
                                                    if($res = mysqli_fetch_assoc($setting)){
                                                        
                                                        $img = $res['header_image'];
                                                        $img_src = "../server/uploads/settings/".$img;

                                                        $imgs1 = $res['banner_01'];
                                                        $imgs1_src = "../server/uploads/settings/".$imgs1;

                                                        $imgs2 = $res['banner_02'];
                                                        $imgs2_src = "../server/uploads/settings/".$imgs2;
                                                    ?>


                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Header
                                                            Title</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "header_title")'
                                                            value="<?php echo $res['header_title']; ?>"
                                                            class="form-control" name="category_name"
                                                            id="validationCustom01" placeholder="Header Title" required>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="product_desc" class="form-label">Header
                                                            Description</label>
                                                        <textarea onchange='settingsUpdate(this, "header_desc")'
                                                            class="form-control" id="header_desc" required
                                                            rows="3"><?php echo $res['header_desc']; ?></textarea>
                                                    </div>
                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="header_image">
                                                            <label for="formFile" class="form-label">Header Image
                                                                file</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'>


                                                    <div class="col-md-12 mt-5">
                                                        <label for="banner_01_title" class="form-label">Banner 01
                                                            Title</label>
                                                        <textarea onchange='settingsUpdate(this, "banner_01_title")'
                                                            class="form-control" id="banner_01_title" required
                                                            rows="3"><?php echo $res['banner_01_title']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="banner_01_desc" class="form-label">Banner 01
                                                            Description</label>
                                                        <textarea onchange='settingsUpdate(this, "banner_01_desc")'
                                                            class="form-control" id="banner_01_desc" required
                                                            rows="3"><?php echo $res['banner_01_desc']; ?></textarea>
                                                    </div>

                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="banner_01">
                                                            <label for="formFile" class="form-label">Banner
                                                                01</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $imgs1_src; ?>'>

                                                    <div class="col-md-12 mt-5">
                                                        <label for="banner_02_title" class="form-label">Banner 02
                                                            Title</label>
                                                        <textarea onchange='settingsUpdate(this, "banner_02_title")'
                                                            class="form-control" id="banner_02_title" required
                                                            rows="3"><?php echo $res['banner_02_title']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="banner_02_desc" class="form-label">Banner 02
                                                            Description</label>
                                                        <textarea onchange='settingsUpdate(this, "banner_02_desc")'
                                                            class="form-control" id="banner_02_desc" required
                                                            rows="3"><?php echo $res['banner_02_desc']; ?></textarea>
                                                    </div>


                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="banner_02">
                                                            <label for="formFile" class="form-label">Banner
                                                                02</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $imgs2_src; ?>'>
                                                    <?php } ?>



                                                    <h6 style="margin-top: 100px;">ABOUT SETTINGS</h6>
                                                    <hr>
                                                    <?php
                                                        $setting = getAllSettings();
                                                        if($res = mysqli_fetch_assoc($setting)){ ?>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">About title</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "about_title")'
                                                            value="<?php echo $res['about_title']; ?>"
                                                            class="form-control" id="about_title"
                                                            placeholder="About title" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">About Description</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "about_desc")'
                                                            value="<?php echo $res['about_desc']; ?>"
                                                            class="form-control" id="about_desc"
                                                            placeholder="Company Email Address" required>
                                                    </div>
                                                   


                                                    <?php } ?>





                                                    <h6 style="margin-top: 100px;">CONTACT SETTINGS</h6>
                                                    <hr>
                                                    <?php
                                                        $setting = getAllSettings();
                                                        if($res = mysqli_fetch_assoc($setting)){ ?>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company
                                                            Phone
                                                            Number</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_phone")'
                                                            value="<?php echo $res['company_phone']; ?>"
                                                            class="form-control" id="company_phone"
                                                            placeholder="Company Phone Number" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company
                                                            Email
                                                            Address</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_email")'
                                                            value="<?php echo $res['company_email']; ?>"
                                                            class="form-control" id="company_email"
                                                            placeholder="Company Email Address" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company
                                                            Address</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_address")'
                                                            value="<?php echo $res['company_address']; ?>"
                                                            class="form-control" id="company_address"
                                                            placeholder="Company Address" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Facebook
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_facebook")'
                                                            value="<?php echo $res['link_facebook']; ?>"
                                                            class="form-control" id="link_facebook"
                                                            placeholder="Facebook Link" required>
                                                        <a
                                                            href="<?php echo $res['link_facebook']; ?>"><?php echo $res['link_facebook']; ?></a>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">WhatsApp
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_whatsapp")'
                                                            value="<?php echo $res['link_whatsapp']; ?>"
                                                            class="form-control" id="link_whatsapp"
                                                            placeholder="Twitter Link" required>
                                                        <a
                                                            href="<?php echo $res['link_whatsapp']; ?>"><?php echo $res['link_whatsapp']; ?></a>
                                                    </div>
                                                   


                                                    <?php } ?>




                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- / Content -->

                        <?php include 'template/footer.php'; ?>
</body>

</html>