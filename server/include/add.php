<?php
function addCategory($data, $img)
{
    include 'connection.php';

    $category_name = $data['category_name'];
    $sub_category = $data['sub_category'];

    $sql = "INSERT INTO category(cat_name, cat_image, is_deleted, date_updated, sub_category, cart_button) VALUES('$category_name', '$img', 0 , now(), '$sub_category',0)";
    return mysqli_query($con, $sql);

}

function createColor($data)
{
    include 'connection.php';

    $color_name = $data['color_name'];
    $color_code = $data['color_code'];

    $sql = "INSERT INTO colors(color_name, color_code, is_deleted, date_updated) VALUES('$color_name', '$color_code', 0 , now())";
    return mysqli_query($con, $sql);

}

function createSize($data)
{
    include 'connection.php';

    $size_name = $data['size_name'];
    $size_description = $data['size_description'];

    $sql = "INSERT INTO size(size_name, size_description, is_deleted, date_updated) VALUES('$size_name', '$size_description', 0 , now())";
    return mysqli_query($con, $sql);

}

function addSlideshow($data, $img)
{
	include 'connection.php';

	$slideshow_title = $data['slideshow_title'];

	$sql = "INSERT INTO slideshow(slideshow_title, slideshow_image) VALUES('$slideshow_title', '$img')";
	return mysqli_query($con,$sql);

}


function addProduct($data, $img)
{
	include 'connection.php';

	$product_name = $data['product_name'];
	$product_highlight = $data['product_highlight'];
	$product_description = $data['product_description'];
	$product_price = $data['product_price'];
	$product_qty = $data['product_qty'];
	$product_active = $data['product_active'];
	$cat_id = $data['cat_id'];
	$size_id = $data['size_id'];
	$color_id = $data['color_id'];

	$count = checkProductByName($product_name);

	if ($count == 0) {

		$sql = "INSERT INTO products(product_name, product_description, product_highlight, product_price, product_qty, product_active, date_updated, is_deleted, product_image, cat_id, size_id, color_id) VALUES('$product_name', '$product_description', '$product_highlight', '$product_price', '$product_qty', '$product_active', now(), 0 ,'$img', '$cat_id', '$size_id', '$color_id')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}


//contact
function addMessage($data)
{
    include 'connection.php';

    $name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];


	$sql = "INSERT INTO contact(name, email, subject, message, date_updated) VALUES('$name', '$email', '$subject', '$message', now())";
	return mysqli_query($con, $sql);
}

function addReviews($data)
{
    include 'connection.php';

    $review_email = $data['review_email'];
    $review_name = $data['review_name'];
    $review_review = $data['review_review'];
    $pid = $data['pid'];


	$sql = "INSERT INTO review(review_review, review_name, review_email, review_pid, date_updated) VALUES('$review_review', '$review_name', '$review_email', '$pid', now())";
	return mysqli_query($con, $sql);
}


function addtoCart($pid, $customer_id, $product_price, $qty){
	include 'connection.php';

	$sql = "INSERT INTO cart(pid, customer_id, price, qty, date_updated) VALUES('$pid', '$customer_id', '$product_price', '$qty', now())";
	return mysqli_query($con, $sql);
}

function createCustomer($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$gender = $data['gender'];
	$password = $data['password'];

	$sql = "INSERT INTO customer(name, email, phone, nic, address, gender, password, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', '$password', 0 )";
	return mysqli_query($con, $sql);
	
}

function checkoutOrder($data){
	include 'connection.php';

    $customer_id = $data['customer_id'];
    $total = $data['total'];
    $shipping_address = $data['shipping_address'];
    $billing_address = $data['billing_address'];
    
	$sql = "INSERT INTO product_orders(customer_id, total,shipping_address, billing_address, payment, date_updated, is_deleted, order_status, tracking) VALUES('$customer_id', '$total','$shipping_address','$billing_address', 1 , now(), 0, 1, 'Pending')";
	$res =  mysqli_query($con, $sql);
	$result =  mysqli_insert_id($con);

    $getallcartProducts =  getAllCart($customer_id);

	while($row = mysqli_fetch_assoc($getallcartProducts)){
		$order_id =  $result;
		$pid = $row['pid'];
		$qty = $row['qty'];
		$price = $row['price'];
		addProductItems($order_id, $pid, $qty, $price);
		productQtyReduce($pid, $qty);
	}
	return deleteAllCartItems($customer_id);
}

function addProductItems($order_id, $pid, $qty, $price){
	include 'connection.php';

	$sql = "INSERT INTO order_items(order_id, pid, order_qty, price) VALUES('$order_id', '$pid', '$qty', '$price')";
	return mysqli_query($con, $sql);
}



?>