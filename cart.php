<?php 
include_once 'dbase/dbase.php';
include_once 'session_check.php';
$stocks_data = "SELECT * FROM brands ORDER BY brand_id ASC";
$stock_query = mysqli_query($con, $stocks_data) or die($con->error);

session_start();
#session_destroy();


$status = "";
if (isset($_POST['item_code']) && $_POST['item_code'] != "" ) {
	$code = $_POST['item_code'];
	$result = mysqli_query($con, "SELECT * FROM stock WHERE item_code = '$code' ");
	$row = mysqli_fetch_assoc($result);
	$name = $row['item_name'];
	$brand_name = $row['brand_name'];
	$item_code = $row['item_code'];
	$price = $row['price'];
	$item_img = $row['item_img'];
	$qty = $row['quantity'];

$cartArray = array(
	$code => array(
		'item_code' 	=> $item_code,
		'item_name' 	=> $name, 
		'brand_name'	=> $brand_name,
		'price' 		=> $price,
		'item_img' 		=> $item_img,
		'current_quantity' => $qty,
		'quantity' 		=> 1)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Product is added to your cart!
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
					</div>';
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  Product is already added to your cart!
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
					</div>';	

	} else {
		$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
		$status = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Product is added to your cart!
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
					</div>';
	}

	}

// echo "<pre>";
// print_r($_SESSION["shopping_cart"]);
// echo "</pre>";

}

  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tikboys</title>
	<link rel="icon" href="icons/logo.png">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
 	<style>
 		.cart-link i{
 			font-size: 18px;
 			
 		}
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
        	<li><?php if ($_SESSION['user_access_type'] == 'Staff'): ?>
			<a href="staff_sales.php" class="text-dark float-right cart-link nav-link">Sales</a>
		<?php endif ?></li>
        	<li><?php if (!empty($_SESSION["shopping_cart"])) {
			$cart_count = count(array_keys($_SESSION["shopping_cart"]));
			?>
			<a href="check_cart.php" class="text-dark float-right cart-link nav-link ml-2"><i class="fas fa-shopping-cart"></i><span><?php echo $cart_count; ?></span></a>
		<?php } ?></li>
		<li><a href="logout.php" class="text-dark float-right cart-link nav-link mt-1 ml-2"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
      </nav>

 	<div class="container mt-5">
 		<div class="row">
 			<div class="col-md-4 form-group">
 				<label>Item Code</label>
 				<input type="text" class="form-control" id="item_search" placeholder=""></input>
 			</div>
 			
 			<div class="col-md-4">
 				<label>Brand</label>
 				<select name="brand_name" class="form-control" id="brand">
 					<?php while ($stock_row = $stock_query->fetch_assoc()): ?>
 						<option hidden="" selected=""></option>
 						<option value="<?php echo $stock_row['brand_names']; ?>"><?php echo $stock_row['brand_names']; ?></option>
 					<?php endwhile ?>
 				</select>
 			</div><!-- end col -->
 			<div class="col-md-4">
 				<label>Item Name</label>
 				<select name="item_name" class="form-control" id="item" disabled>
 				</select>

 			</div><!-- end col -->

 		</div><!-- end row -->

 		
 			<div id="content">
 				<div class="message_box" style="margin:10px 0px;"><?php echo $status; ?></div>
				<div style="clear: both;"></div>
 			
 			</div>
 		


 	</div>

 	<script src="js/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<script src="js/cart.js"></script>
 	<script src="js/number_only_input.js"></script>
 </body>
 </html>