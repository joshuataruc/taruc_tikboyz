<?php 
include_once 'dbase/dbase.php';
$select_sup = "SELECT * FROM supplier_tbl";
$sup_query = mysqli_query($con, $select_sup);


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
						<a href="supplier/supplier.php" class=" btn add_btn btn-outline-dark float-right"><i class="fas fa-plus"></i></a>
					</div>
				</div>
				<table id="supplier_tbl" class="table display table-hover" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Brand </th>
							<th>Address</th>
							<th>Contact Person</th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Action</th>
						</tr>				 	
					</thead>	
					<tbody>
						<?php while ($sup_row = $sup_query->fetch_assoc()):?>
							<tr>
								<td><?php echo $sup_row['supplier_name'] ; ?></td>
								<td><?php echo $sup_row['supplier_brand']; ?></td>
								<td><?php echo $sup_row['supplier_address']; ?></td>
								<td><?php echo $sup_row['supplier_cont_person']; ?></td>
								<td><?php echo $sup_row['supplier_number']; ?></td>
								<td><?php echo $sup_row['supplier_email']; ?></td>
								<td>
									<a href="supplier/update_supplier_form.php?supplier_id=<?php echo $sup_row['supplier_id']; ?>"   class="btn btn-info house_btn"><i class="fas fa-user-edit text-white"></i></a>
									<a href="supplier/process.php?delete_id=<?php echo $sup_row['supplier_id']; ?>" onclick="return confirm('Are you sure you want to delete this Supplier?');" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
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
	<script>
		$('#supplier_tbl').DataTable({

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
	</script>
</body>
</html>