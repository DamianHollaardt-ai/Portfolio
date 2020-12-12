<?php
session_start();
ob_start();
?>
<html>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: #eee;
        }

        #wrapper {
            width: 500px;
            height: 50%;
            overflow: hidden;
            border: 0px solid #000;
            margin: 50px auto;
            padding: 10px;
        }

        .main-content {
            width: 250px;
            height: 40%;
            margin: 10px auto;
            background-color: #fff;
            border: 2px solid #e6e6e6;
            padding: 40px 50px;
        }

        .header {
            border: 0px solid #000;
            margin-bottom: 5px;
        }

        .header img {
            height: 50px;
            width: 175px;
            margin: auto;
            position: relative;
            left: 40px;
        }

        .input-1,
        .input-2 {
            width: 100%;
            margin-bottom: 5px;
            padding: 8px 12px;
            border: 1px solid #dbdbdb;
            box-sizing: border-box;
            border-radius: 3px;
        }

        .overlap-text {
            position: relative;
        }

        .overlap-text a {
            position: absolute;
            top: 8px;
            right: 10px;
            color: #003569;
            font-size: 14px;
            text-decoration: none;
            font-family: 'Overpass Mono', monospace;
            letter-spacing: -1px;
        }

        .btn {
            width: 100%;
            background-color: #3897f0;
            border: 1px solid #3897f0;
            padding: 5px 12px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 3px;
        }

        .sub-content {
            width: 250px;
            height: 10%;
            margin: 10px auto;
            border: 1px solid #e6e6e6;
            padding: 20px 50px;
            background-color: #fff;
        }

        .s-part {
            text-align: center;
            font-family: 'Overpass Mono', monospace;
            word-spacing: -3px;
            letter-spacing: -2px;
            font-weight: normal;
        }

        .s-part a {
            text-decoration: none;
            cursor: pointer;
            color: #3897f0;
            font-family: 'Overpass Mono', monospace;
            word-spacing: -3px;
            letter-spacing: -2px;
            font-weight: normal;
        }

        input:focus {
            background-color: yellow;
        }

    </style>


<?php
        if(isset($_POST['sendEmail'])) {
    $privateKey = "6LeXB-0ZAAAAANE5G183ErPyfHR4s_p0RnFxUZlr";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$privateKey&response=$response&remoteip=$remoteip");

    $result = json_decode($url, true);

    if ($result->success == true) {

        if (isset($_POST['inlog'])) {

            require 'config.php';

            $naam = $_POST['Gebruikersnaam'];
            $wachtwoord = $_POST['Wachtwoord'];

            $opdracht = "SELECT * FROM gamers WHERE naam = '$naam' AND wachtwoord = '$wachtwoord'";

            $resultaat = mysqli_query($verbinding, $opdracht);

            if (mysqli_num_rows($resultaat) > 0) {
                $user = mysqli_fetch_array($resultaat);

                $_SESSION['Gebruikersnaam'] = $user['naam'];

                header('Location: artiest_toon.php');

            } else {
                echo "<p>Naam en/of wachtwoord zijn onjuist.</p>";
                echo "<p><a href='inlog.php'>Probeer Opnieuw</a></p>";
            }
        }

    }
}

    else {


    ?>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

<form  id="login-form" class="form" action="" method="post">
    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <img src="https://i.imgur.com/zqpwkLQ.png">
            </div>
            <div class="l-part">
                <input name="Gebruikersnaam" id="Gebruikersnaam" type="text" placeholder="Username" class="input-1">
                <div class="overlap-text">
                    <input type="password" name="Wachtwoord" id="Wachtwoord" class="input-2">
                    <div  class="g-recaptcha" data-sitekey="6LeXB-0ZAAAAAG6YsRbXP8PRu_jLYW0wKECdiR77" ></div><br><br>
                </div>

                <input type="submit" name="inlog" class="btn" value="Submit">
            </div>
        </div>
        <div class="sub-content">
            <div class="s-part">
                <p>Don't have an account? <a href="#">Sign up</a></p>
            </div>
        </div>
    </div>
</form>
<?php
}

?>
</body>
</html>