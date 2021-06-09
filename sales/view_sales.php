<?php 
include_once 'dbase/dbase.php';
$select_data = "SELECT * FROM sales_tbl ";
$query = mysqli_query($con, $select_data) or die($con->error);
$total_sales = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="datatables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.close{
			margin-top: 10px;
			margin-right: 15px;
		}
		.add_btn{
			margin-top: 30px;;
		}
		.td-space{
			border-spacing: 0 1em;
		}
		.tot_sales{
			text-align: right;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="card shadow">
			<div class="card-body">
				<form class="">
					<div class="row">
						<div class="col-md-12 ">
							<div id="alerts"></div>
						</div>
						<label id="date_container" hidden><?php echo date("Y/m/d") ?></label>
						<div class=" form-group col-md-3">
							<button class="btn btn-warning btn-block" id="daily">Daily</button>
						</div>
						<div class=" form-group col-md-3">
							<button class="btn btn-warning btn-block" id="weekly">Weekly</button>
						</div>
						<div class=" form-group col-md-3">
							<button class="btn btn-warning btn-block" id="monthly">Monthly</button>
						</div>
						<div class=" form-group col-md-3">
							<button class="btn btn-warning btn-block" id="yearly">Annual</button>
						</div>

						<div class=" form-group col-md-5">
							<label>From Date</label>
							<input type="date" name="date_from" id="date_from" placeholder="From Date" class="form-control">
						</div>
						<div class="form-group col-md-5">
							<label>To Date</label>
							<input type="date" name="date_to" id="date_to"  placeholder="To Date" class="form-control">
						</div>
						<div class="form-group col-md-2">
							<button class="btn btn-warning add_btn search_btn" id="search_btn"><i class="fas fa-search"></i></button>
							<!-- <a href="" class="btn btn-primary add_btn search_btn"><i class="fas fa-search"></i></a> -->
						</div>
					</div>
				</form>



				<table id="sales_tbl" class="table display table-hover" >
					<thead>
						<tr>
							
							<th>Item Name</th>
							<th>Brand </th>
							<th>Item Code</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Sold To</th>
							<th>OR #</th>
							<th>AR #</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Date/Time</th>
							<th>Seller</th>


						</tr>				 	
					</thead>	
					<tbody id="tbody">
						<?php while ($row = $query->fetch_assoc()): ?>
							<tr>
								
								<td> <?php echo $row['item_name'] ?> </td>
								<td> <?php echo $row['item_brand']?> </td>
								<td> <?php echo $row['item_code']?> </td>
								<td> <?php echo $row['item_qty']?> </td>
								<td> <?php echo $row['item_price']?> </td>
								<td> <?php echo $row['customer_name']?> </td>
								<td> <?php echo $row['OR_num'] ?> </td>
								<td> <?php echo $row['AR_num'] ?> </td>
								<td> <?php echo $row['customer_cont_num']?> </td>
								<td> <?php echo $row['customer_address']?> </td>
								<td> <?php echo $row['date_sales'] .' '. $row['time_sales'] ?></td>
								<td> <?php echo $row['seller']?></td>
								</tr>
								<?php $total_sales += $row['item_price'] ?>
							<?php endwhile; ?>
							
						</tbody>
						<tr>
								<td colspan="12" class="tot_sales" id="old-sales"> Total Sales <b><?php echo number_format($total_sales, 2) ?> </b></td>
							</tr>
					</table>

				</div>
			</div>
		</div>


		<script src="https://kit.fontawesome.com/428feb9164.js"></script>
		<script src="datatables/jquery-3.3.1.min.js"></script>
		<script src="datatables/jquery.dataTables.min.js"></script>
		<script src="datatables/dataTables.bootstrap4.min.js"></script>
		<script src="datatables/dataTables.buttons.min.js"></script>
		<script src="datatables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
		<script src="datatables/jszip.min.js"></script>
		<script src="datatables/pdfmake.min.js"></script>
		<script src="datatables/vfs_fonts.js"></script>
		<script src="datatables/buttons.html5.min.js"></script>
		<script src="datatables/buttons.print.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/sales.js"></script>
		<script>



			$('#sales_tbl').DataTable({

				dom: 'lBfrtip',
				"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
				],
				buttons: [
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
				'print'

				],
				language: {
					paginate: {
						next: '<i class="fas fa-chevron-right"></i></i>',
						previous: '<i class="fas fa-chevron-left"></i></i>'  
					}
				}

			});
			$('#date_from').focus(function(){
				$('#date_from').removeClass('border-danger');
			})
			$('#date_to').focus(function(){
				$('#date_to').removeClass('border-danger');
			})

		</script>
	</body>
	</html>