<?php

function check_login($conn)
{

    if (isset($_SESSION['username'])) {

        $username = $_SESSION['username'];

        $query = "SELECT * FROM user WHERE  username = '$username' limit 1";

        $result = mysqli_query($conn, $query);

        if ($result &&  mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // else {
    //     header("Location: login.html");
    // }
}
//check preview lenght

function previewcheck($prev)
{
    if ($prev == null) {
        return "";
    }

    if (strlen($prev) <= 200) {
        return $prev;
    } else {
        $prev = substr($prev, 0, 200) . "...";
        return $prev;
    }

    return 0;
}


function registration_alert($message)
{

    echo "<script>alert('$message');</script>";
}
function registration_fail($message)
{

    echo "<script>alert('$message');</script>";
}

function story_upload($message)
{
    echo "<script>alert('$message');</script>";
}
function story_fav($message)
{
    echo "<script>alert('$message');</script>";
}

function username_availabity($string, $conn)
{
    $query = "SELECT * FROM user WHERE username = '$string'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        return false;
    }else{
        return true;
    }
   
}

function username_validation($string)
{
    if (preg_match('/^[A-Za-z][A-Za-z0-9]{3,15}$/', $string)) {
        return true;
    }
    return false;
}

//Minimum eight characters, at least one uppercase letter, one lowercase letter and one number
function password_validation($string)
{
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,32}$/', $string)) {
        return true;
    }
    return false;
}

function email_validation($string)
{
    if (preg_match('/^[a-zA-Z0-9\.]+@([a-zA-Z0-9]+\.)+[a-zA-z]{2,4}$/', $string)) {
        return true;
    }
    return false;
}

function firstname_validation($string)
{
    if (preg_match('/^[a-zA-Z\s-]*$/', $string)) {
        return true;
    }
    return false;
}

function lastname_validation($string)
{
    if (preg_match('/^[a-zA-Z\s-]*$/', $string)) {
        return true;
    }
    return false;
}


//ADUCEREA POVESTILOR IN PAGINA
// function bring_stories($conn)
// {

//     if (isset($_POST['request'])) {

//         $rqst = $_POST['request'];

//         $query = "SELECT story.*, user.first_name, user.last_name FROM story INNER JOIN user ON story.user_id = user.user_id WHERE story.genre = '$rqst'";

//         // $query = "SELECT * FROM story ";

//         $result = mysqli_query($conn, $query);

//         while ($row = mysqli_fetch_array($result)) {

//             // echo "<tr><td>" . $row['title'] . "</td><td>" . $row['first_name'] . " " . $row['last_name'] . "</td><td>" . $row['genre'] . "</td><td>" . $row['publish_date'] . "</td><td>" . $row['nr_of_accesses'] . "</td></tr>";
//             echo
//             '<div class="story-content">
//                  <div class="story-image">'
//                 . '<a href="#">'   . '<img src="data:image; base64, ' . base64_encode($row['cover_picture']) . ' "alt="cover_img" >' . '</a>' .
//                 '</div>
//             <div class="story-details">

//                 <div class="story-tile">'
//                 . '<a href="#">'  . 'Title' . ': '  . $row['title'] . '</a>' .
//                 '</div>

//                 <div class="story-author">'
//                 . 'Author: '   . $row['first_name'] . ' ' . $row['last_name'] .
//                 '</div>

//                  <div class="number-of-views">'
//                 . '<i class="fas fa-eye"></i> '    . $row['nr_of_accesses'] .
//                 '</div>

//                   <div class="story-preview">'
//                 . 'Preview: '   . previewcheck($row['preview']) .
//                 '</div>

//                  <div class="story-genre">'
//                 . 'Genre: '   . $row['genre'] .
//                 '</div>

//             </div>

//     </div>';
//         }
//     } else {

//         $query = "SELECT story.*, user.first_name, user.last_name FROM story INNER JOIN user ON story.user_id = user.user_id LIMIT 10";

//         $result = mysqli_query($conn, $query);

//         while ($row = mysqli_fetch_array($result)) {

//             // echo "<tr><td>" . $row['title'] . "</td><td>" . $row['first_name'] . " " . $row['last_name'] . "</td><td>" . $row['genre'] . "</td><td>" . $row['publish_date'] . "</td><td>" . $row['nr_of_accesses'] . "</td></tr>";
//             echo
//             '<div class="story-content">
//                  <div class="story-image">'
//                 . '<a href="#">'   . '<img src="data:image; base64, ' . base64_encode($row['cover_picture']) . ' "alt="cover_img" >' . '</a>' .
//                 '</div>
//             <div class="story-details">

//                 <div class="story-tile">'
//                 . '<a href="#">'  . 'Title' . ': '  . $row['title'] . '</a>' .
//                 '</div>

//                 <div class="story-author">'
//                 . 'Author: '   . $row['first_name'] . ' ' . $row['last_name'] .
//                 '</div>

//                  <div class="number-of-views">'
//                 . '<i class="fas fa-eye"></i> '    . $row['nr_of_accesses'] .
//                 '</div>

//                   <div class="story-preview">'
//                 . 'Preview: '   . previewcheck($row['preview']) .
//                 '</div>

//                  <div class="story-genre">'
//                 . 'Genre: '   . $row['genre'] .
//                 '</div>

//             </div>

//     </div>';
//         }
//     }
// }



// function check_image_size($size)
// {
//     // $errors = array();

//     if ($size > 16000000) {
//         // array_push($errors, "Image size is may not be bigger than 16MB.");
//         return image_size_alert("Image size is may not be bigger than 16MB.");
//     }
//     return null;
// }
function image_size_alert($message)
{
    // header("Location: /ProiectWeb2/compose.html");
    echo "<script>alert('$message');</script>";
}

// function check_image_dimension($width, $height)
// {
//     // $errors = array();

//     if ($width > 1000 || $height > 1000) {
//         // array_push($errors, "Image dimensions should be smaller than 1000x1000.");
//         return image_dimensions_alert("Image dimensions should be smaller than 1000x1000.");
//     }
//     return null;
// }
function image_dimensions_alert($message)
{
    // header("Location: /ProiectWeb2/compose.html");
    echo "<script>alert('$message');</script>";
}
