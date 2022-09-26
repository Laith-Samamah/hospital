<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php require './connection.php';?>
    <div>
       <a href="./add.php"><button class="addnew">Add a new patient</button></a> 
    </div>
    
<div class="cards">
    <?php
    $sql = $conn->query('SELECT * FROM patients');
    while ($patient = $sql->fetch_assoc()) {
        ?>
    <div class="patient">

        <p><?php echo $patient['id']; ?> . <?php echo $patient['Name']; ?></p>
        <p><?php echo "Age: " . $patient['Age']; ?> </p>
        <p><?php echo "address: " . $patient['Address']; ?> </p><br>
        

        <?php echo'
        <div class = "button">
           <a href="./update.php?id=' .$patient['id']. '"> <button> Edit </button></a> 
           <a href="./delete.php?id='.$patient['id'].'"> <button> Delete </button></a> 
        </div>';
        ?>
    </div>


    <?php }?>
</div>
</body>
</html>

