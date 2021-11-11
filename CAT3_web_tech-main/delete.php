<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $stu_id=$_GET['deleteid'];
    $sql="delete from `stuinfo` where stu_id=$stu_id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "deleted succefully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
    }
?>