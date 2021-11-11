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
    <button class  = "btn btn-primary my-5"><a href="index.php" 
        class="text-light">Add user </a> </button>
        <button class  = "btn btn-primary my-5"><a href="MCA.php" 
        class="text-light">result of only MCA students </a> </button>  
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
    $sql="select * from `stuinfo` where course='MCA'";
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
?>
  
 </tbody>
</table>   
</div>

</body>
</html>