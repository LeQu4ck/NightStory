<?php

session_start();
	include("functions.php");
    include("connection.php");


if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
}

header("Location: /ProiectWeb2/login.html");
die;
