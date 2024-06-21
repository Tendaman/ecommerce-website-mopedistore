// Toggle menu and navbar
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

// Remove menu and navbar active class on scroll
window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};


// Show order message container on DOM content loaded
document.addEventListener('DOMContentLoaded', () => {
   const orderMessageContainer = document.querySelector('.order-message-container');

   if (orderMessageContainer) {
       orderMessageContainer.style.display = 'flex';
   }
});

// Open popup with product details
$(document).on('click', '.view-product', function(){
   var productId = $(this).data('id');
   $.ajax({
       url: 'view.php',
       type: 'GET',
       data: { id: productId },
       success: function(data) {
           // Create and open a modal with the fetched data
           $('body').append('<div class="modal">' + data + '<span class="close-modal">&times;</span></div>');
           $('.modal').show();
       }
   });
});

// Close modal
$(document).on('click', '.close-modal', function(){
   $('.modal').remove();
});

// Initialize Flickity carousel
$('.main-carousel').flickity({
   cellAlign: 'left',
   wrapAround: true,
   freeScroll: true
});


function showOrderPopup(order) {
   var popupDetails = document.getElementById('popupDetails');
   popupDetails.innerHTML = `
      <p><strong>Order ID:</strong> ${order.id}</p>
      <p><strong>Name:</strong> ${order.name}</p>
      <p><strong>Number:</strong> ${order.number}</p>
      <p><strong>Email:</strong> ${order.email}</p>
      <p><strong>Payment Method:</strong> ${order.method}</p>
      <p><strong>Address:</strong> ${order.flat}, ${order.street}, ${order.city}, ${order.state}, ${order.country} - ${order.pin_code}</p>
      <p><strong>Total Products:</strong> ${order.total_products}</p>
      <p><strong>Total Price:</strong> R${Number(order.total_price).toFixed(2)}</p>
   `;
   document.getElementById('orderPopup').style.display = 'block';

}

function closePopup() {
   document.getElementById('orderPopup').style.display = 'none';
}

// Function to navigate back to the previous page
function goBack() {
   window.history.back();
}