<?php 
include_once '../dbase/dbase.php';

if (isset($_POST['upd_btn'])) {
	$id = htmlspecialchars($_POST['id']);
	$fname = htmlspecialchars(ucfirst($_POST['fname']));
	$lname = htmlspecialchars(ucfirst($_POST['lname']));
	$username = htmlspecialchars($_POST['username']);
	$access_type = htmlspecialchars($_POST['access_type']);
	$password = htmlspecialchars($_POST['password']);

	if (empty($password)) {
		$update_user = "UPDATE users SET fname = '$fname', lname = '$lname', username = '$username', access_type =  '$access_type' WHERE id = '$id' ";
		if (mysqli_query($con, $update_user) === true) {
			header("Location: ../users.php");
		}
		else{
			die($con->error);
		}
	}
	else{
		$pass = md5($password);
		$update_user = "UPDATE users SET fname = '$fname', lname = '$lname', username = '$username', access_type =  '$access_type', password = '$pass' WHERE id = '$id' ";
		if (mysqli_query($con, $update_user) === true) {
			header("Location: ../users.php");
		}
		else{
			die($con->error);
		}
	}

}

if (isset($_GET['delete_id'])) {
	$id = htmlspecialchars($_GET['delete_id']);
	$delete = "DELETE FROM users WHERE id = '$id'";
	if (mysqli_query($con, $delete) === true) {
		header("Location: ../users.php");
	}
	else{
		die($con->error);
	}
	
}

 ?>