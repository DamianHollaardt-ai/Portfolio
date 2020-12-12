<?php
require 'navbar.php';
session_start();

if (!isset($_SESSION['naam'])){
    header("Location: inlog.php");
}

else {


    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <style>

            table, th, td {
                border: 3px solid black;
                font-family: arial, sans-serif;
                background: rgba(255, 255, 255, 0.46);
                border-collapse: collapse;
                height: 10px;
                width: 50%;
                margin-left: 26%;
                margin-top: 30px;
            }

            td, th {
                text-align: left;
                padding: 10px;
            }

            .active {
                background-color: #cb0100;
            }


        </style>
    </head>
    <body>


    </body>
    </html>

    <?php
    require 'config.php';


    $user_ID = $_GET['user_ID'];

    $query = "SELECT * FROM `gamers` WHERE `user_ID` =" . $user_ID;


    $resultaat = mysqli_query($verbinding, $query);


    if (mysqli_num_rows($resultaat) == 0) {
        echo "<p>Er is geen Band gevond met ID $user_ID.</p>";
    } else {
        $rij = mysqli_fetch_array($resultaat);

        echo "<h2>Gamer ID: $user_ID</h2>";
        echo "<table border='1'>";
        echo "<tr><td>Gamer-Tag:</td>";
        echo "<td>" . $rij['gamertag'] . "</td></tr>";
        echo "<tr><td>Orgineele naam:</td>";
        echo "<td>" . $rij['naam'] . "</td></tr>";
        echo "<tr><td>Achternaam:</td>";
        echo "<td>" . $rij['achternaam'] . "</td></tr>";
        echo "</table>";
    }
    echo "<h4>Terug naar <a href='artiest_toon.php'>overzicht</a></h4>";
}
?>
