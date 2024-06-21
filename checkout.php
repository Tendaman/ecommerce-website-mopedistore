<?php
@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $total_quantity = 0;
   $product_names = [];

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_names[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
         $total_quantity += $product_item['quantity'];
      }
   }

   $total_products = implode(', ', $product_names);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_quantity','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_products."</span>
            <span class='total'> total : R".number_format($price_total, 2)."  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
            <a href='#' class='btn' id='placeOrderButton'>place order</a>
         </div>
      </div>
      ";
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
<section class="checkout-form">
    <div style="display:flex; flex-direction:row; gap:30px">
       <h1 class="hheading">complete your order</h1>
       <a href='orderhistory.php' class='btn hheading' style="width: fit-content; margin-top: 55px;">view order history</a>
    </div>
   <form action="" method="post">
   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : R<?= number_format($grand_total, 2); ?></span>
   </div>

   <div class="flex">
      <div class="inputBox">
         <span>your name</span>
         <input type="text" placeholder="enter your name" name="name" required>
      </div>
      <div class="inputBox">
         <span>phone number</span>
         <input type="number" placeholder="enter your number" name="number" required>
      </div>
      <div class="inputBox">
         <span>your email</span>
         <input type="email" placeholder="enter your email" name="email" required>
      </div>
      <div class="inputBox">
         <span>payment method</span>
         <select name="method">
            <option value="cash on delivery" selected>cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paypal">paypal</option>
         </select>
      </div>
      <div class="inputBox">
         <span>address line 1</span>
         <input type="text" placeholder="e.g. flat no." name="flat" required>
      </div>
      <div class="inputBox">
         <span>address line 2</span>
         <input type="text" placeholder="e.g. street name" name="street" required>
      </div>
      <div class="inputBox">
         <span>city</span>
         <input type="text" placeholder="e.g. mumbai" name="city" required>
      </div>
      <div class="inputBox">
         <span>state</span>
         <input type="text" placeholder="e.g. maharashtra" name="state" required>
      </div>
      <div class="inputBox">
         <span>country</span>
         <input type="text" placeholder="e.g. india" name="country" required>
      </div>
      <div class="inputBox">
         <span>postal code</span>
         <input type="text" placeholder="e.g. 123456" name="pin_code" required>
      </div>
   </div>
   <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
   
   <!-- Order confirmation popup -->
   <div class="oorder-message-container" id="oorderMessageContainer">>
      <div class="message-container">
         <h3>Thank you for shopping!</h3>
         <p style ="font-size: 20px;">Your order has been placed successfully. Your order will be delivered to you soon</p>
         <a href="#" class="btn" onclick="closePopup()">Close</a>
      </div>
   </div>
</section>
</div>

<?php @include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>
   // Function to show the order confirmation popup
   function showOrderConfirmationPopup() {
      var popup = document.getElementById('oorderMessageContainer');
      popup.style.display = 'flex';
   }

   // Attach the showOrderConfirmationPopup function to the 'Place Order' button
   var orderForm = document.querySelector('placeOrderButton');
   placeOrderButton.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      showOrderConfirmationPopup();
   });

   // Function to close the popup
   function closePopup() {
      var popup = document.getElementById('oorderMessageContainer');
      popup.style.display = 'none';
   }
</script>
</body>
</html>
