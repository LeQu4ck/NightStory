<?php
session_start();
include("functions.php");
include("connection.php");
$_SESSION;
$user_data = check_login($conn);

$userid = $user_data['user_id'];
$date = date("Y/m/d");
$title = $_POST['title'];
$preview = $_POST['preview'];
$genre = $_POST['Genres'];
$body = $_POST['body'];
$noa = 0;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $nr1 = rand(1, 9999);
    $nr2 = rand(1, 9999);

    $nr3 = $nr1 . $nr2 ;

    $nr3 = md5($nr3);

    $cleanTitle = str_replace(array("'",' '), "", $title);

    $url = $cleanTitle . $nr3;
    
    

    $validation = TRUE;
        

        if (isset($_FILES['ImgInp']) && file_exists($_FILES['ImgInp']['tmp_name'])) {

            // $width  = $_FILES['ImgInp']['tmp_name'][0];
            // $height = $_FILES['ImgInp']['tmp_name'][1];
            $image_info = getimagesize($_FILES['ImgInp']['tmp_name']);
            $width = $image_info[0];
            $height = $image_info[1];


            $size   = filesize($_FILES['ImgInp']['tmp_name']);


            if ($width < 1000 && $height < 1000) {
                if ($size < 5000000) {
                    $imgName = $_FILES['ImgInp']['name'];

                    $var1 = rand(1, 9999);
                    $var2 = rand(1, 9999);

                    $var3 = $var1 . $var2;

                    $var3 = md5($var3);

                    $img_path = "../img/" . $var3 . $imgName;
                    $img_path_db = "img/" . $var3 . $imgName;

                    move_uploaded_file($_FILES['ImgInp']["tmp_name"], $img_path);

                } else {
                    // header("Location: /ProiectWeb2/compose.html");
                    $validation = FALSE;
                    return  image_size_alert("Image size may not be bigger than 5MB.");
                    
                }
            } else {
                // header("Location: /ProiectWeb2/compose.html");
                $validation = FALSE;
                return image_dimensions_alert("Image dimensions should be smaller than 1000x1000.");
                
            }
        } else {
            $img_path_db = "img/defaultStoryImg.png";
        }
    

    if ($validation) {
        if ($conn->connect_error) {

            die('Connection Failed: ' . $conn->connect_error);
        } else {

            try {
                // $img_path = check_image();


                $query = "INSERT INTO story VALUES (NULL,'$userid', '" . addslashes($title) . "','" . addslashes($preview) . "','$date','$genre','" . addslashes($body) . "', '$noa', '$img_path_db', '$url')";
                // die($query) ;
                $exec = $conn->prepare($query);

                $exec->execute();
                
                $exec->close();
                $conn->close();
                header("Location: /ProiectWeb2/home.html");

                echo story_upload('Story successfully saved!');

            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }else{
        die;
    }
}
