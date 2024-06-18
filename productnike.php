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

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>nike</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Flickity CSS link -->
   <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<div class="banner">
   <div class="start-nav">
      <h1>Nike</h1>
      <p>Discover the best nike shoes for you. Make people turn their heads wherever you go!</p>
   </div>
</div>

<?php include 'slider.php'; ?>

<div class="container">

<section class="products" >
   <div class="head-container">
      <h1 class="heading">nike shoes</h1>
      <h3>
         <button class="btn wishlist-btn" onclick="window.location.href='wishlist.php'">
            View Wishlist
         </button>
      </h3>
   </div>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = 'Nike'");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">R<?php echo $fetch_product['price']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
            <button type="button" class="btn view-product" data-id="<?php echo $fetch_product['id']; ?>">View</button>
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<?php @include 'footer.php'; ?>

<!-- Flickity JS link -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script type="text/javascript">
   $('.main-carousel').flickity({
      cellAlign: 'left',
      wrapAround: true,
      freeScroll: true
   });
</script>

</body>
</html>