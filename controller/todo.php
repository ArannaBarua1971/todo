<?php

session_start();
include_once './env.php';   

$data=$_REQUEST['text'];

if(empty($data)){
    $_SESSION['error']="Enter the text";
    header("location: ../index.php");
}
else{
    $query="INSERT INTO list (text) VALUES ('$data')";
    $response=mysqli_query($conn,$query);
    
    if($response){
        header("location: ../index.php");
    }
}