<?php
require 'navbar.php';
session_start();

if (!isset($_SESSION['naam'])){
    header("Location: inlog.php");
}

else {


    ?>
    <style>
        .divstyle {
            background: rgba(255, 255, 255, 0.46);
            border: 5px solid black;
            margin-top: 60px;
            margin-left: 30%;
            width: 40%;
            height: 200px;
        }

        .divstyle2 {
            background: rgba(255, 255, 255, 0.46);
            border: 5px solid black;
            margin-left: 30%;
            width: 40%;
            height: 14%;
        }

        .divstylecenter {
            text-align: center;
        }
    </style>

    <?php
    require 'config.php';

    $user_ID = $_GET['user_ID'];
    $gamertag = $_GET['gamertag'];

    $query = "SELECT * FROM `gamers` WHERE `user_ID` = '$user_ID' AND gamertag = '$gamertag'";
    $resultaat = mysqli_query($verbinding, $query);
    if (mysqli_num_rows($resultaat) == 0) {
        echo "<p>Er is geen gamer met de naam $gamertag</p>";
    } else {
        $rij = mysqli_fetch_array($resultaat);
        ?>
        <div class="divstyle">
            <div class="divstylecenter">
                <p>Wilt u de volgende Gamer verwijderen?</p>
                <form name="form1" method="post" action="bye_artiest.php">
                    <input type="hidden" name="user_ID" value="<?php echo $rij['user_ID'] ?>">
                    <p>Gebrukersnaam:
                        <input type="text" name="gamertag" value="<?php echo $rij['gamertag'] ?>" /></p>
                    <p><input type="submit" name="submit" value="verwijder"/></p>
                </form>
                <p><a href="artiest_toon.php">Terug</a> naar overzicht.</p>
            </div>
        </div>
        <?php
    }
}
?>
