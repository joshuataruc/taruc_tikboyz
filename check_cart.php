<?php 

session_start();
// session_destroy();
$status="";
if (isset($_POST['action']) && $_POST['action'] == "remove" ) {
	if (!empty($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $key => $value) {
			if ($_POST['item_code'] == $key ) {
				unset($_SESSION["shopping_cart"][$key]);
				$status = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Product is already added to your cart!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}
			if(empty($_SESSION['shopping_cart'])){
				unset($_SESSION['shopping_cart']);
			}
		}
	}
}

if (isset($_POST['action']) && $_POST['action'] == "change" ) {
	foreach ($_SESSION['shopping_cart'] as $key => &$value) {
		if ($value['item_code'] === $_POST["item_code"] ) {
			if ($_POST['quantity'] > $_POST['stock'] ) {
				$status = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				The Quantity Exceeds our Stocks!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';


			}
			else{
				$value['quantity'] = $_POST['quantity'];
				break;

			}
			
		}
	}
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
		.nav-bg{
			background-color: #f3f3f3;
		}
		/*.qty{
			width: 80% !important;
			}*/
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
					<li><a href="logout.php" class="text-dark float-right cart-link nav-link ml-2"><i class="fas fa-sign-out-alt"></i></a></li>
				</ul>
			</nav>
			<br><br>
			<div class="container mt-5">
				<div class="message_box">
					<?php echo $status; ?>
				</div>
				<div class="cart">
					<?php 
					if (isset($_SESSION["shopping_cart"])) {
						$total_price = 0;
						?>
						<table class="table" id="table">
							<thead>
								<tr>
									<th width="20%">Item Name</th>
									<th width="20%">Brand Name</th>
									<th width="15%">Quantity</th>
									<th width="15%">Price</th>
									<th width="15%">Total</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['shopping_cart'] as $product) { ?>
									<tr>
										<td><?php echo $product["item_name"] ?><br></td>
										<td><?php echo $product['brand_name']; ?></td>
										<td>
											<form method="post" action="" class="form">
												<input type="hidden" name="item_code" value="<?php echo $product["item_code"] ?>">
												<input type="hidden" name="action" value="change">
												<input type="number"  min="1"  name="quantity" value="<?php echo $product["quantity"] ?>" class="form-control qty"> 
												<!-- onChange="this.form.submit()"; -->
												<input type="hidden" name="stock" value="<?php echo $product["current_quantity"]; ?>">
												<label class="stocks text-muted float-right">Stock's Available <?php echo $product["current_quantity"]; ?></label>
											</form>
										</td>
										<td><?php echo "&#x20B1; ".number_format($product["price"], 2); ?></td>
										<td><?php echo "&#x20B1; ".number_format($product["price"]*$product["quantity"], 2) ; ?></td>
										<td><form method="post" action="">
											<input type="hidden" name="item_code" value="<?php echo $product["item_code"] ?>">
											<input type="hidden" name="action" value="remove">
											<button type='submit' class='remove btn btn-danger'><i class="fas fa-trash"></i></button>
										</form></td>
									</tr>
									<?php
									$total_price += ($product["price"] * $product["quantity"] );
								} ?>
								<tr>
									<td colspan="6" align="right">
										<strong>TOTAL: <?php  echo "&#x20B1; " . number_format($total_price, 2) ?></strong> <br><br>
										<a href="checkout.php" class="btn checkout_btn btn-primary btn-block" id="checkout_btn">Check Out</a>
									</td>
								</tr>

							</tbody>
						</table>
						<?php 
					}
					else{
						echo "<h3>Your cart is empty!</h3>";
					}
					?>

				</div>


			</div>

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/cart.js"></script>
			<script>

				$('.qty').change(function(){
					var qty $('.qty').val();
					if (isNaN(qty) || qty <= 0 ) {
						$('.qty').val() = 1
						$(".form").submit();
					}
				})
			</script>
		</body>
		</html>