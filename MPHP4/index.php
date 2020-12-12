<?php

require 'navbar.php';

session_start();

if ($_SESSION['naam'] !== ""){
    header("Location: inlog.php");
}

?>


