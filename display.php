<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christ operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <button class  = "btn btn-primary my-5"><a href="index.php" 
        class="text-light">Add user </a> </button> 
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S1 no</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student age</th>
      <th scope="col">Student gender</th>
      <th scope="col">Student course</th>
      <th scope="col">Student address</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
      <?php
    $sql="select * from `christ`";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $studentname=$row['name'];
            $studentage=$row['age'];
            $studentgender=$row['gender'];
            $studentcourse=$row['course'];
            $studentaddress=$row['address'];
            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$studentname.'</td>
            <td>'.$studentage.'</td>
            <td>'.$studentgender.'</td>
            <td>'.$studentcourse.'</td>
            <td>'.$studentaddress.'</td>
            <td>
            <button><a href="update.php?insertid='.$id.'">insert</a></button>
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