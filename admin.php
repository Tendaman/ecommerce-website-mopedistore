<?php
   @include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_description = $_POST['p_description'];
   $p_category = $_POST['p_category'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   // Check if the table exists in the database
   $check_table_query = mysqli_query($conn, "SHOW TABLES LIKE 'products'");
   if(mysqli_num_rows($check_table_query) > 0){
      $insert_query = mysqli_query($conn, "INSERT INTO `products` (name, price, description, category, image) VALUES('$p_name', '$p_price', '$p_description', '$p_category', '$p_image')") or die('query failed');

      if($insert_query){
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
         $message[] = 'Product added successfully';
      }else{
         $message[] = 'Could not add the product';
      }
   }else {
      $message[] = 'Table does not exist';
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'Product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'Product could not be deleted';
   }
}

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_description = $_POST['update_p_description'];
   $update_p_category = $_POST['update_p_category'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', description = '$update_p_description', category = '$update_p_category', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Product updated successfully';
      header('location:admin.php');
   }else{
      $message[] = 'Product could not be updated';
      header('location:admin.php');
   }
}

// Handle category filter
$filter_category = '';
if(isset($_POST['filter_category'])){
   $filter_category = $_POST['category'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}

?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a New Product</h3>
   <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <textarea name="p_description" placeholder="Enter the product description" class="box" required></textarea>
   <select name="p_category" class="box" required>
      <option value="" disabled selected>Select category</option>
      <option value="Nike">Nike</option>
      <option value="Adidas">Adidas</option>
      <option value="Jordan">Jordan</option>
      <option value="Puma">Puma</option>
      <option value="Gucci">Gucci</option>
      <option value="Converse">Converse</option>
      <option value="Recommended">Recommended</option>
   </select>
   <input type="submit" value="Add Product" name="add_product" class="btn">
</form>

</section>

<section>
<form action="" method="post" class="add-product-form">
   <h3>Filter Products by Category</h3>
   <select name="category" class="box" required>
      <option value="" disabled selected>Select category</option>
      <option value="All">All</option>
      <option value="Nike">Nike</option>
      <option value="Adidas">Adidas</option>
      <option value="Jordan">Jordan</option>
      <option value="Puma">Puma</option>
      <option value="Gucci">Gucci</option>
      <option value="Converse">Converse</option>
      <option value="Recommended">Recommended</option>
   </select>
   <input type="submit" value="Filter" name="filter_category" class="btn">
</form>
</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Product Price</th>
         <th>Product Description</th>
         <th>Product Category</th>
         <th>Action</th>
      </thead>

      <tbody>
         <?php
            $query = "SELECT * FROM `products`";
            if($filter_category && $filter_category != 'All'){
               $query .= " WHERE category='$filter_category'";
            }

            $select_products = mysqli_query($conn, $query);
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>R<?php echo $row['price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
            </td>
         </tr>

         <?php
            }    
            }else{
               echo "<div class='empty'>Nothing here</div>";
            }
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="150" alt="">

      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <textarea name="update_p_description" class="box" required><?php echo $fetch_edit['description']; ?></textarea>
      <select name="update_p_category" class="box" required>
         <option value="" disabled>Select category</option>
         <option value="Nike" <?php if($fetch_edit['category'] == 'Nike') echo 'selected'; ?>>Nike</option>
         <option value="Adidas" <?php if($fetch_edit['category'] == 'Adidas') echo 'selected'; ?>>Adidas</option>
         <option value="Jordan" <?php if($fetch_edit['category'] == 'Jordan') echo 'selected'; ?>>Jordan</option>
         <option value="Puma" <?php if($fetch_edit['category'] == 'Puma') echo 'selected'; ?>>Puma</option>
         <option value="Gucci" <?php if($fetch_edit['category'] == 'Gucci') echo 'selected'; ?>>Gucci</option>
         <option value="Converse" <?php if($fetch_edit['category'] == 'Converse') echo 'selected'; ?>>Converse</option>
         <option value="Recommended" <?php if($fetch_edit['category'] == 'Recommended') echo 'selected'; ?>>Recommended</option>
      </select>
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Update the Product" name="update_product" class="btn">
      <input type="reset" value="Cancel" id="close-edit" class="option-btn">
      <script>
         document.querySelector('#close-edit').onclick = () =>{
            document.querySelector('.edit-form-container').style.display = 'none';
            window.location.href = 'admin.php';
         };
      </script>
   </form>

   <?php
         }
      }
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   }
   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
