<?php 
include_once '../dbase/dbase.php';

if (isset($_POST['sup_btn'])) {
	$id = htmlspecialchars($_POST['sup_id']);
	$sup_name = htmlspecialchars($_POST['sup_name']);
	$sup_brand = htmlspecialchars($_POST['sup_brand']);
	$sup_address = htmlspecialchars($_POST['sup_address']);
	$sup_cont_person = htmlspecialchars($_POST['sup_cont_person']);
	$sup_cont_number = htmlspecialchars($_POST['sup_cont_number']);
	$sup_cont_email = htmlspecialchars($_POST['sup_cont_email']);

	$insert_sup = "UPDATE supplier_tbl SET supplier_name = '$sup_name', supplier_brand = '$sup_brand', supplier_address = '$sup_address', supplier_cont_person = '$sup_cont_person' , supplier_number = '$sup_cont_number',	supplier_email = '$sup_cont_email' WHERE supplier_id = '$id'";
	if (mysqli_query($con, $insert_sup) === true) {
		header("Location: ../supplier.php");
	}
	else{
		die($con->error);
	}
}

if (isset($_GET['delete_id'])) {
	$id = htmlspecialchars($_GET['delete_id']);
	$delete = "DELETE FROM supplier_tbl WHERE supplier_id = '$id'";
	if (mysqli_query($con, $delete) === true) {
		header("Location: ../supplier.php");
	}
	else{
		die($con->error);
	}
	
}

?>