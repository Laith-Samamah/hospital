<?php
require './connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `patients` WHERE id = $id;";
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_assoc($result);
// print_r ($result);
$name=$patient['Name'];
$age=$patient['Age'];
$address=$patient['Address'];

if(isset($_REQUEST['submit'])){

    $name = $_POST['p-name'];
    // echo $name;
    $age = $_POST['p-age'];
    $address = $_POST['p-address'];

    // prepare and bind
    $stmt = $conn->prepare("UPDATE patients set Name=?, Age=?, Address=? where id=?");
    $stmt->bind_param("sisi", $name, $age, $address ,$id);
    $stmt->execute();
    header("location:index.php");
}



?>

<div>
  <form method="POST">

    <label for="name"></label>
    <input type="text" id="name" name="p-name" value="<?php echo $name ?>" required>

    <label for="age"></label>
    <input type="number" id="age" name="p-age" value="<?php echo $age ?>" required>

    <label for="address"></label>
    <input type="text" id="address" name="p-address" value="<?php echo $address ?>" required>

    <input type="submit" value="Submit" name="submit">
  </form>
</div>
<br>
