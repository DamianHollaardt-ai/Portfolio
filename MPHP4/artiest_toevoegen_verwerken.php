<?php
require 'config.php';


$naam = $_POST['naam'];
$gamertag = $_POST['gamertag'];
$achternaam = $_POST['achternaam'];
$wachtwoord = $_POST['wachtwoord'];

if (isset($_POST['submit'])){

    if (empty($message)){
        $query = "INSERT INTO `gamers`(`naam`, `achternaam`, `gamertag`, `wachtwoord`) VALUES ('$naam','$achternaam','$gamertag','$wachtwoord')";
    }
}

var_dump($query);
if (mysqli_query($verbinding, $query)) {
    header('Location: artiest_toon.php');
} else {
    echo "<p>FOUT bij toegevoegen van gamer.</p>";
}

echo "<p><a href='artiest_toon.php'>Terug</a></p>";

?>
