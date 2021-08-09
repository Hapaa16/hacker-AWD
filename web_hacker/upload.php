<!DOCTYPE html>
<html>
    <head>
        <Title>Upload to win</Title>
        <style>
            body {
                background-image: url('assets/upload.jpg');
                background-size: 100%;
            }
            h1 {
                text-align: center;
                color: white;
                margin-top: 50px;
            }
            form {
                text-align: center;
                margin-top: 150px;
                color: white;
            }
        </style>
    </head>
<body>
<h1>Upload hiij chaddinmu ?</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="image" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php

  if (getimagesize($_FILES["image"]["tmp_name"]) !== false)
     {
        if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name']))
    {
            echo "Success";
         }
        else echo "Ashhh Script Kiddie GTFO!";
     }
  else
     {
      echo "Invalid type of file";
     }

?>
