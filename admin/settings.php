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
                                        <?php 
                                    $setting = getAllSettings();
                                    if($res = mysqli_fetch_assoc($setting)){ ?>
                                        <div class="col-md-2">
                                            <h6>Shop Status : </h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input"
                                                        id="cart_button  <?php echo $cat_id; ?>" name="cart_button"
                                                        value="<?php if ($res['shop_status']== 1){ echo "0";}else{ echo "1";} ?>"
                                                        onchange='settingsUpdate(this, "shop_status")' type="checkbox"
                                                        <?php if ($res['shop_status']== 0) echo "checked"; ?>>
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

                                                        $imgs = $res['sub_image'];
                                                        $imgs_src = "../server/uploads/settings/".$imgs;

                                                        $imgs1 = $res['header_rotate_image'];
                                                        $imgs1_src = "../server/uploads/settings/".$imgs1;
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

                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="sub_image">
                                                            <label for="formFile" class="form-label">Sub header
                                                                Image file</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $imgs_src; ?>'>


                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="header_rotate_image">
                                                            <label for="formFile" class="form-label">Sub header
                                                                Image file</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $imgs1_src; ?>'>





                                                    <?php } ?>

                                                    <h6 style="margin-top: 100px;">ABOUT SETTINGS</h6>
                                                    <hr>
                                                    <?php
                                                        $setting = getAllSettings();
                                                        if($res = mysqli_fetch_assoc($setting)){

                                                            $about = $res['about_image'];
                                                            $about_src = "../server/uploads/settings/".$about;
                                                    ?>


                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">About
                                                            Title</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "about_title")'
                                                            value="<?php echo $res['about_title']; ?>"
                                                            class="form-control" id="about_title"
                                                            placeholder="About Title" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01"
                                                            class="form-label">Experience</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "about_experience")'
                                                            value="<?php echo $res['about_experience']; ?>"
                                                            class="form-control" id="about_experience"
                                                            placeholder="Experience" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Opening
                                                            Hour</label>
                                                        <input type="text" onchange='settingsUpdate(this, "opening")'
                                                            value="<?php echo $res['opening']; ?>" class="form-control"
                                                            id="opening" placeholder="Opening Hour" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="product_desc" class="form-label">About
                                                            Description</label>
                                                        <textarea onchange='settingsUpdate(this, "about_desc")'
                                                            class="form-control" id="about_desc" required
                                                            rows="3"><?php echo $res['about_desc']; ?></textarea>

                                                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <input type="hidden" name="field" id="field"
                                                                    value="about_image">
                                                                <label for="formFile" class="form-label">About Image
                                                                    file</label>
                                                                <input class="form-control"
                                                                    onchange="uploadSettingImage(this.form);"
                                                                    name="file" type="file" id="formFile">
                                                            </div>

                                                        </form>
                                                        <img class="mt-2" width="200px" src='<?php echo $about_src; ?>'>


                                                        <?php } ?>

                                                    </div>

                                         
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
                                                        <label for="validationCustom01" class="form-label">Twitter
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_twiiter")'
                                                            value="<?php echo $res['link_twiiter']; ?>"
                                                            class="form-control" id="link_twiiter"
                                                            placeholder="Twitter Link" required>
                                                        <a
                                                            href="<?php echo $res['link_twiiter']; ?>"><?php echo $res['link_twiiter']; ?></a>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Instragram
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_instragram")'
                                                            value="<?php echo $res['link_instragram']; ?>"
                                                            class="form-control" id="link_instragram"
                                                            placeholder="Instragram Link" required>
                                                        <a
                                                            href="<?php echo $res['link_instragram']; ?>"><?php echo $res['link_instragram']; ?></a>
                                                    </div>


                                                    <?php } ?>


                                                    <h6 style="margin-top: 100px;">Privacy and Terms Settings</h6>
                                                    <hr>
                                                    <?php
                                            $setting = getAllSettings();
                                            if($res = mysqli_fetch_assoc($setting)){ ?>




                                                    <div class="col-md-12 mt-3">

                                                        <div class="form-group">
                                                            <label for="privacy_policy">Privacy Policy</label>
                                                            </br>
                                                            <textarea id="article_content" cols="100" rows="10"
                                                                onchange="settingsUpdate(this, 'privacy_policy');"
                                                                name="privacy_policy"><?php echo $res['privacy_policy']; ?></textarea>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="terms_and_condition">Terms & Condition</label>
                                                        </br>
                                                        <textarea id="terms_and_condition" cols="100" rows="10"
                                                            onchange='settingsUpdate(this, "terms_and_condition")'
                                                            style="color: black;"
                                                            name="terms_and_condition"><?php echo $res['terms_and_condition']; ?></textarea>
                                                    </div>
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