<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">  
<!-- css file -->
<link rel="stylesheet" href="../style.css">
<!-- font awasome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- style -->
<style>
    .admin_image{
        width:100px;
        object-fit:contain;
    }
    .footer{
    position: absolute;
    bottom: 0px;
}
</style>
</head>
<body>
<div class="container-fulid p-0">
    <!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../img/cartlogo.jpeg" alt="" class="logo">
    <nav class="navbar navbar-expand-lg ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="" class="nav-link"> Welcome guest</a>
        </li>
    </ul>
</nav>
      
  </div>
</nav>
<!-- Second child -->
<div class="bg-light">
    <h3 class="text-center p-2">
        Manage Details
    </h3>
</div>

<!-- third child -->

<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../img/apple.jpg" alt="" class="admin_image" ></a>
        
        <p class="text-light text-center"> Admin Name</p>
    </div>
    <div class="button text-center">
        <button class="bg-info"><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-1">Insert Product</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">View Product</a></button>
        <button class="bg-info"><a href="index.php?insert_categorie" class="nav-link text-light bg-info my-1  p-1">Insert Categories</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">View Categories</a></button>
        <button class="bg-info"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1  p-1">Insert Brands</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">View Brands</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">All Orders</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">All Payment</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">List users</a></button>
        <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1  p-1">Logout</a></button>
    </div>
</div>
</div>

<!-- fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_categorie'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    }
    ?>
</div>

  <!-- last child  -->
  <div class="bg-info p-3 text-center footer">
  <p>All right reserved Ⓒ- Designed by Dini-2023</p>
</div>
</div> 

<!-- bootstrap css link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>