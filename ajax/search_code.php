<?php 

include_once '../dbase/dbase.php';

$item_code = htmlspecialchars($_GET['item_code']);
$item_search = "SELECT * FROM stock WHERE item_code LIKE '%" . $item_code . "%' ";
$item_query = mysqli_query($con, $item_search) or die($con->error);
if (mysqli_num_rows($item_query) > 0) {
	echo '<div class="row" mx-auto>';
	while ($row = $item_query->fetch_assoc()){
			// echo $item_row['item_name'] . '<br>' ;
			echo' <div class=" card-deck col-md-3 col-lg-3 mt-3">
			<div class="card">
			<div class="card-body">
			<form method="post" action="">
			<input type="hidden" name="item_code" value='.$row['item_code'].' />
			<div class="image"><img src="stocks/stocks_image/'.$row['item_img'].'" class="card-img-top"></div>
			<br>
			<div class="brand_name"><label>Brand Name: </label> '.ucfirst($row['brand_name']).'</div>
			<div class="name"><label>Item Name:</label> '.ucfirst($row['item_name']).'</div>
			<div class="name"><label>Available Stock:</label> '.ucfirst($row['quantity']).'</div>
			<div class="price"><label>Unit Price: </label> ₱'.number_format($row['price'],2).'</div>
			<button type="submit" class="buy btn btn-block btn-primary">Buy Now</button>
			</form>
			</div>
			</div>
			</div>';

		}
		echo '</div>';
	}
	else{
		echo '<h2>'.'OUT OF STOCK'.'<h2>'  ;
	}



?>