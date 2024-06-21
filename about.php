<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

}

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
      <h1>About</h1>
      <p>Keep yourself informed. Learn about us.</p>
   </div>
</div>


<section class="about-us">
   <div class="about-container">
      <img src="images/pexels-christina-morillo-1181292.jpg" alt="About Us Image" class="about-image">
      <div class="about-text">
         <h1>About Us</h1>
         <p>At Mopedi Store, we believe that the right pair of shoes can transform not just your outfit, but your entire day. Founded in 2018, Mopedi Store is dedicated to providing a curated selection of high-quality footwear for every occasion. Our mission is to make shopping for shoes an enjoyable and seamless experience, offering a wide range of styles from trusted brands to suit every taste and preference.</p>
         <p>- Tendamudzimu.</p>
      </div>
   </div>
</section>

<section class="our-story">
   <div class="story-container">
      <h1>At Mopedi Store</h1>
      <p>At Mopedi store, we prioritise providing the best quality products at the lowest prices and ensuring that those products are delivered safely and quickly. We treat our customers with the respect and dignity they deserve. We practice good corporate governance and equality.</p>
   </div>
</section>

<section class="cccontact-us">
   <div class="cccontact-container">
      <h1>If You Have More Questions Contact Us</h1>
      <p>We provide a 24/7 hotline to help you with any queries that you may have.</p>
      <div class="ppphone-box">
         <i class="fas fa-phone-alt"></i> +27 11 648 2684
      </div>
   </div>
</section>

  <section class="our-commitment">
    <div class="commitment-container">
        <h1>Our Commitment</h1>
        <p class="commitment-intro">Quality and customer satisfaction are at the heart of everything we do.</p>
        <h2 style="color: #333;">We are committed to providing:</h2>
        <p style="color: #333;"><strong>Exceptional Products:</strong> Each item in our store is chosen for its superior quality, style, and comfort. We partner with renowned brands and designers to bring you the best selection of shoes available.</p>
        <p style="color: #333;"><strong>Outstanding Service:</strong> Our customer support team is here to assist you every step of the way. Whether you have a question about sizing, need help with your order, or want to provide feedback, we're always ready to help.</p>
        <p style="color: #333;"><strong>Convenient Shopping:</strong> We offer a user-friendly shopping experience with detailed product descriptions, high-resolution images, and easy navigation. Our secure checkout process ensures your personal information is always protected.</p>
        <p style="color: #333;"><strong>Fast Shipping and Easy Returns:</strong> We understand that getting your shoes quickly is important. That's why we strive to process orders efficiently and offer multiple shipping options. If you're not completely satisfied with your purchase, our hassle-free return policy makes it easy to exchange or return items.</p>
    </div>
  </section>
<div class="container-counter">
    <div class="sstory-container">
        <div class="story-text">
            <h1>Our Story</h1>
            <p>Mopedi Store started with a simple idea to create an online destination where shoe lovers could find everything they need in one place. What began as a small project has grown into a thriving business, thanks to our passionate team and loyal customers. We pride ourselves on our carefully selected inventory, which includes everything from classic staples to the latest trends in footwear.</p>
        </div>
        <div class="story-stats">
            <div class="stat">
                <div class="counter" data-target="500">0</div>
                <p>Employees</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="60" data-suffix="%">0</div>
                <p>Growth Increase since 2018</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="100">0</div>
                <p>Number of Shareholders</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="13">0</div>
                <p>Awards</p>
            </div>
        </div>
    </div>
</div>
    <div class="ccontainer-counter">
        <div class="counter-box" style="background-color: #f53333;">
            <div class="counter" data-target="500" style="color: white;">0</div>
            <h2>Loyal Customers</h2>
            <p>Our customers are at the heart of everything we do.</p>
        </div>
        <div class="counter-box" style="background-color: #f9f9f9;">
            <div class="counter" data-target="140">0</div>
            <h2 style="color: black;">Efficient Specialists</h2>
            <p style="color: grey;">UI developers, systems analysts, quality control specialists etc.</p>
        </div>
        <div class="counter-box" style="background-color: #f53333;">
            <div class="counter" data-target="20" style="color: white;">0</div>
            <h2>Successful Business Plans</h2>
            <p>We have about 45 successful business plans and only 18 failed once.</p>
        </div>
        <div class="counter-box" style="background-color: #f9f9f9;">
            <div class="counter" data-target="56">0</div>
            <h2 style="color: black;">Investment Opportunities</h2>
            <p style="color: grey;">Nike, Adidas, Puma, Gucci and Balenciaga are our investors, we are open to more investment opportunities.</p>
        </div>
    </div>

    <section class="our-story">
        <div class="story-container">
            <h1 >Join our Community</h1>
            <p>We are more than just a store, we are a community. Our customers are a vital part of our journey, and we love seeing how our shoes become a part of their lives. Share your Mopedi Store experience with us on social media using #MopediStyle, and join our growing family of happy customers.Thank you for choosing Mopedi Store. We are committed to continually improving and bringing you the best in footwear. Your satisfaction is our top priority, and we look forward to serving you for many years to come</p>
        </div>
    </section>

    <section class="bbox-container">
        <div class="new-container">
            <div class="box">
                <h2>Futurists</h2>
                <p>Tendamudzimu Madavha, Rinae Mulaudzi, Hlulani Ngobeni, Lucky Sibanda</p>
            </div>
            <div class="box">
                <h2>Strategists</h2>
                <p>Jovani Kembel, Kamu Mudau, Lesly Juda, Michael Jacobs, Opie Windston</p>
            </div>
            <div class="box">
                <h2>Designers</h2>
                <p>Jessie Handerson, Lionel Mauma, Chris Flavor</p>
            </div>
            <div class="box">
                <h2>Realisers</h2>
                <p>Hank Thunder, Jabu Zulu, Mbali Thabile</p>
            </div>
        </div>
    </section>
    <script src="js/counter.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/script.js"></script>

<?php @include 'footer.php'; ?>

</body>
</html>