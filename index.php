<?php
$insert = false;
if(isset($_POST['save'])){
  
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trip";

    $con = mysqli_connect($server, $username, $password, $dbname);
    if(!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "Error: $sql <br>" . $con->error;
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <img src="bg4.jpeg" alt="JIET JODHPUR" class="bg">
    <div class="container">
        <h1>Welcome to JIET US Trip</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thank you for submitting your form. We are very happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" class="name" id="name" name="name" placeholder="Enter your name">
            <input type="text" class="age" id="age" name="age" placeholder="Enter your Age">
            <input type="text" class="gender" id="gender" name="gender" placeholder="Enter your gender">
            <input type="email" class="email" id="email" name="email" placeholder="Enter your E-mail">
            <input type="text" class="phone" id="phone" name="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn" name="save">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
