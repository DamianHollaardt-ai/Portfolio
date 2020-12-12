<?php
require 'config.php';

$user_ID = $_GET['user_ID'];

$query = "DELETE FROM `gamers` WHERE `user_ID` =".$user_ID;
?>