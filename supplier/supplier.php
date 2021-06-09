<?php 
include_once '../dbase/dbase.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Supplier</title>
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
					<form action="insert_supplier.php" method="post" >
						<div class="row">
							<div class="col-md-6 col-lg-6 col-md-12 form-group">
								<label>Company Name</label>
								<input type="text" name="sup_name" class="form-control" required>
							</div>
							<div class="col-md-6 col-lg-6 col-md-12 form-group">
								<label>Brand</label>
								<input type="text" name="sup_brand" class="form-control" required>
							</div>
							<div class="col-md-12 col-lg-12 col-md-12 form-group" >
								<label>Address</label>
								<textarea name="sup_address" class="form-control" rows="3" required></textarea>
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Person</label>
								<input type="text" name="sup_cont_person" class="form-control" required>
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Number</label>
								<input type="text" name="sup_cont_number" maxlength="11" required class="form-control"  onkeypress='validate(event)' onpaste="return false;">
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Email</label>
								<input type="email" name="sup_cont_email" class="form-control">
								<input type="submit" name="sup_btn" value="Insert Supplier" class="btn btn-warning float-right mt-2">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/number_only_input.js"></script>
	</body>
	</html>
	