<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

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

<div class="lban">
   <div class="start-nav">
      <h1>Discover</h1>
      <p>Discover the best products suited for you. Make people turn their heads wherever you go!</p>
      <button class="lbutton"  type="button" onclick="window.location.href='products.php';"><span class="sspan"></span>Shop Now</button>
   </div>
</div>

<?php include 'slider.php'; ?>

<div class="bbbody">
    <div class="ccontainer">
        <div class="left">
            <h1 class="hh1">Mopedi Store sells a variety of shoes from different popular brands.</h1>
        </div>
        <div class="right">
            <p class="pp">Purchase shoes that fit your style. From a variety of shoe brands from registered manufacturers, we are able to provide you quality and stylish shoes that will make people turn their heads as you walk by. Browse the Mopedi store and find what suites you best.</p>
        </div>
    </div>

    <div class="ccontainer">
        <img alt="Image" class="image-self" src="images/shoe3.jpg" style="margin-left: 30px;">
        <div class="left">
            <h1 class="hh1" style="margin-left: 100px; margin-bottom: 30px">Explore.</h1>
            <p class="pp" style="margin-left: 100px;">Browse through the site to find the style that suits you. Click the button below the explore our products.</p>
            <div class="button-container">
                <button class="xbutton"  onclick="window.location.href='products.php';">Explore</input>
            </div>
        </div>
    </div>

    <div class="ccontainer">
        <div class="left">
            <h1 class="hh1" style="margin-left: 30px; margin-bottom: 30px">Learn More.</h1>
            <p class="pp" style="margin-left: 30px;">If you want to learn more about us, click the button below to get more information.</p>
            <div class="button-container">
                <button class="xbutton"  onclick="window.location.href='about.php';">Learn More</input>
            </div>
        </div>
        <img alt="Image" class="image-self" src="images/shoe1.jpg" style="margin-right: 100px">
    </div>

    <div class="ccontainer">
        <div class="left" style="margin: auto 200px;">
            <h1 class="hh1" style="margin-left: 30px; margin-bottom: 30px">Discover.</h1>
            <p class="pp" style="margin-left: 30px;">Discover recommended and new products that are up for sell on Mopedi Store. Find what you like. Don't be afraid to purchase what suits you from our affordable and stylish list of shoes in the site. We love to hear from you about our business practices and how we can improve to ensure absolute customer satifaction.</p>
        </div>
    </div>
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