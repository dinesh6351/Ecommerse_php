<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User -registration</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
         <!-- font style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fulid">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                    <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter the username" autocomplete="off"
                    required="required" name="user_username">
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter the Email" autocomplete="off"
                    required="required" name="user_email">
                </div>
                <!-- image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" class="form-control" id="user_image"
                    required="required" name="user_image">
                </div>

                <!-- Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password" placeholder="Enter the password" autocomplete="off"
                    required="required" name="user_password">
                </div>

                <!-- Conform Password field -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="conf_user_password" placeholder="Confirm password" autocomplete="off"
                    required="required" name="conf_user_password">
                </div>
                <!-- address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="user_address" placeholder="Enter the address" autocomplete="off"
                    required="required" name="user_address">
                </div>
                <!-- contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="user_contact" placeholder="Enter the mobile number" autocomplete="off"
                    required="required" name="user_contact">
                </div>

                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class=" btn btn-info py-2 px-3 border-0" name="user_registers">
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php">Login</a></p>
                </div>
                

                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php -->
<?php
if(isset($_POST['user_registers'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

// select query
$select_query="select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('UserName and Email Already exits')</script>";
}else if($user_password!=$conf_user_password){
    echo "<script>alert('Password does not matches')</script>";
    
}else{

    // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table`(user_name,user_email,user_pasword,user_image,user_ip,user_address,user_mobile)
    values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data insert Successfully')</script>";
        }
}

// select cart items
$select_cart_item="select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_item);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
$_SESSION['username']=$user_username;
echo "<script>alert('You have items in your cart')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}else{
echo "<script>window.open('../index.php','_self')</script>";
}
}
?>