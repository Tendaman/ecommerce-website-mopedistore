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
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Flickity CSS link -->
   <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background-color: white;">
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="lban2">
   <div class="start-navv">
      <h1>Get in touch</h1>
      <p>Our trained staff of professionals are prepared to offer you the finest services to your queries.</p>
      <p>Contact us anytime and we will get back to you soon.</p>
   </div>
</div>

    <div class="ccontainer">
        <div class="left" style="display: flex; justify-content: center;">
            <h1 class="hh1" style="font-size: 40px;">Come And See Us</h1>
        </div>
        <div class="right">
            <p class="pp">Our main Office is based in the safe suburb of Bedfordview. If you feel like having an onsite consultation about Mopedi Store, book an appointment and come see us.</p>
        </div>
    </div>

<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14323.045469037432!2d28.1339764!3d-26.1719001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95121ee16c7b03%3A0xe153dc86849080e1!2sEduvos%20-%20Bedfordview!5e0!3m2!1sen!2sza!4v1717662590076!5m2!1sen!2sza" width="80%" height="450" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
</div>

<section class="cccontact-us">
   <div class="cccontact-container">
      <h1>If You Have More Questions Contact Us</h1>
      <p>We provide a 24/7 hotline to help you with any queries that you may have.</p>
      <div class="ppphone-box">
         <i class="fas fa-phone-alt"></i> +27 11 648 2684
      </div>
   </div>
</section>

    <div class="cccccontainer">
        <div class="cccccontact-info">
            <div class="cccccinfo-box">
                <i class="fas fa-envelope"></i>
                <h3>For any enquiries you may have please contact us</h3>
                <hr>
                <h4>Our office</h4>
                <h2>Eduvos - Bedfordview </h2>
                <p>9 Concorde E Rd, Bedfordview, Johannesburg, 2008</p>
            </div>
        </div>
        <div class="cccccontact-form">
            <form action="#" method="post">
                <div class="cccccinput-group">
                    <div class="cccccinput-box">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" placeholder="Enter your First Name" required>
                    </div>
                    <div class="cccccinput-box">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" placeholder="Enter your Last Name" required>
                    </div>
                </div>
                <div class="cccccinput-group">
                    <div class="cccccinput-box">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone e.g. +27 82 446 7385" required>
                    </div>
                    <div class="cccccinput-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter a valid email address" required>
                    </div>
                </div>
                <div class="cccccinput-box">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>
                </div>
                <div class="cccccinput-box">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/script.js"></script>

<?php @include 'footer.php'; ?>

</body>
</html>