<?php 

include_once '../dbase/dbase.php';

$brand_name = htmlspecialchars($_POST['brand_name']);
$item_name = htmlspecialchars($_POST['item_name']);
$item_code = htmlspecialchars($_POST['item_code']);
$supplier = htmlspecialchars($_POST['supplier']);
$quantity = htmlspecialchars($_POST['quantity']);
$price = htmlspecialchars($_POST['price']);
$description = htmlspecialchars($_POST['description']);
$image_name = mysqli_real_escape_string($con, $_FILES['item_image']['name']);

$image_type = $_FILES['item_image']['type'];
$image_tmp = $_FILES['item_image']['tmp_name'];

$move_image = move_uploaded_file($image_tmp, "stocks_image/$image_name");

$insert_stock = "INSERT INTO stock (brand_name, item_name, description, item_code, supplier, quantity, price, item_img)VALUES('$brand_name', '$item_name', '$description', '$item_code', '$supplier','$quantity','$price', '$image_name')";
if (mysqli_query($con, $insert_stock) === true) {
	header("Location: ../stocks.php");
}
else{
	die($con->error);
}

 ?>