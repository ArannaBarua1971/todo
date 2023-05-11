<?php
include_once './env.php';  
$id=$_REQUEST['id'];

$query="DELETE FROM list WHERE id='$id'";
$response=mysqli_query($conn,$query);

if($response){
    header("location: ../index.php");
}