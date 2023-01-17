<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User -Login</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
         <!-- font style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css">
      <style>
        body{
            overflow-x: hidden;
        }
      </style>
</head>
<body>
    <div class="container-fulid">
        <h2 class="text-center">User  Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- user name -->
                <div class="form-outline mb-4 mt-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter the username" autocomplete="off"
                    required="required" name="user_username">
                </div>
        
                <!-- Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password" placeholder="Enter the password" autocomplete="off"
                    required="required" name="user_password">
                </div>

              
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class=" btn btn-info py-2 px-3 border-0" name="user_login">
                    <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="user_registration.php">Register</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="select * from `user_table` where user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    // cart items
    $user_ip=getIPAddress();
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $rows_count_cart=mysqli_num_rows($select_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_pasword'])){
            
            if($rows_count==1 && $rows_count_cart==0){
                $_SESSION['username']=$user_username;
            echo "<script>alert('Login Sucessfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
            echo "<script>alert('Login Sucessfully')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
        echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>