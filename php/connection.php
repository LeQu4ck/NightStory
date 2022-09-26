<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proiectweb";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
	die("Failed to connect!");
}
