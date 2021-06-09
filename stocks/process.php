<?php 
include_once '../dbase/dbase.php';

if (isset($_POST['upd_btn'])) {
	$id = htmlspecialchars($_POST['id']);
	$brand_name = htmlspecialchars($_POST['brand_name']);
	$item_name = htmlspecialchars($_POST['item_name']);
	$item_code = htmlspecialchars($_POST['item_code']);
	$supplier = htmlspecialchars($_POST['supplier']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$description = htmlspecialchars($_POST['description']);
	$image_name = mysqli_real_escape_string($con, $_FILES['item_image']['name']);

	if (empty($image_name)) {
		$update_stocks = "UPDATE stock SET brand_name  = '$brand_name',  item_name ='$item_name', description = '$description',  item_code = '$item_code',  supplier = '$supplier', quantity = '$quantity',  price = '$price' WHERE  stock_id = '$id' ";
		if ( mysqli_query($con, $update_stocks) === true) {
			header("Location: ../stocks.php");
		}
		else{
			die($con->error);
		}
	}
	else{
		$image_type = $_FILES['item_image']['type'];
		$image_tmp = $_FILES['item_image']['tmp_name'];

		$move_image = move_uploaded_file($image_tmp, "stocks_image/$image_name");
		$update_stocks = "UPDATE stock SET brand_name  = '$brand_name',  item_name ='$item_name', description = '$description',  item_code = '$item_code',  supplier = '$supplier', quantity = '$quantity',  price = '$price', item_img = '$image_name' WHERE  stock_id = '$id' ";
		if ( mysqli_query($con, $update_stocks) === true) {
			header("Location: ../stocks.php");
		}
		else{
			die($con->error);
		}

	}
}


if (isset($_GET['delete_id'])) {
	$delete_id = htmlspecialchars($_GET['delete_id']);
	$delete = "DELETE FROM stock WHERE stock_id = '$delete_id'";
	if (mysqli_query($con, $delete) === true) {
		header("Location: ../stocks.php");
	}
	else{
		die($con->error);
	}
}
?>