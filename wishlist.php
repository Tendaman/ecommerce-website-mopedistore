<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'product added to cart succesfully';
    }
 
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      $message[] = 'Product has been deleted';
   }else{
      $message[] = 'Product could not be deleted';
   }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_all'])) {
   $delete_all_query = mysqli_query($conn, "DELETE FROM `wishlist`") or die('query failed');
   if ($delete_all_query) {
       header('location:wishlist.php');
       $message[] = 'All products have been deleted from your wishlist';
   } else {
       $message[] = 'Failed to delete all products from your wishlist';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wishlist</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Flickity CSS link -->
   <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<section class="wishlist-container" >

   <h1 class="heading" style="margin-top: 20px;">Wishlist</h1>

   <?php
      $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist`");
      if(mysqli_num_rows($select_wishlist) > 0){
         while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){
   ?>

   <div class="ppproduct-details">
      <div class="ppproduct-image">
         <img src="uploaded_img/<?php echo $fetch_wishlist['image']; ?>" alt="<?php echo $fetch_wishlist['name']; ?>">
      </div>
      <div class="ppproduct-info">
         <h3><?php echo $fetch_wishlist['name']; ?></h3>
         <div class="price">R<?php echo $fetch_wishlist['price']; ?></div>
         <p><?php echo $fetch_wishlist['description']; ?></p>
         <div class="category">Category: <?php echo $fetch_wishlist['category']; ?></div>
         <form method="post" class="add-to-cart-form">
            <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $fetch_wishlist['description']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_wishlist['category']; ?>">
            <div class="sub-buttons">
               <td>
                  <button type="submit" name="add_to_cart" class="btn add-to-cart-btn">Add to Cart</button>
                  <a style="width: fit-content; margin-top: 20px; gap: 30px;" href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
               </td>
            </div>
         </form>
      </div>
   </div>

   <?php
      }
   } else {
      echo '<p class="empty">Your wishlist is empty</p>';
   }
   ?>

</section>

<!-- Add Delete All Form and Button -->
<form method="post" action="wishlist.php" style="margin-bottom: 30px; width:fit-content;">
       <button type="submit" name="delete_all" onclick="return confirm('Are you sure you want to delete all items?');" class="btn delete-all-btn">Delete All</button>
   </form>

<?php @include 'footer.php'; ?>

<!-- Flickity JS link -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
