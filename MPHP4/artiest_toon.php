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
    require 'navbar.php';

    $query = "SELECT * FROM gamers";


    $resultaat = mysqli_query($verbinding, $query);


    if (mysqli_num_rows($resultaat) == 0) {
        echo "<p>Er zijn geen resultaten gevonden.</p>";
    } else {
        echo "<table border='1'>";

        echo "<th>Gamer-Tag:</th>";
        echo "<th>Naam:</th>";
        echo "<th>Achternaam:</th>";
        echo "<th>Info:</th>";
        echo "<th> Aanpassen:</th>";
        echo "<th> Verwijderen:</th>";
        echo "<th> foto:</th>";


        while ($rij = mysqli_fetch_array($resultaat)) {

            echo "<tr>";
            echo "<td>" . $rij['gamertag'] . "</td>";
            echo "<td>" . $rij['naam'] . "</td>";
            echo "<td>" . $rij['achternaam'] . "</td>";
            echo "<td> <a href='artiest_detail.php?user_ID=" . $rij['user_ID'] . "&gamertag=" . $rij['gamertag'] . "'> Info:</a></td>";
            echo "<td> <a href='artiest__wijzig.php?user_ID=" . $rij['user_ID'] . "&gamertag=" . $rij['gamertag'] . "'> wijzige</a></td>";
            echo "<td> <a href='artiest_verwijderen.php?user_ID=" . $rij['user_ID'] . "&gamertag=" . $rij['gamertag'] . "'> Verwijderen</a></td>";
            echo "<td> <a href='foto.php?user_ID=" . $rij['user_ID'] . "&gamertag=" . $rij['gamertag'] . "'> Foto</a></td>";
            echo "</tr>";

        }
        echo "</table>";
    }
}