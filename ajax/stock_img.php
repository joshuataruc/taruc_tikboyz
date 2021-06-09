<?php 

include_once '../dbase/dbase.php';
$id = htmlspecialchars($_GET['id']);
$select_stocks = "SELECT * FROM stock WHERE stock_id = '$id'";
$stocks_query = mysqli_query($con, $select_stocks) or die($con->errpr);

if (mysqli_num_rows($stocks_query)> 0) {
	$row = $stocks_query->fetch_assoc();
	
	echo '<div class="">
		<div class="">
			<img class="card-img-top" src="stocks/stocks_image/'.$row["item_img"].'"><br>
			<label class="mt-1"><b>Item Name</b>: '.$row["item_name"].'</label><br>
			<label class="mt-2"><b>Supplier</b>: '.$row["supplier"].'</label><br>
			<label class="mt-1"><b>Description</b>: '.$row["description"].'</label><br>
		</div>
		</div>';


}

 ?>