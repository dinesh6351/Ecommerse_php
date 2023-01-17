<!-- Connection -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website Cart-Details</title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
         <!-- font style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="./style.css">
      <style>
        .cart_img{
    height: 60px;
    width: 60px;
    object-fit:contain;
}
      </style>
</head>
<body>

<div class="container-fulid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./img/cartlogo.jpeg" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all_products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li> <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
            <?php cart_item(); ?>
          </sup></a>
        </li> <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/- </a>
        </li>
      
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- cart calling -->
<?php
cart();
?>
<!-- Second Child -->
<nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link'  href='#'>Welcome Guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link'  href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
  
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link'  href='./users_area/user_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link'  href='./users_arae/logout.php'>Logout</a>
      </li>";
      }
        ?>
</nav>
<!-- third Child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of  E-commerce and Community</p>
</div>

<!-- fourth child -->
<div class="container">
    <div class="row">
      <!-- form -->
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
                  <!-- php entire code -->
              <?php
             global $con;
      $ip =getIPAddress();
      $total_price=0;
      $cart_query="Select * from `cart_details` where ip_address='$ip'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){

    //     echo "<thead>
    //     <tr>
    //         <th>Product Title</th>
    //         <th>Product Image</th>
    //         <th>Quantity</th>
    //         <th>Total Price</th>
    //         <th>Remove</th>
    //         <th colspan='2'>Operations</th>
    //     </tr>
    // </thead>
    // <tbody>";
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products= "select * from `products` where product_id = '$product_id'";
        $result_products =mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_price']); //[200,300]
          $price_table=$row_product_price['product_price'];
          $product_title=$row_product_price['product_title'];
          $product_image1=$row_product_price['product_image1'];
          $product_values =array_sum($product_price);//[500]
          $total_price+=$product_values;      //500
        
              ?>
              <thead>
        <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
        </tr>
    </thead>
    <tbody>
                  <tr>
                <td><?php echo $product_title?></td>
                <td><img src="./admin_area/product_images/<?php echo $product_image1?>"  class="cart_img" alt=""></td>
                <td><input type="text" name="qty"  class="form-input w-50" id=""></td>
                <?php
                 $ip =getIPAddress();
                 if(isset($_POST['update_cart'])){
                  $quantities =$_POST['qty'];
                  $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                  $result_products_qty=mysqli_query($con,$update_cart);
                  $total_price=$total_price*$quantities;
                 }
                ?>
                <td><?php echo $price_table ?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" id=""></td>
                <td class="d-flex"><button class="bg-info px-3 py-2 border-0 mx-3" value="Update Cart" name="update_cart">Update</button>
                <button class="bg-info px-3 py-2 border-0 mx-3" value="Remove cart" name="remove_cart">Remove</button></td>
                </tr>
                <?php
                }
              }
            }
            else{
              echo "<h2 class='text-center text-danger' > Cart is Empty </h2>";
            }
              ?>
              </tbody>
        </table>
        <div class="d-flex ">
          <?php 
            global $con;
            $ip =getIPAddress();
            $cart_query="Select * from `cart_details` where ip_address='$ip'";
            $result=mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
                echo "<h4 class='px-3 '>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
                <button class='btn btn-info px-3 mx-3 border-0' name='continue_shopping' value='continue Shopping'>Continue Shopping</button>
                <button class='btn btn-secondary px-3 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>CheckOut</a></button>";
            }else{
              echo "<button class='btn btn-info px-3 mx-3 border-0' name='continue_shopping' value='continue Shopping'>Continue Shopping</button>";
            }
            if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('index.php','_self')</script>";
            }
          ?>
            
        </div>
    </div>
</div>
</form>

<!-- romove cart item function  -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="delete from `cart_details` where product_id=$remove_id ";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
  }
}
}
echo $remove_item=remove_cart_item();
?>
<!-- last chikd -->
<?php
include('./includes/footer.php');
?>
</div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>