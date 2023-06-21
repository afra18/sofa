<?php

include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:signin.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:signin.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>
   <?php include'Links.php' ?>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">
   
</head>

<header class="header">

   <div class="flex">
   <a href="Home.php" ><i class="fa-solid fa-house"></i></a> 
      <a href="#" class="logo">Furniture</a>

      <nav class="navbar">
         <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
      
      </nav>
   </div>

</header>

<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
 <div class="filters">
<form method="post" action="" >
    
 <input type="submit"  value="sectional sofa" name="category" >
 <input type="submit"  value="leather sofa" name="category2" >
 <input type="submit"  value="recliner sofa" name="category3" >
 <input type="submit"  value="velvet sofa" name="category4" >
 <input type="submit"  value="sofa" name="category5" >
 <input type="submit"  value="Snack Cone" name="category6" >
  <!-- <input type="button"  value="Boxr" id="removeButton"> -->
</form>	
</div>
<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `sample` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> Username : <span><?php echo $fetch_user['username']; ?></span> </p>
   <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      
       <a href="Main.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>

</div>

<div class="products">
<div class="box-container">
     
   <?php
@$category = "B1";
@$category2 = "T2";
@$category5 = "CH5";
  if(isset($_POST['category']))
     {?> 
      <br>
      
     
       <?php
      $select_product1 = mysqli_query($conn, "SELECT * FROM `products` where BrandID = '$category'") or die('query failed');
      if(mysqli_num_rows($select_product1) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product1)){
            ?>
            <form method="post" class="box" action="">
            <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="number" min="1" name="product_quantity" value="1">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </form>
         
      <?php
         }
      }
   }  
      elseif(isset($_POST['category2'])){?> 
      
       <?php
      $select_product1 = mysqli_query($conn, "SELECT * FROM `products` where BrandID = '$category2'") or die('query failed');
         if(mysqli_num_rows($select_product1) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product1)){
               ?>
               
               <form method="post" class="box" action="">
               <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
               <div class="name"><?php echo $fetch_product['name']; ?></div>
               <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="number" min="1" name="product_quantity" value="1">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
           
         <?php
            };
         };
      }
      elseif(isset($_POST['category2'])){?> 
      
       <?php
      $select_product1 = mysqli_query($conn, "SELECT * FROM `products` where BrandID = '$category2'") or die('query failed');
         if(mysqli_num_rows($select_product1) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product1)){
               ?>
               
               <form method="post" class="box" action="">
               <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
               <div class="name"><?php echo $fetch_product['name']; ?></div>
               <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="number" min="1" name="product_quantity" value="1">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
           
         <?php
            };
         };
      }elseif(isset($_POST['category2'])){?> 
      
       <?php
      $select_product1 = mysqli_query($conn, "SELECT * FROM `products` where BrandID = '$category2'") or die('query failed');
         if(mysqli_num_rows($select_product1) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product1)){
               ?>
               
               <form method="post" class="box" action="">
               <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
               <div class="name"><?php echo $fetch_product['name']; ?></div>
               <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="number" min="1" name="product_quantity" value="1">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
           
         <?php
            };
         };
      }
      elseif(isset($_POST['category5'])){?> 
      
         <?php
        $select_product1 = mysqli_query($conn, "SELECT * FROM `products` where BrandID = '$category5'") or die('query failed');
           if(mysqli_num_rows($select_product1) > 0){
              while($fetch_product = mysqli_fetch_assoc($select_product1)){
                 ?>
                 
                 <form method="post" class="box" action="">
                 <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
                 <div class="name"><?php echo $fetch_product['name']; ?></div>
                 <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                 <input type="number" min="1" name="product_quantity" value="1">
                 <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                 <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                 <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                 <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
             
           <?php
              };
           };
        }
      ?>
 </div>
       
       <br><br>
<section>
<h1 class="heading">ALL products</h1>
<div class="box-container">

<?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>

      <form method="post" class="box" action="" name="form2" id="boxr">
     
         <img src="ProductsImg/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['name']; ?></div>
         <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
   <?php
      };
   };
   ?>
   </div>
</section>
     

 
  

</div>


</div>

</body>
<!-- <script>
   document.getElementById("removeButton").addEventListener("click", function() {
    var boxr = document.getElementById("boxr");
    if (boxr) {
      boxr.remove();
    }
});
</script> -->
</html>