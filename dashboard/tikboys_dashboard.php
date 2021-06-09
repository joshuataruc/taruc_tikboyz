 <?php 
include_once 'dbase/dbase.php';
$day = date('Y/m/d');
$select_today = "SELECT * FROM sales_tbl WHERE date_sales = '$day'";
$today_query = mysqli_query($con, $select_today) or die($con->error);
if (mysqli_num_rows($today_query) > 0) {
	$today_sales = 0;
 	while ($sales_row = $today_query->fetch_assoc()) {
 		$today_sales += $sales_row['item_price'];
 	}
 }
 else{
 	$today_sales = 0;
 }

$stocks = "SELECT * FROM stock";
$stock_query = mysqli_query($con, $stocks) or die($con->error);
if (mysqli_num_rows($stock_query)) {
	$total_stock = 0;
	while ($stock_row = $stock_query->fetch_assoc()) {
		$total_stock += $stock_row['quantity'];
	}
}

$supplier = "SELECT * FROM supplier_tbl";
$supplier_stock = mysqli_query($con, $supplier) or die($con->error);
$total_supplier = mysqli_num_rows($supplier_stock);

$user = "SELECT * FROM users";
$user_query = mysqli_query($con, $user) or die($con->error);
$total_user = mysqli_num_rows($user_query);


?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row mt-4">
			<div class="col-xl-3 col-md-6 mb-4 ">
				<a href="sales.php" style="text-decoration:none">

					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales</div>
									<div class="h5 mb-0 font-weight-bold text-primary"> &#8369; <?php echo number_format($today_sales, 2); ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-chart-line fa-2x icon-color"></i>
								</div>
							</div>
						</div>
					</div>

				</a>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<a href="stocks.php" style="text-decoration:none">

					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Stock's</div>
									<div class="h5 mb-0 font-weight-bold text-success"><?php echo $total_stock; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-layer-group fa-2x icon-color"></i>
								</div>
							</div>
						</div>
					</div>

				</a>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<a href="supplier.php" style="text-decoration:none">

					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Supplier's</div>
									<div class="h5 mb-0 font-weight-bold text-info"><?php echo $total_supplier ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-truck-loading fa-2x icon-color"></i>
								</div>
							</div>
						</div>
					</div>

				</a>
			</div>	
			<div class="col-xl-3 col-md-6 mb-4">
				<a href="users.php" style="text-decoration:none">

					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User's</div>
									<div class="h5 mb-0 font-weight-bold text-warning"><?php echo $total_user; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x icon-color"></i>
								</div>
							</div>
						</div>
					</div>

				</a>
			</div>		

		</div>
	</div>






</body>
</html>