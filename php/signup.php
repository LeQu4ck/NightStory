<?php
session_start();
include("connection.php");
include("functions.php");

//$conn = new mysqli('localhost', 'root', '', 'proiectweb');


$username = $_POST['username'];
$pswrd = $_POST['pswrd'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];



if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    if (username_validation($username) === true) {
        if (username_availabity($username, $conn) === true) {
            if (password_validation($pswrd) === true) {
                $pswrd = md5($pswrd);

                $var1 = rand(1, 9999);
                $var2 = rand(1, 9999);

                $var3 = $var1 . $var2;

                $var3 = md5($var3);

                if (email_validation($email) === true &&  firstname_validation($firstname) === true && lastname_validation($lastname) === true) {

                    $prflURL = $firstname . $var3 . $lastname;

                    $stmt = $conn->prepare("INSERT INTO user VALUES (NULL, '$username','$pswrd','$email','$firstname','$lastname', '$prflURL')");
                    echo registration_alert('Registration successful!');
                    header("Location: /ProiectWeb2/login.html");
                } else {
                    echo registration_alert('There was an error processing your request');
                }
            } else {
                echo registration_alert('Invalid password format!');
            }
        } else {
            echo registration_alert('Username already taken!');
        }
    } else {
        echo registration_alert('Username format invalid!');
    }



    $stmt->execute();
    // echo registration_alert('Registration successful!');
    $stmt->close();
    $conn->close();
}
