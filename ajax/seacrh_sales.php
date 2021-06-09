<?php
include_once '../dbase/dbase.php'; 
$total_sales = 0;
if (isset($_GET['from_date']) &&  isset($_GET['to_date'])) {
	$from  = htmlspecialchars($_GET['from_date']);
	$to = htmlspecialchars($_GET['to_date']);

	$select_data = "SELECT * FROM sales_tbl WHERE date_sales BETWEEN '$from' AND '$to' ";
	$query = mysqli_query($con, $select_data) or die($con->error);
	if (mysqli_num_rows($query) > 0 ) {
				while ($row = $query->fetch_assoc()) {

					echo '<tr>
		 			<td> '.$row['item_name'].' </td>
		 			<td> '.$row['item_brand'].' </td>
		 			<td> '.$row['item_code'].' </td>
		 			<td> '.$row['item_qty'].' </td>
		 			<td> '.number_format($row['item_price'], 2).' </td>
		 			<td> '.$row['customer_name'].' </td>
		 			<td> '.$row['OR_num'].' </td>
		 			<td> '.$row['AR_num'].' </td>
		 			<td> '.$row['customer_cont_num'].' </td>
		 			<td> '.$row['customer_address'].' </td>
		 			<td> '.$row['date_sales']. ' ' . $row['time_sales']. ' </td>
		 			<td> '.$row['seller'].' </td>
		 			</tr>';
		 			$total_sales += $row['item_price'];
				}
				echo '<tr>
					<td colspan="12" class="tot_sales"> Total Sales <b>' . number_format($total_sales, 2) .'</b></td>
					</tr>';
	}
	else{
		echo '<tr class="jumbotron" >
				<td></td>
				<td colspan="12" class="td-space mx-auto"><h3>No Sales between '. date("F j, Y", strtotime($from)) . ' to ' . date("F j, Y", strtotime($to)) .  '</h3></td>
			 </tr>';


	}
}


if (isset($_GET['daily_rep'])) {
	$day = htmlspecialchars($_GET['daily_rep']);
	$daily = date("Y/m/d");
	$select_data = "SELECT * FROM sales_tbl WHERE date_sales = '$day'";
	$query = mysqli_query($con, $select_data)or die($con->error);
	if (mysqli_num_rows($query) > 0) {
		while ($row = $query->fetch_assoc()) {

					echo '<tr>
		 			<td> '.$row['item_name'].' </td>
		 			<td> '.$row['item_brand'].' </td>
		 			<td> '.$row['item_code'].' </td>
		 			<td> '.$row['item_qty'].' </td>
		 			<td> '.number_format($row['item_price'], 2).' </td>
		 			<td> '.$row['customer_name'].' </td>
		 			<td> '.$row['OR_num'].' </td>
		 			<td> '.$row['AR_num'].' </td>
		 			<td> '.$row['customer_cont_num'].' </td>
		 			<td> '.$row['customer_address'].' </td>
		 			<td> '.$row['date_sales']. ' ' . $row['time_sales']. ' </td>
		 			<td> '.$row['seller'].' </td>
		 			</tr>';
		 			$total_sales += $row['item_price'];
				}
				echo '<tr>
					<td colspan="12" class="tot_sales"> Total Sales <b>' . number_format($total_sales, 2) .'</b></td>
					</tr>';
	}//end if
	else{
		echo '<tr class="jumbotron" >
				<td></td>
				<td colspan="12" class="td-space mx-auto"><h3>No Sales for Today</h3></td>
			 </tr>';


	}//end else
}//emd


if (isset($_GET['weekly_rep'])) {
	$today = htmlspecialchars($_GET['weekly_rep']);
	$weekly = date('Y/m/d', strtotime('-7 days', strtotime($today)));

	$select_weekly = "SELECT * FROM sales_tbl WHERE date_sales BETWEEN '$weekly' AND '$today' ";
	$query = mysqli_query($con, $select_weekly) or die($con->error);
	if (mysqli_num_rows($query) > 0) {
		while ($row = $query->fetch_assoc()) {

					echo '<tr>
		 			<td> '.$row['item_name'].' </td>
		 			<td> '.$row['item_brand'].' </td>
		 			<td> '.$row['item_code'].' </td>
		 			<td> '.$row['item_qty'].' </td>
		 			<td> '.number_format($row['item_price'], 2).' </td>
		 			<td> '.$row['customer_name'].' </td>
		 			<td> '.$row['OR_num'].' </td>
		 			<td> '.$row['AR_num'].' </td>
		 			<td> '.$row['customer_cont_num'].' </td>
		 			<td> '.$row['customer_address'].' </td>
		 			<td> '.$row['date_sales']. ' ' . $row['time_sales']. ' </td>
		 			<td> '.$row['seller'].' </td>
		 			</tr>';
		 			$total_sales += $row['item_price'];
				}
				echo '<tr>
					<td colspan="12" class="tot_sales"> Total Sales <b>' . number_format($total_sales, 2) .'</b></td>
					</tr>';
	}//end if
	else{
		echo '<tr class="jumbotron" >
				<td></td>
				<td colspan="12" class="td-space mx-auto"><h3>No Sales for this Week</h3></td>
			 </tr>';


	}//end else
}

if (isset($_GET['monthly_rep'])) {
	$today = htmlspecialchars($_GET['monthly_rep']);
	$month = date('Y/m/d', strtotime('-31 days', strtotime($today)));

	$select_month = "SELECT * FROM sales_tbl WHERE date_sales BETWEEN '$month' AND '$today'";
	$query = mysqli_query($con, $select_month) or die($con->error);
	if (mysqli_num_rows($query) > 0) {
		while ($row = $query->fetch_assoc()) {

					echo '<tr>
		 			<td> '.$row['item_name'].' </td>
		 			<td> '.$row['item_brand'].' </td>
		 			<td> '.$row['item_code'].' </td>
		 			<td> '.$row['item_qty'].' </td>
		 			<td> '.number_format($row['item_price'], 2).' </td>
		 			<td> '.$row['customer_name'].' </td>
		 			<td> '.$row['OR_num'].' </td>
		 			<td> '.$row['AR_num'].' </td>
		 			<td> '.$row['customer_cont_num'].' </td>
		 			<td> '.$row['customer_address'].' </td>
		 			<td> '.$row['date_sales']. ' ' . $row['time_sales']. ' </td>
		 			<td> '.$row['seller'].' </td>
		 			</tr>';
		 			$total_sales += $row['item_price'];
				}
				echo '<tr>
					<td colspan="12" class="tot_sales"> Total Sales <b>' . number_format($total_sales, 2) .'</b></td>
					</tr>';
	}//end if
	else{
		echo '<tr class="jumbotron" >
				<td></td>
				<td colspan="12" class="td-space mx-auto"><h3>No Sales for this last 31 days</h3></td>
			 </tr>';


	}//end else

}


if (isset($_GET['annually_rep'])) {
	$today = htmlspecialchars($_GET['annually_rep']);
	$yearly = date('Y/m/d', strtotime('-364 days', strtotime($today)));

	$select_yearly = "SELECT * FROM sales_tbl WHERE date_sales BETWEEN '$yearly' AND '$today'";
	$query = mysqli_query($con, $select_yearly) or die($con->error);
	if (mysqli_num_rows($query) > 0) {
		while ($row = $query->fetch_assoc()) {

					echo '<tr>
		 			<td> '.$row['item_name'].' </td>
		 			<td> '.$row['item_brand'].' </td>
		 			<td> '.$row['item_code'].' </td>
		 			<td> '.$row['item_qty'].' </td>
		 			<td> '.number_format($row['item_price'], 2).' </td>
		 			<td> '.$row['customer_name'].' </td>
		 			<td> '.$row['OR_num'].' </td>
		 			<td> '.$row['AR_num'].' </td>
		 			<td> '.$row['customer_cont_num'].' </td>
		 			<td> '.$row['customer_address'].' </td>
		 			<td> '.$row['date_sales']. ' ' . $row['time_sales']. ' </td>
		 			<td> '.$row['seller'].' </td>
		 			</tr>';
		 			$total_sales += $row['item_price'];
				}
				echo '<tr>
					<td colspan="12" class="tot_sales"> Total Sales <b>' . number_format($total_sales, 2) .'</b></td>
					</tr>';
	}//end if
	else{
		echo '<tr class="jumbotron" >
				<td></td>
				<td colspan="12" class="td-space mx-auto"><h3>No Sales for this past 365</h3></td>
			 </tr>';


	}//end else
}


 ?>
