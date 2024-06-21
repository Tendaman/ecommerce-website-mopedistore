<?php
@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order History</title>
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="oocontainer">
<section class="order-history">
    
    <div class="back-button-container">
      <button class="btn back-btn" onclick="goBack()">Back to Previous Page</button>
      <h1 class="hhheading">Your Order History</h1>
   </div>

   

   <div class="order-container">
      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `order` ORDER BY `id` DESC");
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_order = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="order"  onclick="showOrderPopup(<?= htmlspecialchars(json_encode($fetch_order)); ?>)">
         <h3>Order ID: <?= $fetch_order['id']; ?></h3>
         <p><strong>Name:</strong> <?= $fetch_order['name']; ?></p>
         <p><strong>Number:</strong> <?= $fetch_order['number']; ?></p>
         <p><strong>Email:</strong> <?= $fetch_order['email']; ?></p>
         <p><strong>Payment Method:</strong> <?= $fetch_order['method']; ?></p>
         <p><strong>Address:</strong> <?= $fetch_order['flat'].", ".$fetch_order['street'].", ".$fetch_order['city'].", ".$fetch_order['state'].", ".$fetch_order['country']." - ".$fetch_order['pin_code']; ?></p>
         <p><strong>Total Products:</strong> <?= $fetch_order['total_products']; ?></p>
         <p><strong>Total Price:</strong> R<?= number_format($fetch_order['total_price'], 2); ?></p>
      </div>
      <?php
            }
         } else {
            echo "<p class='empty'>No orders placed yet!</p>";
         }
      ?>
   </div>

</section>

<!-- Popup Container -->
<div id="orderPopup" class="order-popup">
   <div class="popup-content">
      <h3>Order Details</h3>
      <div id="popupDetails"></div>
      <button class="btn close-btn" onclick="closePopup()">Close</button>
   </div>
</div>

</div>

<?php @include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
