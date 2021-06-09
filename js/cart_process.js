if (document.readyState == 'loading') {
	document.addEventListener('DOMContentLoaded', ready)
}
else{
	ready()
}
function ready() {
	var addToCartButtons = document.getElementsByClassName('shop-item-button')
	for (var i = 0; i < addToCartButtons.length; i++) {
		var button = addToCartButtons[i]
		button.addEventListener('click', function(e){
			if(e.target && e.target.matches == '.shop-item-button'){
          alert('clocjk')
     }
		})
		
	}
}//end function


// function AddtoCartClicked(event){
// 	// var button = event.target
// 	// var	shopItem = button.parentElement.parentElement
// 	// var	title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
// 	// console.log(title)
// 	//alert('clocjk')
// 	if (event.target && event.target.class='shop-item-button') {
// 		alert('clocjk')
// 	}
// }
