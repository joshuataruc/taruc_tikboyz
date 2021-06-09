<?php 
include_once 'dbase/dbase.php';
$select_brand = "SELECT * FROM brands ORDER BY brand_id ASC";
$brand_query = mysqli_query($con, $select_brand);


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
		.brand_name{
			padding-left: 50px !important;
		}
	</style>
</head>
<body>
	
	<div class="container-fluid">
		<div class="card shadow">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<a href="" class=" btn add_btn btn-outline-dark float-right" data-toggle="modal" data-target="#insert_modal"><i class="fas fa-plus"></i></a>
					</div>
				</div>
				<table id="brand_tbl" class="table display table-hover" >
					<thead>
						<tr>
							<th class="brand_name">Brand Name</th>
							<th >Action</th>
						</tr>				 	
					</thead>	
					<tbody>
						<?php while ($brand_row = $brand_query->fetch_assoc()):?>
							<tr>
								<td width="80%" class="brand_name"><?php echo $brand_row['brand_names']; ?></td>
								<td width="20%" >
									<a href="" id="<?php echo $brand_row['brand_id']; ?>" data-toggle="modal" data-target="#upd_modal"  class="btn btn-info upd_btn"><i class="fas fa-user-edit text-white"></i></a>
									<a href="brands/process.php?delete_id=<?php echo $brand_row['brand_id']; ?>" onclick="return confirm('Are you sure you want to delete this Brand?');" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- for insert -->
	<div class="modal" tabindex="-1" id="insert_modal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<button type="button" class="close mb-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="float-right ">&times;</span>
					</button>
					<form action="brands/process.php" method="post">
						<div class="form-group">
							<input type="text" name="brand_name" id="brand_name" class="form-control" required>
						</div>
						<input type="submit" name="insert_brand" id="brand_btn" class="btn btn-warning float-right" value="Insert Brand">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end insert -->
	<div class="modal" id="upd_modal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close mb-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="float-right ">&times;</span>
					</button>
					<form action="brands/process.php" method="post">
						<div class="form-group">
							<input type="hidden" name="brand_id" class="form-control" id="brand_id">
							<input type="text" name="brand_name" id="upd_brand_name" class="form-control">
						</div>
						<input type="submit" name="upd_brand" id="brand_btn" class="btn btn-warning float-right" value="Update Brand">
					</form>
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
		$('#brand_tbl').DataTable({

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

		$('.upd_btn').click(function(event){
			event.preventDefault();
			var id = $(this).attr('id');
			//alert(id);
			var update_brand = new XMLHttpRequest();
			update_brand.open('GET', 'brands/process.php?id='+id, true);
			update_brand.onload = function(){
				// console.log(this.reponseText);
				$('#brand_id').empty();
				$('#brand_id').val(id);
				$('#upd_brand_name').empty();
				$('#upd_brand_name').val(this.responseText);
			}
			update_brand.send();

		});



	</script>
</body>
</html>