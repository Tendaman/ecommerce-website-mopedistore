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
