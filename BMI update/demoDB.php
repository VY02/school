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
echo "Connection Established!";
?>
<?php 
//PASSING THE DATA FROM HTML TO PHP AND STORE IT IN VARIABLES
  if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $bloodtype = $_POST['bloodtype'];
//INSERT DATA TO DATABASE
$sql = "INSERT INTO `crud`(`Name`, `age`, `address`, `contact`, `birthday`, `gender`, `bloodtype`) VALUES ('$Name','$age','$address','$contact','$birthday','$gender','$bloodtype')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
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
<h2>Student Profile</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Student Information:</legend>

    Student ID:<br>

    <input id="id" type="text" name="id" value="Auto" readonly>

    <br>

    Name:<br>

    <input type="text" name="Name">

    <br>

    age:<br>

    <input type="number" name="age">

    <br>

    address:<br>

    <input type="text" name="address">

    <br>

    contact:<br>

    <input type="phone" name="contact">

    <br>

    birthday:<br>
    <input type="date" name="birthday"><br>

    gender: <br>
    <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>    
    <br>
    
    bloodtype:<br>
    <input type="text" name="bloodtype"><br>

    <input id="submit" type="submit" name="submit" value="submit">
 
  </fieldset>

</form>

<?php 


$sql = "SELECT * FROM crud";

$result = $conn->query($sql);

?>
<div class="container">

        <h2>STUDENT LIST</h2>

<table class="table">

    <thead>

        <tr>

        <th>STUDENT ID</th>

        <th>Name</th>

        <th>age</th>

        <th>address</th>

        <th>contact</th>

        <th>birthday</th>

        <th>gender</th>

        <th>bloodtype</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>    
                        <td><?php echo $row['demo_id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['birthday']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['bloodtype']; ?></td>
                        <td>
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['demo_id']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" name="delete" href="delete.php?id=<?php echo $row['demo_id']; ?>">Delete</a>
                        </td>
                    </tr>                       

        <?php       }
            }

        ?>                

    </tbody>

</table>

 <?php 
    // Closing the database connection after using $result
    $conn->close(); 
    ?>


</body>
</html>