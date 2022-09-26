<?php
session_start();
include("functions.php");
include("connection.php");

$_SESSION;


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $usid = $_POST['usrid'];
    $stid = $_POST['storyid'];
    $storyURL = $_POST['story_url']; 
    

    // die($id . " " . $sid) ;

    $stmt = "INSERT INTO favourite VALUES (NULL, '$usid','$stid')";
    
    if(mysqli_query($conn, $stmt)){
        // echo story_fav('Story added to favourite succesfully!');
        header("Location: /ProiectWeb2/readStory.html?url=$storyURL&success=1");
    }else{
        echo story_fav('There was a problem!');
    }
    

}