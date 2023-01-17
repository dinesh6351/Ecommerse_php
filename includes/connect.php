<?php
$con =mysqli_connect('localhost','root','','mystore');
if(!$con){
    // echo "Connection Successful!!";
    die(mysqli_error($con));
}
// else{
//     die(mysqli_error($con));
// }

?>