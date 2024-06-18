<?php

@include 'config.php';

if(isset($_POST['id'])){
   $product_id = $_POST['id'];
   $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");

   if(mysqli_num_rows($select_product) > 0){
      $fetch_product = mysqli_fetch_assoc($select_product);
      $product_name = $fetch_product['name'];
      $product_price = $fetch_product['price'];
      $product_image = $fetch_product['image'];
      $product_description = $fetch_product['description'];
      $product_category = $fetch_product['category'];

      $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name'");
      
      if(mysqli_num_rows($select_wishlist) > 0){
         echo "Product already in wishlist";
      } else {
         $insert_wishlist = mysqli_query($conn, "INSERT INTO `wishlist`(name, price, image, description, category) VALUES('$product_name', '$product_price', '$product_image', '$product_description', '$product_category')");
         if($insert_wishlist){
            echo "Product added to wishlist successfully";
         } else {
            echo "Failed to add product to wishlist";
         }
      }
   } else {
      echo "Product not found";
   }
} else {
   echo "Invalid request";
}