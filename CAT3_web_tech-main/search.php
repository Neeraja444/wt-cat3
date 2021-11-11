<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S1 no</th>
      <th scope="col">Name</th>
      <th scope="col">age</th>
      <th scope="col">gender</th>
      <th scope="col">course</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($_GET['deleteid'])){
      $stu_id=$_GET['deleteid'];
    $sql="SELECT stu_id=$stu_id , name='$name' , age='$age' , gender='$gender' , course='$course' , address='$address'FROM `stuinfo` WHERE stu_id=9`";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['stu_id'];
            $name=$row['name'];
            $age=$row['age'];
            $gender=$row['gender'];
            $course=$row['course'];
            $address=$row['address'];
            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$age.'</td>
            <td>'.$gender.'</td>
            <td>'.$course.'</td>
            <td>'.$address.'</td>
            <td>
             <button><a href="update.php?updateid='.$id.'">Update</a></button>
            <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
    </td>  
          </tr>';
        }
    }
}
?>
  
 </tbody>
</table>   
</div>

</body>
</html>