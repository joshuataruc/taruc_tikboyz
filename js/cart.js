$('#brand').change(function(){
	var id = $("#brand").val();
	// alert(id);
	var search_brand = new XMLHttpRequest();
	search_brand.open('GET', 'ajax/cart_search.php?brand='+id, true);
	search_brand.onload = function(){
		// alert(this.responseText);s
		$('#item').attr('disabled', false);
		$('#item').empty();
		$('#item').append('<option hidden="" selected="">Select Item</option>');
		$('#item').append(this.responseText);

	}
	search_brand.send();
 
});


$('#item').change(function(){
	var id = $("#item").val();
	var brand_name = $("#brand").val();
	// alert(id);
	var	search_item = new XMLHttpRequest();
	search_item.open('GET', 'ajax/item_search.php?item='+id+'&brand='+brand_name, true);
	search_item.onload = function(){
		$('#content').empty();
		$('#content').append(this.responseText);
		// console.log(this.responseText);

	}
	search_item.send();

});

$('#item_search').keyup(function(){
	var item_search = $('#item_search').val();
	// console.log(item_search);
	var search_code = new XMLHttpRequest();
	search_code.open('GET', 'ajax/search_code.php?item_code='+item_search, true);
	search_code.onload = function(){
		$('#content').empty();
		$('#content').append(this.responseText);
	}
	search_code.send();
});