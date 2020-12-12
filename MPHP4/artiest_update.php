<?php
session_start();

if (!isset($_SESSION['naam'])){
    header("Location: inlog.php");
}

else {


    ?>

    <?php

    require 'config.php';

    $user_ID = $_POST['user_ID'];
    $gamertag = $_POST['gamertag'];
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];

    $query = "UPDATE `gamers` SET `gamertag`='$gamertag',`naam`='$naam',`achternaam`='$achternaam' WHERE `user_ID` = '$user_ID'";

    if (mysqli_query($verbinding, $query)) {

        var_dump($query);

        header("Location: artiest_toon.php");

    } else {
        echo "FOUT bij Updaten<br><br>";
        echo mysqli_error($verbinding), "<br><br>";
        echo $query;;
    }
    echo "<div class='divstyle'><h4>Terug naar <a href='artiest_toon.php'>overzicht</a></h4></div> ";
}

?>
