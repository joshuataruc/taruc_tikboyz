$("#search_btn").click(function (event) {
	event.preventDefault();
	var from_date = $('#date_from').val();
	var to_date = $('#date_to').val();
	// alert(to_date);
	if (from_date == '') {
		$('#alerts').empty();
		$('#alerts').append('<div class="alert alert-warning">' +
			'<button type="button" class="close" data-dismiss="alert">' +
			'×</button>' + '<i class="fas fa-exclamation-triangle"></i> From Date is Empty' + '</div>');
		$('#date_from').addClass('border-danger');

		return false;
	}
	if (to_date == '') {
		$('#alerts').empty();
		$('#alerts').append('<div class="alert alert-warning">' +
			'<button type="button" class="close" data-dismiss="alert">' +
			'×</button>' + '<i class="fas fa-exclamation-triangle"></i> To Date is Empty' + '</div>');
		$('#date_to').addClass('border-danger');
		return false;
	} else {
		var search = new XMLHttpRequest();
		search.open('GET', 'ajax/seacrh_sales.php?from_date=' + from_date + '&to_date=' + to_date, true);
		search.onload = function () {
			$('#tbody').empty();
			$('#tbody').append(this.responseText);
			$('#sales_tbl_info').hide();
			$('#old-sales').hide();

		}
		search.send();
	} //end else
});

$('#daily').click(function(event){
	event.preventDefault();
	var today = $('#date_container').text();
	// alert(today);
	var daily = new XMLHttpRequest();
	daily.open('GET', 'ajax/seacrh_sales.php?daily_rep='+today, true);
	daily.onload = function(){
		//alert(this.responseText);
		//console.log(this.responseText);
		$('#tbody').empty();
		$('#tbody').append(this.responseText);
		$('#sales_tbl_info').hide();
		$('#old-sales').hide();
	}
	daily.send();
});


$('#weekly').click(function(event){
	event.preventDefault();
	var today = $('#date_container').text();
	var weekly = new XMLHttpRequest();
	weekly.open('GET', 'ajax/seacrh_sales.php?weekly_rep='+today, true);
	weekly.onload = function(){
		$('#tbody').empty();
		$('#tbody').append(this.responseText);
		$('#sales_tbl_info').hide();
		$('#old-sales').hide();
	}
	weekly.send();
	});



$('#monthly').click(function(event){
	event.preventDefault();
	var today = $('#date_container').text();

	var monthly = new XMLHttpRequest();
	monthly.open('GET', 'ajax/seacrh_sales.php?monthly_rep='+today, true);
	monthly.onload = function(){
		$('#tbody').empty();
		$('#tbody').append(this.responseText);
		$('#sales_tbl_info').hide();
		$('#old-sales').hide();
	}
	monthly.send();


});
$('#yearly').click(function(event){
	event.preventDefault();
	var today = $('#date_container').text();

	var annualy = new XMLHttpRequest();
	annualy.open('GET', 'ajax/seacrh_sales.php?annually_rep='+today, true);
	annualy.onload = function(){
		$('#tbody').empty();
		$('#tbody').append(this.responseText);
		$('#sales_tbl_info').hide();
		$('#old-sales').hide();
	}
	annualy.send();
});

