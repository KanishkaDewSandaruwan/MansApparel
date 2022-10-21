<?php
function getAllProductgalleryImages(){
	include 'connection.php';

	$gallery = "SELECT * FROM product_image_gallery";
	return mysqli_query($con,$gallery);
}

function getAllProductgalleryImagesByPID($pid){
	include 'connection.php';

	$gallery = "SELECT * FROM product_image_gallery WHERE pid = '$pid'";
	return mysqli_query($con,$gallery);
}

function insertImagetoGallery($data, $img)
{
    include 'connection.php';

	$pid = $data['pid'];

	$sql = "INSERT INTO product_image_gallery(products_image, pid) VALUES('$img', '$pid')";
	return mysqli_query($con, $sql);
}


function getAllgalleryImages(){
	include 'connection.php';

	$gallery = "SELECT * FROM gallery";
	return mysqli_query($con,$gallery);
}

function insertImagetoAboutGallery($img)
{
    include 'connection.php';

	$sql = "INSERT INTO gallery(gallery_image) VALUES('$img')";
	return mysqli_query($con, $sql);
}
?>