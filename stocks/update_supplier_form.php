<?php 
include_once '../dbase/dbase.php';

$id  = htmlspecialchars($_GET['stock_id']);
$stocks_data = "SELECT * FROM brands ORDER BY brand_id ASC";
$stock_query = mysqli_query($con, $stocks_data) or die($con->error);

$supplier = "SELECT * FROM supplier_tbl ORDER BY supplier_id ASC";
$sup_query = mysqli_query($con, $supplier) or die($con->error);

$data = "SELECT * FROM stock WHERE stock_id = '$id'";
$query = mysqli_query($con, $data) or die($con->error);
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
		.img-large{
			width: 100px;
			transition:transform 0.25s ease;
		}
		.img-large:hover{
			-webkit-transform:scale(1.5);
    		transform:scale(2);

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
					<form action="process.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<input type="hidden" name="id" class="form-control" value="<?php echo $row['stock_id'] ?>">
							<div class="form-group col-md-6">
								<label>Brand Name</label>
								<select name="brand_name" class="form-control" id="brand">
				 					<?php while ($stock_row = $stock_query->fetch_assoc()): ?>
				 						<option hidden="" selected="" value="<?php echo $row['brand_name'] ?>"><?php echo $row['brand_name'] ?></option>
				 						<option value="<?php echo $stock_row['brand_names']; ?>"><?php echo $stock_row['brand_names']; ?></option>
				 					<?php endwhile ?>
				 				</select>
							</div>
							<div class="form-group col-md-6">
								<label>Item Name</label>
								<input type="text" name="item_name" class="form-control" value="<?php echo $row['item_name'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Item Code</label>
								<input type="text" name="item_code" class="form-control" value="<?php echo $row['item_code'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Supplier</label>
								<select name="supplier" class="form-control" id="supplier">
				 					<?php while ($supp_row = $sup_query->fetch_assoc()): ?>
				 						<option hidden="" selected="" value="<?php echo $row['supplier'] ?>"><?php echo $row['supplier'] ?></option>
				 						<option value="<?php echo $supp_row['supplier_name']; ?>"><?php echo $supp_row['supplier_name']; ?></option>
				 					<?php endwhile ?>
				 				</select>
							</div>
							<div class="form-group col-md-6" >
								<label>Quantity</label>
								<input type="text" name="quantity"  class="form-control" value="<?php echo $row['quantity'] ?>" onkeypress='validate(event)' onpaste="return false;">
								<label id="pass-message"></label>
							</div>
							<div class="form-group col-md-6">
								<label>Price</label>
								<input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>" onkeypress='validate(event)' onpaste="return false;" placeholder="₱">
							</div>
							<div class="form-group col-md-12">
								<label>Description</label>
								<textarea class="form-control" rows="3" name="description"><?php echo $row['description']; ?></textarea>
							</div>
							<div class="col-lg-12 col-sm-12 col-md-12">
							<div class="custom-file ">
								<input type="file" name="item_image" class="custom-file-input" id="item_mage" accept="image/*">
								<label class="custom-file-label" for="item_image">Update Photo</label>
								<small class="text-muted">If You're not gonna update the photo just leave it blank</small>
								<p class="status mt-1"></p><br>
							</div>
							<div class="col-lg-12 col-sm-12 col-md-12">
								<img src="stocks_image/<?php echo $row['item_img'] ?>" class="img-large">
								<input type="submit" id="submit-btn" name="upd_btn" value="Update Stocks" class="float-right btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="../js/jquery.min.js"></script>
		<script src="../js/number_only_input.js"></script>
		<script>
			
	
	 $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
	$().ready(function() {
  $('[type="file"]').change(function() {
    var fileInput = $(this);
    if (fileInput.length && fileInput[0].files && fileInput[0].files.length) {
      var url = window.URL || window.webkitURL;
      var image = new Image();
      image.onload = function() {
        $('.status').empty();
        $('.status').append('Valid Image');
        $('.status').addClass('text-primary');
        $('#submit-btn').attr('disabled', false);
      };
      image.onerror = function() {
         $('.status').empty();
        $('.status').append('The File you uploaded is not a Image');
        $('.status').addClass('text-danger');
        $('#submit-btn').attr('disabled', true);
      };
      image.src = url.createObjectURL(fileInput[0].files[0]);
    }
  });
});

		</script>
	</body>
	</html>
	