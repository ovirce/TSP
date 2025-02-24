<?php
session_start(); //script to log the user out
session_destroy();
header("Location: home_page.php");
?>