<?php 
include_once '../dbase/dbase.php';
$id = htmlspecialchars($_GET['supplier_id']);
$select_data = "SELECT * FROM supplier_tbl WHERE supplier_id = '$id' ";
$query = mysqli_query($con, $select_data);
$row = $query->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tikboys</title>
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
					<form action="process.php" method="post" >
						<div class="row">
							<input type="hidden" name="sup_id" class="form-control" value="<?php echo $row['supplier_id'] ?>">
							<div class="col-md-6 col-lg-6 col-md-12 form-group">
								<label>Company Name</label>
								<input type="text" name="sup_name" class="form-control" value="<?php echo $row['supplier_name'] ?>">
							</div>
							<div class="col-md-6 col-lg-6 col-md-12 form-group">
								<label>Brand</label>
								<input type="text" name="sup_brand" class="form-control" value="<?php echo $row['supplier_brand'] ?>">
							</div>
							<div class="col-md-12 col-lg-12 col-md-12 form-group" >
								<label>Address</label>
								<textarea name="sup_address" class="form-control" rows="3" ><?php echo $row['supplier_address'] ?></textarea>
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Person</label>
								<input type="text" name="sup_cont_person" class="form-control" value="<?php echo $row['supplier_cont_person'] ?>">
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Number</label>
								<input type="text" name="sup_cont_number" maxlength="11" value="<?php echo $row['supplier_number'] ?>" class="form-control"  onkeypress='validate(event)' onpaste="return false;">
							</div>
							<div class="col-md-4 col-lg-4 col-md-12 form-group">
								<label>Contact Email</label>
								<input type="email" name="sup_cont_email" class="form-control" value="<?php echo $row['supplier_email'] ?>">
								<input type="submit" name="sup_btn" value="Update Supplier" class="btn btn-warning float-right mt-2">
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
	