<?php

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #005daf;
        }

        .active {
            background-color: #005daf;
        }
    </style>
</head>
<body>

<ul>
    <li><a href="artiest_toon.php">Home</a></li>
    <li><a href="#news">Gamers/Friends</a></li>
    <li><a href="artiest_toevoegen.php">Gamer-Toevoegen</a></li>
    <li style="float:right"><a class="active" href="loguit.php">Logout</a></li>
</ul>

</body>
</html>

