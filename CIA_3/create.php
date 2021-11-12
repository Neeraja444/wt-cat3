<?php
// include connection
include 'db_connection.php';

// declare varibales and initialize with empty values
$fnameErr = $lnameErr = $ageErr = $genderErr = $genderErr = $addressErr = "";
$fname = $lname = $age = $gender = $gender = $address = "";

// processing form data when form is submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "*This field is required";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if fname contains only letters
        if (!ctype_alpha($fname)) {
            $fnameErr = "Only letters are allowed";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "This field is required";
    } else {
        $lname = test_input($_POST["lname"]);
        // check if lname contains only letters
        if (!ctype_alpha($lname)) {
            $lnameErr = "Only letters are allowed";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "*This field is required";
    } else {
        $age = test_input($_POST["age"]);
        
    }

    if (empty($_POST["gender"])) {
        $genderErr = "*This field is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["course"])) {
        $courseErr = "*This field is required";
    } else {
        $course = test_input($_POST["course"]);
    }

    if (empty($_POST["address"])) {
        $addressErr = "*This field is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    // if no errors then insert data into databse
    if (empty($fnameErr) && empty($lnameErr) && empty($ageErr) && empty($genderErr) && empty($courseErr) && empty($addressErr)) {

        $sql = "INSERT INTO stuinfo (firstname, lastname, age, gender, course, address) VALUES ('$fname', '$lname', '$age', '$gender', '$course' , '$address')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New record created successfully');</script>";
            echo "<script>window.location.href='http://localhost/CIA_3/index.php';</script>";
            exit();
        }
    }
    mysqli_close($conn);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Create Data - PHP CRUD</title>
</head>

<body>
    <!-- submit form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3 class="mb-4 text-center">Create Record</h3>
                <div class="form-body bg-light p-4">
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fname" class="form-label">Firstname*</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?= $fname; ?>">
                                <small class="text-danger"><?= $fnameErr; ?></small>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="lname" class="form-label">Lastname*</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?= $lname; ?>">
                                <small class="text-danger"><?= $lnameErr; ?></small>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="lname" class="form-label">Age*</label>
                                <input type="age" class="form-control" id="age" name="age" value="<?= $age; ?>">
                                <small class="text-danger"><?= $ageErr; ?></small>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="gender" class="form-label">Gender*</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="<?= $gender; ?>">
                                <small class="text-danger"><?= $genderErr; ?></small>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="course" class="form-label">Course*</label>
                                <input type="text" class="form-control" id="course" name="course" value="<?= $course; ?>">
                                <small class="text-danger"><?= $courseErr; ?></small>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="address" class="form-label">Address*</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $address; ?>">
                                <small class="text-danger"><?= $addressErr; ?></small>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary form-control" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>