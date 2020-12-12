<?php
require 'navbar.php';
session_start();

if (!isset($_SESSION['naam'])){
    header("Location: inlog.php");
}

else {


require "config.php";


$msg = "";

if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];


    // image file directory
    $target = "IMG/".basename($image);

    $query = "INSERT INTO foto (image) VALUES ('$image')";
    // execute query
    mysqli_query($verbinding, $query);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($verbinding, "SELECT * FROM foto");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style type="text/css">
        #content{
            width: 50%;
            margin: 20px auto;
            border: 1px solid #cbcbcb;
        }
        form{
            width: 50%;
            margin: 20px auto;
        }
        form div{
            margin-top: 5px;
        }
        #img_div{
            width: 80%;
            padding: 5px;
            margin: 15px auto;
            border: 1px solid #cbcbcb;
        }
        #img_div:after{
            content: "";
            display: block;
            clear: both;
        }
        img{
            float: left;
            margin: 5px;
            width: 300px;
            height: 140px;
        }
    </style>
</head>
<body>
<div id="content">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
        echo "<img src='IMG/".$row['image']."' >";
        echo "</div>";
    }
    ?>
    <form method="POST" action="foto.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
        </div>
        <div>
            <button type="submit" name="upload">POST</button>
        </div>
    </form>
</div>

<p><a href='artiest_toon.php'>Terug</a></p>
</body>
</html>

<?php
}
?>