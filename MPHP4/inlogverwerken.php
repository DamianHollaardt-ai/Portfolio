<?php
if(isset($_POST['sendEmail'])) {
    $privateKey = "6LeXB-0ZAAAAANE5G183ErPyfHR4s_p0RnFxUZlr";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$privateKey&response=$response&remoteip=$remoteip");

    $result = json_decode($url, true);

    if($result->success == true) {
        $naam = strip_tags(trim($_POST['naam']));
        $wachtwoord = strip_tags(trim($_POST['wachtwoord']));
        $userArray = [
            'naam' => $naam,
            'wachtwoord' => $wachtwoord,
        ];
        var_dump($userArray);

    } else {
        echo "reCaptcha failed, please try again...";
    }
}

?>
