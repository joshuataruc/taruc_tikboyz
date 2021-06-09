<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tikboys</title>
	<link rel="icon" href="icons/logo.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
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
		.nav-bg{
			background-color: #f3f3f3;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-md nav-bg  fixed-top mb-4">
       <a class="navbar-brand" href="cart.php"><img src="icons/logo.png" style="width:80px;"></a>
        <ul class="nav navbar-nav navbar-right ml-auto">
        	<li><?php if ($_SESSION['user_access_type'] == 'Admin'): ?>
			<a href="dashboard.php" class="text-dark float-right cart-link nav-link">Dashboard</a>
		<?php endif ?></li>
			<li><a href="cart.php" class="text-dark nav-link"> Cart</i></i></a></li>
			<li><?php if ($_SESSION['user_access_type'] == 'Staff'): ?>
			<a href="staff_sales.php" class="text-dark float-right cart-link nav-link">Sales</a>
		<?php endif ?></li>
        	
		<li><a href="logout.php" class="text-dark float-right cart-link nav-link ml-2"><i class="fas fa-sign-out-alt"></i></a></li>

        </ul>
      </nav>
		<div class="container-fluid">
			<div class="card input-card">
				<div class="card-body">
					<label class="msg"></label>
					<form method="post" action="checkout_process.php" data-ajax="false">
						<div class="row">		
							<div class="col-md-5 form-group">
								<label>Customer Name</label>
								<input type="text" name="customer_name"  id="customer_name" class="form-control" required>
							</div>
							<div class="col-md-5 form-group">
								<label>Customer Contact Number</label>
								<input type="text" name="customer_cont_number" maxlength="11" id="customer_cont_number" class="form-control" onkeypress='validate(event)' onpaste="return false;" required>
							</div>
							<div class="col-md-2 form-group">
								<label>OR #</label>
								<input type="text" name="or_number" maxlength="5" id="" class="form-control" >
							</div>
							<div class="col-md-12 form-group">
								<label>Address</label>
								<textarea rows="2" class="form-control" name="address" required id="address"></textarea>
								<input type="submit" name="checkout_btn" class="btn btn-primary float-right mt-3" id="check_out_btn" value="Proceed">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="js/number_only_input.js"></script>
		<script src="js/jquery.min.js"></script>

		<script>
			$('#check_out_btn').click(function(){
				window.setTimeout(function() {
				    window.location.href = 'cart.php';
				}, 1000);
			}

		</script>

	</body>
	</html>