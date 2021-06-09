<?php 
include_once '../dbase/dbase.php';

$user_id = htmlspecialchars($_GET['user_id']);

$select_user = "SELECT * FROM users WHERE id = '$user_id'";
$user_query = mysqli_query($con, $select_user) or die($con->error);
$user_row = $user_query->fetch_assoc();

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title> Tikboys</title>
	<link rel="icon" href="../icons/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		.input-card{
			position: absolute;
			margin:0;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.card{
			width: 60vw;
		}
		/*#submit-btn:hover{
			cursor: not-allowed;
		}*/
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="card input-card">
				<div class="card-body">
					<form action="process.php" method="post">
						<div class="row">
							<input type="hidden" name="id" class="form-control" value="<?php echo $user_row['id']; ?>">
							<div class="form-group col-md-6">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" value="<?php echo $user_row['fname']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" value="<?php echo $user_row['lname']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="<?php echo $user_row['username']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Access Type</label>
								<select class="form-control" name="access_type">
									<option hidden="" selected="" value="<?php echo $user_row['access_type']; ?>"><?php echo $user_row['access_type']; ?></option>
									<option value="Admin">Admin</option>
									<option value="Staff">Staff</option>Staff
								</select>
							</div>
							<div class="form-group col-md-6" >
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" >
								<small class="text-muted">If you wont change the password leave it blank</small><br>
								<label id="pass-message"></label>
							</div>
							<div class="form-group col-md-6">
								<label>Confirm Password</label>
								<input type="password" name="password" id="con-password" class="form-control" ><br>
								<input type="submit" id="submit-btn" name="upd_btn" value="Update User" class="float-right btn btn-warning">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
				$('#password, #con-password').on('keyup', function(){
				if ($('#con-password').val() == $('#password').val()) {
					$('#pass-message').html('Password Match').css('color', '#007bff ');
					$('#submit-btn').attr('disabled', false);
				}
				else{
					$('#pass-message').html('Password did not Match').css('color', '#dc3545  ');
					$('#submit-btn').attr('disabled', true);

				}
			});

		</script>
	</body>
	</html>

