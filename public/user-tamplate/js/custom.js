// (function() {
// 	'use strict';

// 	var tinyslider = function() {
// 		var el = document.querySelectorAll('.testimonial-slider');

// 		if (el.length > 0) {
// 			var slider = tns({
// 				container: '.testimonial-slider',
// 				items: 1,
// 				axis: "horizontal",
// 				controlsContainer: "#testimonial-nav",
// 				swipeAngle: false,
// 				speed: 700,
// 				nav: true,
// 				controls: true,
// 				autoplay: true,
// 				autoplayHoverPause: true,
// 				autoplayTimeout: 3500,
// 				autoplayButtonOutput: false
// 			});
// 		}
// 	};
// 	tinyslider();

// 	(function() {
//     'use strict';

//     var tinyslider = function() {
//         var el = document.querySelectorAll('.testimonial-slider');

//         if (el.length > 0) {
//             var slider = tns({
//                 container: '.testimonial-slider',
//                 items: 1,
//                 axis: "horizontal",
//                 controlsContainer: "#testimonial-nav",
//                 swipeAngle: false,
//                 speed: 700,
//                 nav: true,
//                 controls: true,
//                 autoplay: true,
//                 autoplayHoverPause: true,
//                 autoplayTimeout: 3500,
//                 autoplayButtonOutput: false
//             });
//         }
//     };
//     tinyslider();

//     var sitePlusMinus = function() {

//         var value,
//             quantityContainers = document.getElementsByClassName('quantity-container');

//         function createBindings(quantityContainer) {
//             var quantityAmount = quantityContainer.getElementsByClassName('quantity-input')[0];
//             var increase = quantityContainer.getElementsByClassName('quantity-increase')[0];
//             var decrease = quantityContainer.getElementsByClassName('quantity-decrease')[0];

//             // Pastikan elemen ada sebelum menambahkan event listener
//             if (increase) {
//                 increase.addEventListener('click', function (e) {
//                     increaseValue(e, quantityAmount);
//                 });
//             }
//             if (decrease) {
//                 decrease.addEventListener('click', function (e) {
//                     decreaseValue(e, quantityAmount);
//                 });
//             }
//         }

//         function init() {
//             for (var i = 0; i < quantityContainers.length; i++ ) {
//                 createBindings(quantityContainers[i]);
//             }
//         };

//         function increaseValue(event, quantityAmount) {
//             value = parseInt(quantityAmount.value, 10);

//             value = isNaN(value) ? 0 : value;
//             value++;
//             quantityAmount.value = value;

//             // Update harga dan subtotal setelah perubahan kuantitas
//             updateQuantity(quantityAmount.dataset.cartId, 1);
//         }

//         function decreaseValue(event, quantityAmount) {
//             value = parseInt(quantityAmount.value, 10);

//             value = isNaN(value) ? 0 : value;
//             if (value > 1) value--; // Pastikan tidak kurang dari 1

//             quantityAmount.value = value;

//             // Update harga dan subtotal setelah perubahan kuantitas
//             updateQuantity(quantityAmount.dataset.cartId, -1);
//         }

//         init();
//     };
//     sitePlusMinus();

//     // Fungsi untuk memperbarui harga dan subtotal
//     function updateQuantity(cartId, change) {
//         const quantityInput = document.querySelector(`.quantity-input[data-cart-id='${cartId}']`);
//         const productPriceElement = quantityInput.closest('tr').querySelector('.product-price');
//         const pricePerUnit = parseFloat(productPriceElement.dataset.price);

//         let quantity = parseInt(quantityInput.value);

//         if (quantity < 1) quantity = 1;

//         fetch(`/cart/${cartId}`, {
//                 method: 'PATCH',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                 },
//                 body: JSON.stringify({
//                     quantity: quantity
//                 })
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     quantityInput.value = quantity;
//                     productPriceElement.textContent = `Rp ${ (quantity * pricePerUnit).toLocaleString('id-ID') }`;
//                     updateSubtotal();
//                 } else {
//                     console.error('Failed to update cart:', data);
//                 }
//             }).catch(error => {
//                 console.error('Error updating cart:', error);
//             });
//     }

//     function updateSubtotal() {
//         let subtotal = 0;
//         document.querySelectorAll('.product-price').forEach(priceElement => {
//             subtotal += parseInt(priceElement.textContent.replace(/\D/g, ''));
//         });
//         document.getElementById('cart-subtotal').textContent = subtotal.toLocaleString('id-ID');
//     }

// })();



// 	var sitePlusMinus = function() {

// 		var value,
//     		quantity = document.getElementsByClassName('quantity-container');

// 		function createBindings(quantityContainer) {
// 	      var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
// 	      var increase = quantityContainer.getElementsByClassName('increase')[0];
// 	      var decrease = quantityContainer.getElementsByClassName('decrease')[0];
// 	      increase.addEventListener('click', function (e) { increaseValue(e, quantityAmount); });
// 	      decrease.addEventListener('click', function (e) { decreaseValue(e, quantityAmount); });
// 	    }

// 	    function init() {
// 	        for (var i = 0; i < quantity.length; i++ ) {
// 						createBindings(quantity[i]);
// 	        }
// 	    };

// 	    function increaseValue(event, quantityAmount) {
// 	        value = parseInt(quantityAmount.value, 10);

// 	        console.log(quantityAmount, quantityAmount.value);

// 	        value = isNaN(value) ? 0 : value;
// 	        value++;
// 	        quantityAmount.value = value;
// 	    }

// 	    function decreaseValue(event, quantityAmount) {
// 	        value = parseInt(quantityAmount.value, 10);

// 	        value = isNaN(value) ? 0 : value;
// 	        if (value > 0) value--;

// 	        quantityAmount.value = value;
// 	    }
	    
// 	    init();
		
// 	};
// 	sitePlusMinus();


// })()