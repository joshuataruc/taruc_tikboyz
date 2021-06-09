<?php 
session_start();
include 'dbase/dbase.php';
if (isset($_POST['checkout_btn'])) {
	if (empty($_SESSION['shopping_cart'])) {
		
		// echo $status = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		// Your Shopping Cart is Empty!
		// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// <span aria-hidden="true">&times;</span>
		// </button>
		// </div>';
		// echo 'the cart is empty';
		header("Refresh:2; url=cart.php");
	}
	else{
		foreach ($_SESSION['shopping_cart'] as $product) {
			$brand = $product['brand_name'];
			$code = $product['item_code'];
			$name = $product['item_name'];
			//$price = $product['price'];
			$price = $product["price"]*$product["quantity"];
			$img = $product['item_img'];
			 $qty = $product['quantity'];//getting the data from the session
			 $seller = $_SESSION['user_username'];

	 $customer_name = htmlspecialchars($_POST['customer_name']);
	 $customer_cont_number = htmlspecialchars($_POST['customer_cont_number']);
	 $address = htmlspecialchars($_POST['address']);
	 $or_number = htmlspecialchars($_POST['or_number']);
	 $ar_num = "SELECT sales_id FROM `sales_tbl` ORDER BY sales_id DESC LIMIT 1";
	 $ar_query = mysqli_query($con, $ar_num) or die($con->error);
	 $ar_row = $ar_query->fetch_assoc();
	 $ar_number = $ar_row['sales_id'] + 1;

	 $upd_qty = "SELECT * FROM stock WHERE item_code = '$code'";
	 $qty_query = mysqli_query($con, $upd_qty) or die($con->error);
	 if (mysqli_num_rows($qty_query) == 1 ) {
	 	$row = $qty_query->fetch_assoc();
	 	$curQty = $row['quantity'];
	 	$future_stock = $curQty - $qty; 

	 	if ($future_stock < 6) {//for text message
	 		//end of the invoice
	 			 $message = 'You Only Have '. $future_stock . ' ' . $name .' left ';

				// In case any of our lines are larger than 70 characters, we should use wordwrap()
				$message = wordwrap($message, 70, "\r\n");

				// Send
				mail('imtaruc25@gmail.com', 'My Subject', $message);
	 	}//end text msg

	 	$deduct_stock = "UPDATE stock SET quantity = '$future_stock' WHERE item_code = '$code'";
	 	if (mysqli_query($con, $deduct_stock) === TRUE) {
	 		$insert_sales = "INSERT INTO sales_tbl (item_brand, item_name, item_code, item_qty, item_price, customer_name, customer_cont_num, customer_address, seller, OR_num, AR_num)VALUES('$brand', '$name', '$code','$qty', '$price', '$customer_name', '$customer_cont_number', '$address', '$seller', '$or_number', '$ar_number')";
	 		if (mysqli_query($con, $insert_sales) === true) {
	 			
	 			date_default_timezone_set('Asia/Manila');
	 			$date = date('Y-m-d h:i:s A');

	 			require_once __DIR__ . '/vendor/autoload.php';


	 			$html = '';

	 			$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
				$stylesheet = file_get_contents('css/pdf.css'); // external css
				$mpdf->WriteHTML($stylesheet,1);
				$html .= '<div class="center"><img src="icons/logo.png" class="img-thumbnail"></div>';
				$html .= '<p class="left">Date: '. $date .' </p>';
				$html .= '<p>Name: '. $customer_name .' </p>';
				$html .= '<p>Address: '. $address .' </p>';
				$html .= '<p>Contact #: '. $customer_cont_number .' </p>';
				$html .= '<p class="left">OR #: '. $or_number .' </p>';
				$html .= '<p class="right">AR #: '. $ar_number .' </p> ';
				$html .= '<div class="center"><h1>Acknowledgement Receipt</h1></div>';
				$html .= '<table id="customers">';
				$html .= '<thead>';
				$html .= '<tr>';
				$html .= '<th> Quantity </th> ';
				$html .= '<th> Unit </th> ';
				$html .= '<th> Articles </th> ';
				$html .= '<th> Unit Price </th> ';
				$html .= '<th> Amount </th> ';
				$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				foreach ($_SESSION['shopping_cart'] as $product_tbl) {
					$html .= '<tr>';
					$html .= ' <td class="center"> ' .$product_tbl['quantity'] .' </td>';
					$html .= ' <td> ' .ucfirst($product_tbl['item_name'])   .'</td>';
					$html .= ' <td> ' .ucfirst($product_tbl['item_name'])   .'</td>';
					
					$html .= ' <td class="right">  ' .number_format($product_tbl['price'], 2) .'</td>';
					$html .= '<td class="right"> &#x20B1; '.number_format($product_tbl["price"]*$product_tbl["quantity"], 2).'</td> ';
					$html .= '</tr>';
					$total_price += ($product_tbl["price"] * $product_tbl["quantity"] );

				}
				$html .= '<tr>';
				$html .= ' <td colspan="5" class="total"> Total Amount Due &#x20B1; ' .number_format($total_price, 2) .'</td>';	
				$html .= '</tr>';
				$html .= '</tbody>';
				$html .= '</table>';
				
				$html .= '<p class="left">Seller: '. $seller .' </p>';

				$mpdf->WriteHTML($html,2);
				
				$mpdf->Output($customer_name.' '.$date.'.pdf', 'I');
				
				 header('location:cart.php');
				


				
				// echo $status = '<div class="alert alert-success alert-dismissible fade show" role="alert">
				// Check Out Success!
				// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				// <span aria-hidden="true">&times;</span>
				// </button>
				// </div>';
				//echo "success";


				unset($_SESSION['shopping_cart']);
			}
			else{
				die($con->error);
			}
		}
		else{
			die($con->error);
		}

	}
	else{
		echo "ok";
	}

}
}
}

?>

