<?php 

include_once '../dbase/dbase.php';

if (isset($_POST['insert_brand'])) {
	$brand_name = htmlspecialchars($_POST['brand_name']);


	$insert_brand = "INSERT INTO brands(brand_names) VALUES ('$brand_name')";
	if (mysqli_query($con, $insert_brand) === true ) {
		header("Location: ../brands.php");
	}
	else{
		die($con->error);
	}

}

if (isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
	$get_brand = "SELECT * FROM brands WHERE brand_id = '$id'";
	$brand_query = mysqli_query($con, $get_brand) or die($con->error);
	if (mysqli_num_rows($brand_query) > 0) {
		$row = $brand_query->fetch_assoc();
		echo $row['brand_names'];
	}
}

if (isset($_POST['upd_brand'])) {
	$brand_id = htmlspecialchars($_POST['brand_id']);
	$brand_name = htmlspecialchars($_POST['brand_name']);
	$upd_brand_item = "UPDATE brands SET brand_names = '$brand_name' WHERE brand_id = '$brand_id'";
	if (mysqli_query($con, $upd_brand_item) === TRUE) {
		header("Location: ../brands.php");
	}
	else{
		die($con->error);
	}

}

if (isset($_GET['delete_id'])) {
	$delete_id = htmlspecialchars($_GET['delete_id']);
	$delete = "DELETE FROM brands WHERE brand_id = '$delete_id'";
	if (mysqli_query($con, $delete) === true) {
		header("Location: ../brands.php");
	}
	else{
		die($con->error);
	}
}







 ?>