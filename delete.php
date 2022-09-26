<?php
require './connection.php';

$id = $_GET['id'];
$query = "DELETE FROM `patients` WHERE id = $id;";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location:index.php");
} else {
    echo "Error deleting record";
}
// $sql1 = "DELETE FROM patients where id = 0";
// $conn->query($sql1)
?>