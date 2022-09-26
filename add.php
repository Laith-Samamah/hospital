<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patients</title>
    <link rel="stylesheet" href="addstyle.css">
</head>
<body>
<?php require './connection.php';?>

<h3>Add a new patient information</h3>

<div>
  <form action="./add.php" method="POST">

    <label for="name"></label>
    <input type="text" id="name" name="p-name" placeholder="Your name.." required>

    <label for="age"></label>
    <input type="number" id="age" name="p-age" placeholder="Your age.." required>

    <label for="address"></label>
    <input type="text" id="address" name="p-address" placeholder="Your address.."required>

    <input type="submit" value="Submit" name="submit">
  </form>
</div>
<br>
<a href="./index.php"><button class="back">Go back</button></a>
</body>
</html>

<?php
if(isset($_REQUEST['submit'])){

// prepare and bind
$stmt = $conn->prepare("INSERT INTO patients (Name, Age, Address) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $name, $age, $address);

// set parameters and execute
$name = $_POST['p-name'];
$age = $_POST['p-age'];
$address = $_POST['p-address'];
$stmt->execute();
// header('Refresh:0');
// header("location:index.php");


echo "New records created successfully";

}

// $sql1 = "truncate patients";
// $sql1 = "DELETE FROM patients where id > 0";
// $conn->query($sql1)
?>

