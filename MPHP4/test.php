<?php

// grab recaptcha library
require_once "recaptchalib.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>How to Integrate Google “No CAPTCHA reCAPTCHA” on Your Website</title>
</head>

<body>

<form action="" method="post">

    <label for="name">Name:</label>
    <input name="name" required><br />

    <label for="email">Email:</label>
    <input name="email" type="email" required><br />

    <div class="g-recaptcha" data-sitekey="6LeXB-0ZAAAAAG6YsRbXP8PRu_jLYW0wKECdiR77"></div>

    <input type="submit" value="Submit" />

</form>

<!--js-->
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>

<?php
foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
}

// your secret key
$secret = "";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>