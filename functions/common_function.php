<?php
// include('./includes/connect.php');

function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by rand() LIMIT 0,4";
    $result_product=mysqli_query($con,$select_query);
    // $row_data=mysqli_fetch_assoc($result_product);
    // echo $row_data['product_title'];
    while($row_data=mysqli_fetch_assoc($result_product)){
        $product_id=$row_data['product_id'];
        $product_title=$row_data['product_title'];
        $product_description=$row_data['product_description'];
        $product_keyword=$row_data['product_keyword'];
        $product_image1=$row_data['product_image1'];
        $product_price=$row_data['product_price'];
        $brand_id=$row_data['brand_id'];
        $category_id=$row_data['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Prices: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
        </div>";
    }
}
}
}

function get_unique_cateories(){
    global $con;
    if(isset($_GET['category'])){
        $category_id =$_GET['category'];
    $select_query="select * from `products` where category_id=$category_id";
    $result_product=mysqli_query($con,$select_query);
    $num_of_rows =mysqli_num_rows($result_product);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Stocks for this Categories</h2>";
    }
    // $row_data=mysqli_fetch_assoc($result_product);
    // echo $row_data['product_title'];
    while($row_data=mysqli_fetch_assoc($result_product)){
        $product_id=$row_data['product_id'];
        $product_title=$row_data['product_title'];
        $product_description=$row_data['product_description'];
        $product_keyword=$row_data['product_keyword'];
        $product_image1=$row_data['product_image1'];
        $product_price=$row_data['product_price'];
        $brand_id=$row_data['brand_id'];
        $category_id=$row_data['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Prices: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>


    </div>
  </div>
        </div>";
    }
}
}

function get_unique_brands(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id =$_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id";
    $result_product=mysqli_query($con,$select_query);
    $num_of_rows =mysqli_num_rows($result_product);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Brands Available Services</h2>";
    }
    // $row_data=mysqli_fetch_assoc($result_product);
    // echo $row_data['product_title'];
    while($row_data=mysqli_fetch_assoc($result_product)){
        $product_id=$row_data['product_id'];
        $product_title=$row_data['product_title'];
        $product_description=$row_data['product_description'];
        $product_keyword=$row_data['product_keyword'];
        $product_image1=$row_data['product_image1'];
        $product_price=$row_data['product_price'];
        $brand_id=$row_data['brand_id'];
        $category_id=$row_data['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Prices: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

    </div>
  </div>
        </div>";
    }
}
}

function getbrands(){
    global $con;
    $select_brands="Select * from `brands`";
      $result_brands =mysqli_query($con,$select_brands);
      // $row_data=mysqli_fetch_assoc($result_brands);
      // column name brand title
      // echo $row_data['brand_title'];
      while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title =$row_data['brand_title'];
          $brand_id=$row_data['brand_id'];
          echo " <li class='nav-item '>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
}
}

function getcategories(){
    global $con;
    $select_category="Select * from `categories`";
      $result_category=mysqli_query($con,$select_category);
      
      while($row_data=mysqli_fetch_assoc($result_category)){
        $category_title =$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";
      }
}

// get all product
function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by rand()";
    $result_product=mysqli_query($con,$select_query);
    // $row_data=mysqli_fetch_assoc($result_product);
    // echo $row_data['product_title'];
    while($row_data=mysqli_fetch_assoc($result_product)){
        $product_id=$row_data['product_id'];
        $product_title=$row_data['product_title'];
        $product_description=$row_data['product_description'];
        $product_keyword=$row_data['product_keyword'];
        $product_image1=$row_data['product_image1'];
        $product_price=$row_data['product_price'];
        $brand_id=$row_data['brand_id'];
        $category_id=$row_data['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Prices: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

    </div>
  </div>
        </div>";
    }
}
}
}


// search products
function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
 $search_query="select * from `products` where product_keyword like '%$search_data_value%'";
  $result_search=mysqli_query($con,$search_query);
  $num_of_rows=mysqli_num_rows($result_search);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No Result matches, No products found on this category!!!</h2>";
  }
  // $row_data=mysqli_fetch_assoc($result_product);
  // echo $row_data['product_title'];
  while($row_data=mysqli_fetch_assoc($result_search)){
      $product_id=$row_data['product_id'];
      $product_title=$row_data['product_title'];
      $product_description=$row_data['product_description'];
      $product_keyword=$row_data['product_keyword'];
      $product_image1=$row_data['product_image1'];
      $product_price=$row_data['product_price'];
      $brand_id=$row_data['brand_id'];
      $category_id=$row_data['category_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Prices: $product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

  </div>
</div>
      </div>";
  }
}
}

// view details
function view_details(){
   global $con;

   if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
          $product_id=$_GET['product_id'];
    $select_query="select * from `products` where product_id='$product_id'";
    $result_product=mysqli_query($con,$select_query);
    // $row_data=mysqli_fetch_assoc($result_product);
    // echo $row_data['product_title'];
    while($row_data=mysqli_fetch_assoc($result_product)){
        $product_id=$row_data['product_id'];
        $product_title=$row_data['product_title'];
        $product_description=$row_data['product_description'];
        $product_keyword=$row_data['product_keyword'];
        $product_image1=$row_data['product_image1'];
        $product_image2=$row_data['product_image2'];
        $product_image3=$row_data['product_image3'];
        $product_price=$row_data['product_price'];
        $brand_id=$row_data['brand_id'];
        $category_id=$row_data['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Prices: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='index.php' class='btn btn-secondary'>Go Home</a>
    </div>
  </div>
        </div>
        
        <div class='col-md-8 mb-2'>
        <div class='row'>
        <div class='col-md-12'>
        <h4 class='text-center text-info mx-20'>Releative Products </h4>
        </div>
        <div class='card col-md-6'>
          <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
  </div>
        
        <div class='card col-md-6 '>
          <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
   
  </div>
  </div>
        </div>";
    }
}
    }
}
}

// Ip Address store
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 


// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
global $con;
$ip =getIPAddress();
$get_product_id=$_GET['add_to_cart'];
$select_query="select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id"; 
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
  echo "<script>alert('This item alreay present inside cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
else{
  $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,
  '$ip',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item Successfully Insert')</script>";
  echo "<script>window.open('index.php','_self')</script>";

}
}
}


// function to get number of item
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip =getIPAddress();
    $select_query="select * from `cart_details` where ip_address='$ip'"; 
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
    else{
      global $con;
    $ip =getIPAddress();
    $select_query="select * from `cart_details` where ip_address='$ip'"; 
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    }
  

    // total price function
    function total_cart_price(){
      global $con;
      $ip =getIPAddress();
      $total_price=0;
      $cart_query="Select * from `cart_details` where ip_address='$ip'";
      $result=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products= "select * from `products` where product_id = '$product_id'";
        $result_products =mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_price']); //[200,300]
          $product_values =array_sum($product_price);//[500]
          $total_price+=$product_values;      //500
        }
      }
      echo $total_price;
    }

?>