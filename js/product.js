// Cart
const cartIcon = document.getElementById('cart-icon');
const cart = document.getElementsByClassName('cart-storage')[0];
const cartCloser = document.getElementById('close-cart');

// Set the cart-storage to active to open the cart
cartIcon.onclick = () =>{
	cart.classList.add("active");
};

// Remove the active from cart-storage to close the cart
cartCloser.onclick = () =>{
	cart.classList.remove("active");
};

const title = new Array;
const price = new Array;
const img = new Array;
const productQuantity = new Array;
const cartCount = 0;
// Checking
if (document.readyState == "loading"){
	document.addEventListener("DOMContentLoaded", loaded);
}
else{
	loaded();
}



window.addEventListener('load', () =>{

	
	const retrivedTitle = localStorage.getItem("TITLE");
	const productTitle = JSON.parse(retrivedTitle);
	const retrivedPrice = localStorage.getItem("PRICE");
	const productPrice = JSON.parse(retrivedPrice);
	const retrivedImg = localStorage.getItem("IMG");
	const productImg = JSON.parse(retrivedImg);
	const retrivedQuantity = localStorage.getItem("QUANTITY");
	const quantity = JSON.parse(retrivedQuantity);
	
	for(var i =0;i<productTitle.length;i++){
		addProductToCart(productTitle[i], productPrice[i], productImg[i]);
		title.push(productTitle[i])
		price.push(productPrice[i])
		img.push(productImg[i])
		productQuantity.push(quantity[i])
	}
	addBackQuantity();
	calTotal();
});


function loaded(){
	
		
	// Add to cart
	var addCart = document.getElementsByClassName("add-cart");
	for(var i=0; i<addCart.length; i++){
		var btn = addCart[i];
		btn.addEventListener('click', (event) => {
			var btn = event.target;
			var box = btn.parentElement.parentElement;
			var productTitle = box.getElementsByTagName("h3")[0].innerText;
			var productPrice = box.getElementsByClassName("price")[0].innerText;
			var productImg = box.getElementsByTagName("img")[0].src;
			
			
			// Add it to cart
			title.push(productTitle);
			price.push(productPrice);
			img.push(productImg);
			productQuantity.push(1);
			
			addProductToCart(productTitle, productPrice, productImg);
			calTotal();
			saveProduct();
		});
		
		
		
	}
	
	var count = 0;
	
	var heart = document.getElementsByClassName("heart");
	for(var i=0; i<heart.length; i++){
		var btn = heart[i];
		btn.addEventListener('click', (event) => {
			var btn = event.target;
			console.log("numberr " + count);
			btn.style.color= "purple";
			if(count == 1){
				count = -1;
				btn.style.color = "white";
			}
			count++;
			
		});	
		
	}
	
	// Remove cart
	var removeCartBtn = document.getElementsByClassName("cart-remove");
	
	for(var i=0; i<removeCartBtn.length; i++){
		var btn = removeCartBtn[i];
		btn.addEventListener('click', removeCart(event));
		
	}
	
	// Get Quantity change
	var numInputs = document.getElementsByClassName("cart-numbers");
	for(var i=0; i<numInputs.length; i++){
		var input = numInputs[i];
		input.addEventListener('change', changeItemNum(event));
		
	}

	
	// Buy button
	document.getElementsByClassName('button-buy')[0].addEventListener('click', () => {
		
		if(title.length>0){
			location.href='payment.php';
		}else{
			alert("There is nothing in the cart!");
		}
		
	}); 
	
	// Pay button
	document.getElementsByClassName('pay-btn')[0].addEventListener('click', () => {
		alert("Your payment is successful");
		location.href='product.php';
		
		var cartContent =  document.getElementsByClassName('cart-content')[0]
		
		while(cartContent.hasChildNodes()){
			cartContent.removeChild(cartContent.firstChild);
		}

		title.splice(0, title.length);
		price.splice(0, price.length);
		img.splice(0, img.length);
		productQuantity.splice(0, productQuantity.length);
		saveProduct();
		calTotal();
	});
	
}

// Remove products from cart
function removeCart(event){
	var btnClicked = event.target;
	//console.log(btnClicked.parentElement.getElementsByClassName('cart-title-product')[0].innerText);
	var count = checkArrayNum(btnClicked.parentElement.getElementsByClassName('cart-title-product')[0].innerText);
	btnClicked.parentElement.remove();
	//console.log("count:" + count);
	title.splice(count);
	price.splice(count);
	img.splice(count);
	productQuantity.splice(count);
	calTotal();
	saveProduct();
}

// Edit products quantity
function changeItemNum(event){
	var input = event.target;
	calTotal();
}


// save the product into JSON
function saveProduct(){
	
	localStorage.setItem("TITLE", JSON.stringify(title));
	localStorage.setItem("PRICE", JSON.stringify(price));
	localStorage.setItem("IMG", JSON.stringify(img));
	localStorage.setItem("QUANTITY", JSON.stringify(productQuantity));
}

// add product to the cart
function addProductToCart(productTitle, productPrice, productImg){
	var cartBox = document.createElement('div');
	cartBox.classList.add('cart-box');
	var cartElements = document.getElementsByClassName("cart-content")[0];
	var cartElementsName = cartElements.getElementsByClassName("cart-title-product")
	for(var i=0; i<cartElementsName.length; i++){
		if(cartElementsName[i].innerText == productTitle){
			return;
		}
		
	}
	
	// HTML code of the cart section
	var cartContent = 
	`						<img src="${productImg}" alt="" class="cart-img">
							<div class="detail-box">
								<div class="cart-title-product">${productTitle}</div>
								<div class="cart-cost">${productPrice}</div>
								<input type="number" value="1" min="1" class="cart-numbers">
							</div>
							<!-- Remove cart -->
							<i class='fas fa-trash-alt cart-remove'></i> `;

	cartBox.innerHTML = cartContent;
	cartElements.append(cartBox);
	cartBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCart);
	cartBox.getElementsByClassName('cart-numbers')[0].addEventListener('change', changeItemNum);
}

function checkArrayNum(productTitle){
	
	var count = 0;
	console.log(title.length);
	for(var i=0;i<title.length; i++){
		console.log("i "+ i)
		if(title[i] === productTitle){
			count = i;
		}
	}
	return count;
}


// Calculate Total
function calTotal(){
	//var cartContent = document.getElementsByClassName("cart-content")[0];
	var cartBoxes = document.getElementsByClassName("cart-box");
	var total = 0;
	console.log("cartbox: "+cartBoxes.length);
	for(var i=0; i<cartBoxes.length; i++){
		
		var cartBox = cartBoxes[i];
		var cartCost = cartBox.getElementsByClassName("cart-cost")[0];
		var cartNumbers = cartBox.getElementsByClassName("cart-numbers")[0];
		var cost = parseFloat(cartCost.innerText.replace("RM",""));
		var quantity = cartNumbers.value;
		total += (cost * quantity);
		productQuantity[i] = quantity;
		
	}
	
	// get cart-count
	document.getElementsByClassName("cart-item-count")[0].innerText = cartBoxes.length;
	
	document.getElementsByClassName("total-cost")[0].innerText= (total.toFixed(2));
	saveProduct();
}

function addBackQuantity(){
	var cartBoxes = document.getElementsByClassName("cart-box");
	for(var i=0; i<cartBoxes.length; i++){
		
		var cartBox = cartBoxes[i];
		var cartCost = cartBox.getElementsByClassName("cart-cost")[0];
		var cartNumbers = cartBox.getElementsByClassName("cart-numbers")[0];
		cartNumbers.setAttribute('value', productQuantity[i]);
		
	}
}

