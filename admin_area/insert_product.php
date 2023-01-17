<?php
include("../includes/connect.php");
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_prices=$_POST['product_prices'];
    $product_status='true';
    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    
    // accessing temp img name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category==''
    or $product_brands=='' or $product_prices=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields') </script>";
        exit();
    }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // insert_query
            $insert_product="insert into `products` (product_title,product_description,product_keyword,category_id,
            brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title',
            '$product_description','$product_keywords','$product_category','$product_brands','$product_image1',
            '$product_image2','$product_image3','$product_prices',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_product);
            if($result_query){
                echo "<script>alert('Successfully Inserted')</script>";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products Admin Dashboard</title>
       <!-- bootstrap css link -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
         <!-- font style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <!-- title -->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_title" class="form-label">Product title</label>
    <input type="text" class="form-control" id="product_title"
     name="product_title" placeholder="Enter Product title" autocomplete="off" required="required">
  </div>
  <!-- description -->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_description" class="form-label">Product Description</label>
    <input type="text" class="form-control" id="product_description"
     name="product_description" placeholder="Enter Product description" autocomplete="off" required="required">
  </div>

  <!-- keywords -->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_keywords" class="form-label">Product Description</label>
    <input type="text" class="form-control" id="product_keywords"
     name="product_keywords" placeholder="Enter Product keywords" autocomplete="off" required="required">
  </div>
  <!-- Category selects -->
  <div class="form-outline mb-4 w-50 m-auto">
    <select name="product_category" id="" class="form-select">
        <option value="">Select a Category</option>
        <?php
        $select_query="select * from `categories`";
        $result_query=mysqli_query($con,$select_query);
        // $row_data=mysqli_fetch_assoc($result_query);
        // echo $row_data['category_title'];
        while($row_data=mysqli_fetch_assoc($result_query)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>
    </select>
</div>
  <!-- Brands Selects -->
  <div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brands" id="" class="form-select">
        <option value="">Select a Brands</option>
        <?php
        $select_query="select * from `brands`";
        $result_query=mysqli_query($con,$select_query);
        // $row_data=mysqli_fetch_assoc($result_query);
        // echo $row_data['category_title'];
        while($row_data=mysqli_fetch_assoc($result_query)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        ?>
    </select>
</div>

 <!-- Image1 -->
 <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image1" class="form-label">Product Image 1</label>
    <input type="file" class="form-control" id="product_image1"
     name="product_image1" required="required">
  </div>

 <!-- Image2 -->
 <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image2" class="form-label">Product Image 2</label>
    <input type="file" class="form-control" id="product_image2"
     name="product_image2" required="required">
  </div>

   <!-- Image3 -->
 <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image3" class="form-label">Product Image 3</label>
    <input type="file" class="form-control" id="product_image3"
     name="product_image3" required="required">
  </div>

    <!-- Prices -->
    <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_prices" class="form-label">Product Prices</label>
    <input type="text" class="form-control" id="product_prices"
     name="product_prices" placeholder="Enter Product Prices" autocomplete="off" required="required">
  </div>

  <!-- button -->
  <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="form-control bg-info" name="insert_product" value="Insert Categories" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" >
  <!-- <button type="button" class=" btn btn-primary mb-2 px-3" name="insert_product">Insert Product</button> -->
  </div>
        </form>
    </div>
</body>
</html>