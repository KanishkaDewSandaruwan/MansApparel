<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <?php
            $getallCp3 = getAllAvailableItems();
            $count = 0;
            while ($row0 = mysqli_fetch_assoc($getallCp3)) {
                $pid = $row0['pid'];
                $img0 = $row0['product_image'];
                $img_src0 = "server/uploads/products/" . $img0;
                if($count < 6){ ?>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid" style="width: 100%; height: 400px;"  src="<?php echo $img_src0; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $row0['product_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs. <?php echo $row0['product_price']; ?></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a  href="detail.php?pid=<?php echo $pid; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a>
                        <button type="button" onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row3['product_price']; ?>)" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </div>
                </div>
                <?php } $count++; } ?>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->