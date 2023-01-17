<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

  // Select data from database
  $select_query ="select * from `brands` where brand_title ='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number =mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This Brand Present in Database')</script>";
  }else{
  $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Brand has been inserted Successfully')</script>";
  }
  }

}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-trash"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brand" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2">

  <!-- <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" > -->
  <button  class=" bg-info p-2 my-3 border-0" name="insert_brand">Insert Brand</button>
</div>
</form>