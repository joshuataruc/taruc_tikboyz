<?php 

include_once '../dbase/dbase.php';

$fname = htmlspecialchars(ucfirst($_POST['fname']));
$lname = htmlspecialchars(ucfirst($_POST['lname']));
$username = htmlspecialchars($_POST['username']);
$access_type = htmlspecialchars($_POST['access_type']);
$password = htmlspecialchars(md5($_POST['password']));

$insert_user = "INSERT INTO users (fname, lname, username, password, access_type)VALUES('$fname', '$lname', '$username', '$password', '$access_type')";
if (mysqli_query($con, $insert_user) === true) {
	header("Location: ../users.php");
}
else{
	die($con->error);
}

 ?>