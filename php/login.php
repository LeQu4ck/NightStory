<?php

session_start();
    include("connection.php");
    include("functions.php");

$username = $_POST['username'];
$pswrd = md5($_POST['pswrd']);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!empty($username) && !empty($pswrd)) {

        $query = "SELECT  * FROM user WHERE username = '$username' limit 1";

        $result = mysqli_query($conn, $query);

        if ($result) {

            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['pswrd'] === $pswrd) {

                    $_SESSION['username'] = $user_data['username'];
                    header("Location: /ProiectWeb2/index.html");
                    die;
                }else{
                    echo "Wrong password!";
                }
            }
        }
    } else {
        echo "Please enter valid data!";
    }
}
