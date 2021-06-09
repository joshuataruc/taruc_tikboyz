<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="icons/logo.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.login-card{
			position: absolute;
			margin:0;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.card{
			width: 30vw;
		}
		.bg-image img{
			width: 33vw;
			margin-top: 10px;
			display: block;
			margin-right: auto;
			margin-left: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="bg-image">
			<img src="icons/logo.png">
		</div>
		<div class="card login-card">
			<div class="card-body">
				<form action="auth.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control"><br>
						<input type="submit" name="login" value="Login" class="float-right btn btn-warning">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>