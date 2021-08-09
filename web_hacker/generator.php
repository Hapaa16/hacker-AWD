<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOL</title>
    <style>
        body {
            background-image: url("assets/hackerman.jpg");
        }
        p {
            color: white;
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: white;

        }
    </style>
</head>
<body>
<h1>Cool hacker names</h1>
</body>
</html>
<?php
    include "dbcon.php"; 

    $sql = "SELECT name, bruh FROM names";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    while($row = mysqli_fetch_array($result))
        {
    echo "<p>" . $row['name'] . " ".$row['bruh']. "</p>";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['word']) && isset($_POST['bruh'])){
            $word = $_POST['word'];
            $bruh = $_POST['bruh'];
            $sql = "INSERT INTO names(name, bruh) VALUES('$word', '$bruh')";
            print($sql);
            mysqli_query($conn, $sql);
            echo "<p>Successfully added Hacker name ".$_POST['word'].$_POST['bruh']."</p>";
        }
    }
?>