<?php
$insert=false;
if(isset($_POST['name'])){

    $servername = "localhost";
   $username="root";
   $password="";

   $con=mysqli_connect($servername,$username,$password);

   if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
   }
//    echo "Connected Successfully to the database";
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
  $sql=" INSERT INTO `trip`.`trip`(`Sno.`, `name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('' ,'$name', '$age', '$gender', '$email', '$phone', '$desc' ,current_timestamp())";
//   echo $sql;

  if($con->query($sql)==true){
    // echo "Successfully Inserted";
    $insert=true;
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }
   $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="nljiet.jpg" alt="N.L.J.I.E.T">
    <div class="container">
        <h1>Welcome to New L.J.I.E.T US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert==true){
         echo "<p class='submitMsg'>Thanks for submitting the form,We are happy to see you joining us for the trip</p>";
        }
     ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
   
    <script src="index.js"></script>

</body>
</html>