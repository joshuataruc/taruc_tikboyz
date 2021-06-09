<!DOCTYPE html>
<html>
<head>
	<title>Insert User</title>
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
					<form action="insert_user.php" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Username</label>
								<input type="text" name="username" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Access Type</label>
								<select class="form-control" name="access_type" required>
									<option hidden="" selected=""></option>
									<option value="Admin">Admin</option>
									<option value="Staff">Staff</option>Staff
								</select>
							</div>
							<div class="form-group col-md-6" >
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" required><br>
								<label id="pass-message"></label>
							</div>
							<div class="form-group col-md-6">
								<label>Confirm Password</label>
								<input type="password" name="password" id="con-password" class="form-control" required><br>
								<input type="submit" id="submit-btn" name="login" value="Insert User" class="float-right btn btn-warning">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/confirm_password.js"></script>
	</body>
	</html>

