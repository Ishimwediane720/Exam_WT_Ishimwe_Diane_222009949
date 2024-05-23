<?php
session_start();
include("connectio.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
   

    if (!empty($user_name) && !empty($password) && !empty($email) && !empty($gender)  && !is_numeric($user_name)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
         // Generate a random user ID
        $user_id = random_num(20);
        
        // Prepare and execute the SQL query
        $query = "INSERT INTO user1 (user_id, user_name, password, email, gender) VALUES ('$user_id', '$user_name', '$hashed_password', '$email', '$gender')";
        mysqli_query($con, $query);
        
        // Redirect to the login page
        header("location:login.php");
        die;
    } else {
        echo "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: yellowgreen;
            background-color:darkviolet;
        }

        #box {
            background-color:greenyellow;
            background-image: url(Intore.gif);
            margin: auto;
            width: 300px;
            height: auto;
            padding: 20px;
        }
        
    </style>
</head>
<body> 
    <h>WELCOME TO LtdDaa shop so Be registed here! </h>
<div id="box">
    <form method="POST">
        <div style="font-size:20px; margin:10px ;color:blue;">Please fill the form below to be registered</div>
        <div style="font-size:20px; margin:10px ;color:blue;">Username</div>
        <input id="text" type="text" name="user_name"><br><br>
        <div style="font-size:20px; margin:10px ;color:blue;">Strong Password</div>
        <input id="text" type="password" name="password"><br><br>
        <div style="font-size:20px; margin:10px ;color:blue;">Email</div>
        <input id="text" type="email" name="email"><br><br>
        <div style="font-size:20px; margin:10px ;color:blue;">Your Gender</div>
        <input id="text" type="gender" name="gender"><br><br>
        

        <input id="button" type="submit" value="Register Now"><br><br>
        <a href="login.php">Click to login</a><br><br>
    </form>
</div>

</body>
</html>
