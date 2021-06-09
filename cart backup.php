<?php 

session_start();
// session_destroy();
include_once 'dbase/dbase.php';

$stocks_data = "SELECT * FROM brands ORDER BY brand_id ASC";
$stock_query = mysqli_query($con, $stocks_data) or die($con->error);

// $item_data = "SELECT * FROM item_type ORDER BY item_id ASC";
// $item_query = mysqli_query($con, $item_data) or die($con->error);



//for cart

$product_ids = array();
//check if add to cart btn has been submitted
if (filter_input(INPUT_POST, 'add_to_cart')) {
	if (isset($_SESSION['shopping_cart'])) {
		$count = count($_SESSION['shopping_cart']); // count how many products are in shopping cart

		$product_ids = array_column($_SESSION['shopping_cart'], 'id');

		if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids )) {
			$_SESSION['shopping_cart'][$count ] = array (
			'id' => filter_input(INPUT_GET, 'id'),
			'item_name' => filter_input(INPUT_POST, 'item_name'),
			'item_brand' => filter_input(INPUT_POST, 'item_brand'),
			'item_code' => filter_input(INPUT_POST, 'item_code'),
			'item_quantity' => filter_input(INPUT_POST, 'item_quantity'),
			'item_price' => filter_input(INPUT_POST, 'item_price')
		);}
		else{
			for ( $i = 0; $i < count($product_ids); $i++) { 
				if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
					//add item to the existing product array 
					$_SESSION['shopping_cart'][$i]['item_quantity'] += filter_input(INPUT_POST, 'item_quantity');
				}
			}
		}


	}
	else{ // if shopping cart doesnt exist, create fitst product array
		$_SESSION['shopping_cart'][0] = array (
			'id' => filter_input(INPUT_GET, 'id'),
			'item_name' => filter_input(INPUT_POST, 'item_name'),
			'item_brand' => filter_input(INPUT_POST, 'item_brand'),
			'item_code' => filter_input(INPUT_POST, 'item_code'),
			'item_quantity' => filter_input(INPUT_POST, 'item_quantity'),
			'item_price' => filter_input(INPUT_POST, 'item_price')
		);
	}
}

//remove product
if (filter_input(INPUT_GET, 'action') == 'delete') {
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		if ($product['id'] == filter_input(INPUT_GET, 'id')) {
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12 form-group mt-5">
 				<input type="text" class="form-control" id="item_search" placeholder="Item Code"></input>
 			</div>
 			
 			<div class="col-md-6">
 				<label>Brand</label>
 				<select name="brand_name" class="form-control" id="brand">
 					<?php while ($stock_row = $stock_query->fetch_assoc()): ?>
 						<option hidden="" selected=""></option>
 						<option value="<?php echo $stock_row['brand_names']; ?>"><?php echo $stock_row['brand_names']; ?></option>
 					<?php endwhile ?>
 				</select>
 			</div><!-- end col -->
 			<div class="col-md-6">
 				<label>Item Name</label>
 				<select name="item_name" class="form-control" id="item" disabled>
 						<!-- <?php #while ($item_row = $item_query->fetch_assoc()): ?>
 						<option hidden="" selected=""></option>
 						<option value="<?php# echo $item_row['item_type']; ?>"><?php #echo $item_row['item_type']; ?></option>
 					<?php# endwhile ?> -->
 				</select>

 			</div><!-- end col -->

 		</div><!-- end row -->

 		<div id="content">
 			
 		</div>
 		<div class="table-reponsive mt-3">
 			<table class="table">
 				<tr><th colspan="6"><h3>Order Details</h3></th></tr>
 				<tr>
 					<th width="45%">Product Name</th>
 					<th width="10%">Brand</th>
 					<th width="10%">Quantity</th>
 					<th width="20%">Price</th>
 					<th width="10%">Total</th>
 					<th width="5%">Action</th>

 				</tr>
 				<?php 
 					if (!empty($_SESSION['shopping_cart'])):
 						$total = 0;
 						foreach ($_SESSION['shopping_cart'] as $key => $product):
 				 ?>
 				 <tr>
 				 	<td><?php echo $product['item_name']; ?></td>
 				 	<td><?php echo $product['item_brand']; ?></td>
 				 	<td><?php echo $product['item_quantity']; ?></td>
 				 	<td>₱ <?php echo $product['item_price']; ?></td>
 				 	<td>₱ <?php echo number_format($product['item_quantity'] * $product['item_price'], 2) ?></td>
 				 	<td>
 				 		<a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
 				 			<div class="btn btn-danger btn-small">Remove</div>
 				 		</a>
 				 	</td>
 				 </tr>
 				 <?php 
 				 	$total = $total + ($product['item_quantity'] *  $product['item_price']);
 				 endforeach;
 				  ?>
 				  <tr>
 				  	<td colspan="4" align="right">Grand Total</td>
 				  	<td align="right">₱ <?php echo number_format($total, 2); ?> </td>
 				  </tr>

 				  <tr >
 				  	<td colspan="6">
 				  		<?php
		 				  	 if (isset($_SESSION['shopping_cart'])):
		 				  	 if (count($_SESSION['shopping_cart'])> 0):
		 				  	 ?>
		 				  	 	<a href="#" class="button">Check Out</a>
		 				 <?php endif; endif; ?>
 				  	</td>
 				  </tr>
 			<?php endif; ?>
 			</table>
 		</div>

 	</div>

 	<script src="js/jquery.min.js"></script>
 	<script src="js/cart.js"></script>
 	<script src="js/number_only_input.js"></script>
 </body>
 </html>