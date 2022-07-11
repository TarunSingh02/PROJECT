<?php
$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
}
// echo "Sucess connecting to the db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql =  "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`,
`desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email',
'$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    // echo "Successfully inserted";
    $insert = true;
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=\, initial-scale=1.0" />
    <title>Welcome to travel form</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="background" src="img/bg.jpg" alt="Trip" />
    <div class="container">
      <h1>Welcome To Intelegencia Unofficial Trip Form</h1>
      <p>Enter your details and submit the form to confirm your participation for
        the trip</p>
     <?php
     if($insert == true){
     
      echo "<p class='submitMsg'>Thanks For Submitting The Form</p>";
     }

      ?>

      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name" required
        />
        <input type="number" name="age" id="age" placeholder="Enter your age"  min="0" max="150" required />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender" required
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email" required
        />
        <input
          type="number"
          name="phone"
          id="phone"
          placeholder="Enter your phone"  pattern="[1-9]{1}-[0-9]{9}" minlength="10" maxlength="10" required
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Places you want to visit and also mention your budget." required
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>

    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`,
    `desc`, `dt`) VALUES ('1', 'testname', '25', 'Male', 'this@that.com',
    '9999999999', 'This is my First PHP myadmin message', current_timestamp()); -->
  </body>
</html>
