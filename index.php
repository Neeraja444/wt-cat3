<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $course=$_POST['course'];
  $address=$_POST['address'];

$sql="INSERT INTO `crud`(name, age, gender, course, address) 
values ('$name','$age','$gender','$course','address')";
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
    <label>Enter student Name </label>
    <input type="text" class="form-control"  placeholder="Enter your name " name="name"
    name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter student age </label>
    <input type="email" class="form-control"  placeholder="Enter your age " name="age"
    name="email" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter student gender </label>
    <input type="text" class="form-control"  placeholder="Enter your gender " name="gender"
    name="mobile" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter student course </label>
    <input type="text" class="form-control"  placeholder="Enter your course " name="course"
    name="password" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Enter student address </label>
    <input type="text" class="form-control"  placeholder="Enter your address " name="address"
    name="password" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

   
  </body>
</html>