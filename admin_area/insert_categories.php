<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];

  // Select data from database
  $select_query ="select * from `categories` where category_title ='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number =mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This Category Present in Database')</script>";
  }else{
  $insert_query="insert into `categories` (category_title) values ('$category_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Category has been inserted Successfully')</script>";
  }
  }

}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-trash"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2">

  <!-- <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" > -->
  <button  class=" bg-info p-2 my-3 border-0"  name="insert_cat" >Insert Categorie</button>
</div>
</form>