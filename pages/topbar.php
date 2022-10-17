<?php 
include 'server/api.php';  

$setting = getAllSettings();
$res = mysqli_fetch_assoc($setting);

$header = $res['header_image'];
$header_src = "server/uploads/settings/".$header;

$about = $res['about_image'];
$about_src = "server/uploads/settings/".$about;

$banner_01 = $res['banner_01'];
$banner_01_src = "server/uploads/settings/".$banner_01;

$banner_02 = $res['banner_02'];
$banner_02_src = "server/uploads/settings/".$banner_02;

?>

<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">Profile</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Orders</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="<?php echo $res['link_facebook']; ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="<?php echo $res['link_twiiter']; ?>">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="<?php echo $res['link_instragram']; ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">Man's</span>Apparel</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="cart.php" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->