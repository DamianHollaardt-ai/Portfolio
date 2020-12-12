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

    $query = "SELECT `user_ID`,`naam`,`gamertag`,`achternaam` FROM `gamers`";

    $resultaat = mysqli_query($verbinding,$query);
    if (mysqli_num_rows($resultaat) == 0)
    {
        echo "<p>Er is geen user gevond met ID $user_ID.</p><br>";
    }else{
        $rij = mysqli_fetch_array($resultaat);
        ?>

        <form method="post" action="artiest_update.php">
            <input type="hidden" name="user_ID" value="<?php echo $rij['user_ID']?>" readonly>
            <table width="200" border="0.5">
                <tr>
                    <td>Gamer-Tag:</td>
                    <td><input type="text" name="gamertag" value="<?php echo $rij['gamertag']?>"></td>
                </tr>
                <tr>
                    <td>naam:</td>
                    <td><input type="text" name="naam" value="<?php echo $rij['naam']?>"></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $rij['achternaam']?>"></td>
                </tr>

                <tr>
                    <td>Submit:</td>
                    <td><input type="submit" value="Update"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    echo "<h4>Terug naar <a href='artiest_toon.php'>overzicht</a></h4>";
}
?>


