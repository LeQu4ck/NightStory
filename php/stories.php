<?php
session_start();
include("functions.php");
include("connection.php");
$_SESSION;
$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Night story</title>
</head>

<body>
    <div class="container">
        <nav class="menu">
            <ul class="main-menu">
                <li class="active"><i class="fa fa-home"></i><a href="main.php"> Home</a></li>
                <li class="with-submenu">
                    <i class="fa fa-briefcase"></i>Account <i class="fa fa-caret-down"></i>
                    <ul class="submenu">
                        <li> Welcome, <?php echo $user_data['first_name']; ?> !</li>
                        <li><a href="compose.html"> Compose</a></li>
                        <li> <a href="logout.php"> Logout</a></li>

                    </ul>
                </li>
                <li><i class="fa fa-user"></i><a href="stories.php"> Stories </a></li>

            </ul>
        </nav>
        <article>
            <h1>Stories</h1>
            <div class="content">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Author</th> 
                        <th>Genre</th>
                        <th>Publish date</th>
                        <th>No. of views</th>
                    </tr>
                    
                </table>
            </div>
        </article>
    </div>
</body>

</html>