<?php 

include_once '../dbase/dbase.php';

$item_code = htmlspecialchars($_GET['item_code']);
$item_search = "SELECT * FROM stock WHERE item_code LIKE '%" . $item_code . "%' ";
$item_query = mysqli_query($con, $item_search) or die($con->error);
if (mysqli_num_rows($item_query) > 0) {
	echo '<div class="row mt-4">';
	while ($item_row = $item_query->fetch_assoc()){
			// echo $item_row['item_name'] . '<br>' ;
			echo'<div class="col-md-3">
				      <form method="post" action="cart.php?action=add&id='. $item_row['stock_id'].'">
				      <div class="card">
				         <img src="stocks/stocks_image/'.$item_row['item_img'].'" class="card-img-top mt-1 mx-auto img-responsive">
				         <div class="card-body">
				            <label class="text-muted">Item Name: </label> '. $item_row['item_name'].'<br>
				            <label class="text-muted">Brand Name: </label> '. $item_row['brand_name'].'<br>
				            <label class="text-muted">Description: </label> '. $item_row['description'].'<br>
				            <input type=" text" name="item_quantity" class="form-control" required onkeypress="validate(event)" onpaste="return false;" placeholder="Quantity">
				            <label class="text-muted">Stock Available: </label>'. $item_row['quantity'].'<br>
				            <label class="text-muted">Price: </label> '. $item_row['price'].'<br>
				            <input type="hidden"class="form-control" name="item_id" value="'. $item_row['stock_id'].'">
				            <input type="hidden"class="form-control" name="item_name" value="'. $item_row['item_name'].'">
				            <input type="hidden"class="form-control" name="item_brand" value="'. $item_row['brand_name'].'">
				            <input type="hidden"class="form-control" name="item_code" value="'. $item_row['item_code'].'">
				            <input type="hidden"class="form-control" name="item_price" value="'. $item_row['price'].'">
				            <input type="submit" name="add_to_cart" class="float-right btn btn-primary mt-1" value="Add to Cart">
				         </div>
				      </div>
				      <form>
				   </div>';
				
	}
	echo '</div>';
}
else{
	echo '<h2>'.'OUT OF STOCK'.'<h2>'  ;
}



?>