<?php
include_once './env.php';  
$id=$_REQUEST['id'];

$query="UPDATE list SET status='1' WHERE id='$id'";
$response=mysqli_query($conn,$query);

var_dump( $response);

if($response){
    header("location: ../index.php");
}