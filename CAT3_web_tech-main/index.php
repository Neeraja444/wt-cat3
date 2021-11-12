<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $course=$_POST['course'];
  $address=$_POST['address'];

$sql="INSERT INTO `stuinfo`(name, age , gender , course , address) 
values ('$name','$age','$gender','$course',' $address')";
$result=mysqli_query($con,$sql);
if($result){
  #echo "data inserted succefully";
  header("location:display.php");
}else{
  die(mysqli_error($con));
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Crud Operation</title>
  </head>
  <body>
  <div class = "container">
  <form method="post">
  <div class="form-group">
    <label>Enter Name </label>
    <input type="text" class="form-control"  placeholder="Enter your name " name="name"
    name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter age </label>
    <input type="text" class="form-control"  placeholder="Enter your age " name="age"
    name="age" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter gender </label>
    <input type="text" class="form-control"  placeholder="Enter your gender " name="gender"
    name="gender" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter course </label>
    <input type="text" class="form-control"  placeholder="Enter your course" name="course"
    name="course" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter Address </label>
    <input type="text" class="form-control"  placeholder="Enter your address" name="address"
    name="address" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

   
  </body>
</html>