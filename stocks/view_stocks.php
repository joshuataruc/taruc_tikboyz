<?php 
include_once 'dbase/dbase.php';
$select_stocks = "SELECT * FROM stock ORDER BY stock_id ASC";
$stocks_query = mysqli_query($con, $select_stocks) or die($con->error);

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
			border-radius: 50px;
		}
	</style>
</head>
<body>
	
	<div class="container-fluid">
		<div class="card shadow">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<a href="stocks/stocks.php" class=" btn add_btn btn-outline-dark float-right"><i class="fas fa-plus"></i></a>
					</div>
				</div>
				<table id="stocks_tbl" class="table display table-hover" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Brand </th>
							<th>Code</th>
							<th>Quantity</th>
							<th>Price</th>
							
							<th>Action</th>
						</tr>				 	
					</thead>	
					<tbody>
						<?php while ($stocks_row = $stocks_query->fetch_assoc()):?>
							<tr>
								<td><?php echo $stocks_row['item_name'] ; ?></td>
								<td><?php echo $stocks_row['brand_name']; ?></td>
								<td><?php echo $stocks_row['item_code']; ?></td>
								<td><?php echo $stocks_row['quantity']; ?></td>
								<td>&#8369 <?php echo number_format($stocks_row['price'], 2); ?></td>
								
								<td>
									<button id="<?php echo $stocks_row['stock_id']; ?>" class="btn btn-success view_img" data-toggle="modal" data-target="#img_modal"><i class="far fa-eye"></i></button>
									<a href="stocks/update_stocks_form.php?stock_id=<?php echo $stocks_row['stock_id']; ?>"   class="btn btn-info house_btn"><i class="fas fa-user-edit text-white"></i></a>
									<a href="stocks/process.php?delete_id=<?php echo $stocks_row['stock_id']; ?>" onclick="return confirm('Are you sure you want to delete this stock?');" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div class="modal fade" id="img_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<button type="button" class="close d-flex justify-content-end" data-dismiss="modal">&times;</button>
				<div class="modal-body">
					<div id="img-content">
						
					</div>
				</div>
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

	<script>
		$('#stocks_tbl').DataTable({

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


		$('.view_img').click(function(){
			var id = $(this).attr("id");
			var view_img = new XMLHttpRequest();
			view_img.open('GET', 'ajax/stock_img.php?id='+id, true);
			view_img.onload = function(){
				$('#img-content').empty();
				$('#img-content').append(this.responseText);
			}
			view_img.send();
		});


	</script>
</body>
</html>