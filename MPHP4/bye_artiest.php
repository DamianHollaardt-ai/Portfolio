<?php
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
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                border: 4px black;
            }

            li {
                float: left;
                border: 4px black;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                background-color: #111;
                border: 4px black;
            }

            body {
                background-color: #17a2b8;
            }

            table, th, td {
                border: 1px solid black;
                font-family: arial, sans-serif;
                background-color: gray;
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

        </style>
    </head>
    <body>


    </body>
    </html>
    <?php
    if (isset($_POST['submit'])) {
        require 'config.php';

        $user_ID = $_POST['user_ID'];

        $query = "DELETE FROM `gamers` WHERE user_ID = '$user_ID'";


        if (mysqli_query($verbinding, $query)) {
            //header('Location: artiest_toon.php');
            var_dump($query);
        } else {
            echo "<h2>Fout bij verwijderen van $naam</h2>";
            echo mysqli_error($verbinding);
        }
    } else {
        echo "<h3>Geen gegevens ontvangen . . .</h3>";
    }
    echo "<h4>Terug naar <a href='artiest_toon.php'>overzicht</a></h4>";
}
?>