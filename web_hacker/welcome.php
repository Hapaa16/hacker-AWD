<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
         body {
              background-image: url("assets/login_wall.png")
         }
    </style>

</head>

<body>
<div class="welcome">
     <h1>Hello Hacker, <?php echo $_SESSION['username']; ?></h1>
     <a href="logout.php">Logout</a>
     </div>
</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>