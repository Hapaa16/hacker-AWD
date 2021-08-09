<?php 
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>APT-MONGOLIA</title>
    <style>
    body {
        background-image: url("assets/login.jpg");
        background-color: #cccccc;
}
    </style>
    
</head>
<body>
<?php
include "dbcon.php"; 
#-----------------Bitgii orold--------------------------
$myfile = fopen("/flag", "r") or die("Unable to open file!");
$flag = fread($myfile,filesize("/flag"));
$do_not_touch = "UPDATE flag set secret='$flag' WHERE id=1";
mysqli_query($conn, $do_not_touch);
fclose($myfile);
#--------------------------------------------------------
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        #echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            #print_r($row);
            echo $row;
            echo "Logged in!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: welcome.php");
            exit();

    }
}
}
?>
    <div class="login">
        <form action="" method="POST">
            <label for="username">Username</label>
            <input id="username" type="text" name="username">
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
            <input id="submit" type="submit" value="login">
        </form>
    </div>
</body>
</html>
