<?php 

include_once '../dbase/dbase.php';

if (isset($_POST['sup_btn'])) {
	$sup_name = htmlspecialchars($_POST['sup_name']);
	$sup_brand = htmlspecialchars($_POST['sup_brand']);
	$sup_address = htmlspecialchars($_POST['sup_address']);
	$sup_cont_person = htmlspecialchars($_POST['sup_cont_person']);
	$sup_cont_number = htmlspecialchars($_POST['sup_cont_number']);
	$sup_cont_email = htmlspecialchars($_POST['sup_cont_email']);

	$insert_sup = "INSERT INTO supplier_tbl(supplier_name, supplier_brand, supplier_address, supplier_cont_person, supplier_number,	supplier_email)VALUES ('$sup_name', '$sup_brand', '$sup_address', '$sup_cont_person', '$sup_cont_number', '$sup_cont_email')";
	if (mysqli_query($con, $insert_sup) === true) {
		header("Location: ../supplier.php");
	}
	else{
		die($con->error);
	}

}


 ?>