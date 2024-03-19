<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMI Calculator</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <?php

    $name = "Tolentino Jhay Vryllee L.";
    $age = 21;
    $address = "longos Malabon City";
    $contactNumber = "09682948086";
    $birthday = "2002,10,02";
    $gender = "Male";
    $bloodType = "N/A";


    $weight_kg = 70;
    $height_cm = 180;


    $bmi_metric = calculateBMI($weight_kg, $height_cm);

    $weight_lbs = $weight_kg * 2.20462;
    $height_inches = $height_cm * 0.393701;


    $bmi_imperial = calculateBMI($weight_lbs, $height_inches, 'imperial');


    function calculateBMI($weight, $height, $unit = 'metric') {
        if ($unit == 'imperial') {
            return ($weight / ($height * $height)) * 703; 
        } else {
            return $weight / (($height / 100) * ($height / 100)); 
        }
    }
    ?>
    
    <h2>Student Info</h2>
    <div class="info-section">
        <p><strong>Name:</strong> <?php echo $name ?></p>
        <p><strong>Age:</strong> <?php echo $age ?></p>
        <p><strong>Address:</strong> <?php echo $address ?></p>
        <p><strong>Contact Number:</strong> <?php echo $contactNumber ?></p>
        <p><strong>Birthday:</strong> <?php echo $birthday ?></p>
        <p><strong>Gender:</strong> <?php echo $gender ?></p>
        <p><strong>Blood Type:</strong> <?php echo $bloodType ?></p>
    </div>
    <h2>Body Mass Index</h2>
    <div class="info-section">
        <h3>Metric Units</h3>
        <p><strong>Weight:</strong> <?php echo $weight_kg ?> kg</p>
        <p><strong>Height:</strong> <?php echo $height_cm ?> cm</p>
        <p><strong>BMI:</strong> <?php echo round($bmi_metric, 1) ?></p>
    </div>

    <div class="info-section">
        <h3>Imperial Units</h3>
        <p><strong>Weight:</strong> <?php echo round($weight_lbs, 1) ?> lbs</p>
        <p><strong>Height:</strong> <?php echo round($height_inches, 1) ?> inches</p>
        <p><strong>BMI:</strong> <?php echo round($bmi_imperial, 1) ?></p>
    </div>
</div>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:white;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    background-color: #81b1d1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


button:hover {
    background-color: #0056b3;
}

    </style>

</body>
</html>
