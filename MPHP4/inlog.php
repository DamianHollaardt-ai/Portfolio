<?php

session_start();


?>
<html>
<head>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="index.css">


    <meta charset="utf-8">
    <title>INLOG</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #a0fcff;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }


    </style>



</head>

<body>
     <form class="div" action="" method="post">

         <label for="naam">Name:</label>
         <input name="naam" id="naam" ><br /><br>

         <label for="wachtwoord">wachtwoord:</label>
         <input name="wachtwoord"  id="wachtwoord" ><br /><br>

         <div style="padding-left: 28%" class="g-recaptcha" data-sitekey="6LeXB-0ZAAAAAG6YsRbXP8PRu_jLYW0wKECdiR77"></div><br><br>

         <input type="submit" name="submit" value="Submit">

     </form>


<!--  code php    6LeXB-0ZAAAAANE5G183ErPyfHR4s_p0RnFxUZlr

6LeXB-0ZAAAAAG6YsRbXP8PRu_jLYW0wKECdiR77
-->

</body>
</html>


<?php

if (!isset($_SESSION['naam'])) {

    echo "<p>Welkom, " . $_SESSION['naam'] . "</p>";
}

var_dump($_POST);
if (isset($_POST['submit'])){
    require 'config.php';


    $naam = stripslashes($_POST["naam"]);
    $wachtwoord = stripslashes($_POST["wachtwoord"]);
    $response = $_POST["g-recaptcha-response"];

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = array(
        'secret' => '6LeXB-0ZAAAAANE5G183ErPyfHR4s_p0RnFxUZlr',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);

    if ($captcha_success->success==false) {
        echo "<p>You are a bot! Go away!</p>";
    } else if ($captcha_success->success==true) {
        echo "<p>You are not a bot!</p>";



        $opdracht = "SELECT * FROM gamers WHERE naam = '$naam' AND wachtwoord = '$wachtwoord'";

        $resultaat = mysqli_query($verbinding, $opdracht);


        if (mysqli_num_rows($resultaat) > 0){


            $user = mysqli_fetch_array($resultaat);


            $_SESSION['naam'] = $user['naam'];

            header('artiest_toon.php');


            echo "<p>Hallo $naam, u bent ingelogd!</p>";
            echo  "<p><a href='artiest_toon.php'>Ga verder</a></p>";
        }

        else{
            echo "<p>Email en/of wachtwoord zijn onjuist.</p>";
            echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
        }
    }
}
?>
