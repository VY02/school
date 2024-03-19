<?php
//This variable stores the hostname of mysql server.
$serverName = "localhost";
//This variable stores the username used to connect to the MySQL database.
$user = "root";
//This variable stores the pass used to connect to the MySQL database.
$pass = "";
//This variable stores the name of the database yo want to connect to within the MySQL server.
$databaseName = "caranguian";
//Establishing the connection between php and your database
$conn = new mysqli($serverName, $user, $pass, $databaseName);
//Checking the connection if its successfully established or not
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $bloodtype = $_POST['bloodtype'];
        $sql = "UPDATE `crud` SET `Name`='$Name',`age`='$age',`address`='$address',`contact`='$contact',`birthday`='$birthday',`bloodtype`='$bloodtype' WHERE `demo_id`='$demo_id'"; 
        $result = $conn->query($sql); 
        if ($result == TRUE) {
            echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }


if (isset($_GET['demo_id'])) {
    $demo_id = $_GET['demo_id']; 
    $sql = "SELECT * FROM `crud` WHERE `demo_id`='$demo_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $Name = $row['Name'];
            $age = $row['age'];
            $address = $row['address'];
            $contact  = $row['contact'];
            $birthday = $row['birthday'];
            $bloodtype = $row['bloodtype'];
            $demo_id = $row['demo_id'];
        } 
?>
        <h2>Student Profile Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Personal information:</legend>
            <input type="hidden" name="demo_id" value="<?php echo $demo_id; ?>">
            <br>

            Name:<br>

            <input type="text" name="Name" value="<?php echo $Name; ?>">

            <br>

            Age:<br>

            <input type="number" name="age" value="<?php echo $age; ?>">

            <br>

            Address:<br>

            <input type="text" name="address" value="<?php echo $address; ?>">

            <br>
            Contact:<br>

            <input type="phone" name="contact" value="<?php echo $contact; ?>">

            <br>

            Birthdate:<br>

            <input type="date" name="birthday" value="<?php echo $birthday;?>">

            Bloodtype:<br>

<input type="text" name="bloodtype" value="<?php echo $bloodtype;?>">

            
            <br><br>

            <input type="submit" value="Update" name="submit">

          </fieldset>

        </form> 
</body>
</html>
<?php
} else { 
    header('Location: demoDB.php');
}
}
?> 