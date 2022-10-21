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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<div class="container-fluid">
    <div class="row text-white py-2 px-xl-5" style="background-color: #69696b;">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
            <?php if(isset($_SESSION['customer'])) : ?>
                <a class="text-white" href="profile.php">Profile</a>
                <span class="text-muted px-2">|</span>
                <a class="text-white" href="order.php">Orders</a>
                <span class="text-muted px-2">|</span>
                <a class="text-white" href="admin/logout.php">Logout</a>
                <?php else : ?>
                <a class="text-white" href="admin/login.php">Login</a>
                <span class="text-muted px-2">|</span>
                <a class="text-white" href="admin/register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-2" href="<?php echo $res['link_facebook']; ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-2" href="<?php echo $res['link_whatsapp']; ?>">
                <i class="fa-brands fa-whatsapp"></i>
                </a>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="index.php" class="text-decoration-none">
                <h2 class="mb-4 display-5 font-weight-semi-bold text-dark"><span class="text-white font-weight-bold bg-dark border border-white px-3" style="font-family: 'Poppins', sans-serif; margin-right: -5px;">B</span> lack & <span class="text-white font-weight-bold bg-dark border border-white px-3" style="font-family: 'Poppins', sans-serif;">W</span>hite</h2>
            </a>
            <div class="row" style="margin-left: 35%; margin-top: -20px">
                <p class="text-black font-weight-bold bg-white " style="font-family: 'Poppins', sans-serif;;">Since 2019</p>
            </div>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form method="post">
                <div class="input-group">
                    <input type="text" name="key" id="key"  class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <button type="button" onclick="search(this.form)" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="cart.php" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <?php if(isset($_SESSION['customer'])) : ?>
                <span class="badge"><?php echo dataCountwithCondition("cart" , "WHERE customer_id = '".$_SESSION['customer']."'") ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->