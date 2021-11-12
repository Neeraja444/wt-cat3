<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Display Data - PHP CRUD</title>
</head>

<body>
    <div class="container mt-5">
        <a href="create.php" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Add Record</a>
        <form class="form-inline my-2 my-lg-0 pb-4 float-right" action="" method="post">
                        <input class="form-control mr-sm-2"  name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
        <table class="table table-bordered table-striped mt-4">
            <caption>Records of Students</caption>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // include connection
                include 'db_connection.php';

                $sql = "SELECT * FROM stuinfo";
                $result = mysqli_query($conn, $sql);
                $records = mysqli_num_rows($result);

                if ($records > 0) {
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $count = 1;
                    foreach ($row as $row) { ?>
                        <tr>
                            <td class="text-capitalize"><?= $row["id"]; ?></td>
                            <td class="text-capitalize"><?= $row["firstname"]; ?></td>
                            <td class="text-capitalize"><?= $row["lastname"]; ?></td>
                            <td class="text-uppercase"><?= $row["age"]; ?></td>
                            <td class="text-capitalize"><?= $row["gender"]; ?></td>
                            <td class="text-capitalize"><?= $row["course"]; ?></td>
                            <td class="text-capitalize"><?= $row["address"]; ?></td>
                            <td>
                                <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-primary"><i class="far fa-edit"></i> Update</a>&nbsp;
                                <a href="delete.php?id=<?= $row["id"]; ?>" class=" btn btn-danger" onclick="return checkDelete();"><i class="far fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                mysqli_close($conn);
                ?>

                <?php
                        //include config file
                        require_once "config.php";

                        $sql = "SELECT * FROM stuinfo";
                        $search =  isset($_POST['search']) ? $_POST['search'] : '';
                        //attempt select query execution
                        $sql = "SELECT * FROM stuinfo WHERE firstname LIKE '%$search%' OR course LIKE '%$search%'";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result)> 0){

                                while($row = mysqli_fetch_array($result)){
                                   
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        
                                }
                                echo "</tbody>";
                               
                                //free result set
                                mysqli_free_result($result);
                            }else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }

                        //close connection
                        mysqli_close($link);
                    ?>
            </tbody>
        </table>
    </div>
    <script>
        function checkDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>

</html>