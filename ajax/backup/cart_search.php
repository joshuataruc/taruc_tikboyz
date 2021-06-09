<?php 
include_once '../dbase/dbase.php';
if (isset($_GET['brand']) && !empty($_GET['brand'])) {
	$brand_name = htmlspecialchars($_GET['brand']);
	$select_brand = "SELECT * FROM stock WHERE brand_name = '$brand_name' ORDER BY stock_id ASC";
	$brand_query = mysqli_query($con, $select_brand) or die($con->error);
	if (mysqli_num_rows($brand_query) > 0 ) {
		while ($brand_row = $brand_query->fetch_assoc()) {
			echo '<option value="' . $brand_row['item_name'] . '">' . $brand_row['item_name'] . '</option>';
		}
	}
	else{
		echo '<option value="">Item Code not Available</option>';
	}
}




 ?>