<?php

@include 'config.php';

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");
    if(mysqli_num_rows($select_product) > 0){
        $fetch_product = mysqli_fetch_assoc($select_product);

        // Check if the product is already in the wishlist
        $wishlist_query = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE id = '$product_id'");
        $is_in_wishlist = mysqli_num_rows($wishlist_query) > 0;
?>

<div class="modal-content">
   <div class="pproduct-details">
      <div class="pproduct-image">
         <div class="add-container-class">
            <button  type="button"class="add-to-wishlist" data-id="<?php echo $fetch_product['id'];  ?>">
               <i class="fas fa-heart" style="color: gray;"></i>
            </button>
            <h3>Add to wishlist</h3>
         </div>
         <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="<?php echo $fetch_product['name']; ?>">
      </div>
      <div class="pproduct-info">
         <h3><?php echo $fetch_product['name']; ?></h3>
         <div class="price">R<?php echo $fetch_product['price']; ?></div>
         <p><?php echo $fetch_product['description']; ?></p>
         <div class="category">Category: <?php echo $fetch_product['category']; ?></div>
         <form method="post" class="add-to-cart-form">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
            <div class="sub-buttons">
               <button type="submit" name="add_to_cart" class="btn add-to-cart-btn">Add to Cart</button>
               <button type="submit" name="back" class="btn close-modal">Back</button>
            </div>
         </form>
      </div>
   </div>
</div>

<?php

    } else {
        echo '<div class="modal-content"><p>Product not found.</p></div>';
    }
} else {
    echo '<div class="modal-content"><p>No product ID provided.</p></div>';
}

?>

<!-- custom js file link  -->
<script type="text/javascript">
   document.addEventListener('DOMContentLoaded', function () {
      var modal = document.getElementById("productModal");
      var span = document.getElementsByClassName("close")[0];

      document.querySelectorAll('.view-product').forEach(function(button) {
         button.onclick = function() {
            var productId = this.getAttribute('data-id');
            var iframe = document.getElementById("productFrame");
            iframe.src = "view.php?id=" + productId;
            modal.style.display = "block";
         }
      });

      span.onclick = function() {
         modal.style.display = "none";
      }

      window.onclick = function(event) {
         if (event.target == modal) {
            modal.style.display = "none";
         }
      }
   });

   document.querySelectorAll('.add-to-wishlist').forEach(button => {
      button.addEventListener('click', function() {
         const productId = this.dataset.id;
         $.ajax({
            url: 'wishlist_action.php',
            type: 'POST',
            data: { id: productId },
            success: function(response) {
               alert(response);
            }
         });
      });
   });
</script>