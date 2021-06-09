<?php 
session_start();
include_once 'dbase/dbase.php';


$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$pass = md5($password);

$select_user = "SELECT * FROM users WHERE username = '$username'";
$user_query = mysqli_query($con, $select_user) or die($con->error);
if (mysqli_num_rows($user_query) > 0 ) {
	$select_user_and_password = "SELECT * FROM users WHERE username = '$username' && password = '$pass' ";
	$user_and_password_query = mysqli_query($con, $select_user_and_password);
	if (mysqli_num_rows($user_and_password_query) == 1) {
		$get_user_id = $user_and_password_query->fetch_assoc();
		$_SESSION['user_id'] = $get_user_id['id'];
		$_SESSION['user_username'] = $get_user_id['username'];
		$_SESSION['user_access_type'] = $get_user_id['access_type'];
		$_SESSION['user_fname'] = $get_user_id['fname'];
		$_SESSION['user_lname'] = $get_user_id['lname'];

		if ($_SESSION['user_access_type'] === 'Staff') {
			header('location:cart.php');
		}
		elseif($_SESSION['user_access_type'] === 'Admin'){
			header('location:dashboard.php');
		}
		else{
			echo "Something went Wrong ";
		}

	}//end if
	else{
		echo "Wrong Credentials";
	}//end else

}//end if
else{
	echo "No Username found";
}// end else

 ?>