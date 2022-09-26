<?php

session_start();
include("functions.php");
include("connection.php");

$_SESSION;
$user_data = check_login($conn);

// $title = 'Unknown';
// $username = 'john';

$storyid = $_GET['url'];

$query = "SELECT story.*, user.first_name, user.last_name FROM story INNER JOIN user ON story.user_id = user.user_id WHERE story.url='$storyid'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

?>
    <div class="story-antet">
        <div class="story-image">

            <img id="coverImg" name="cover_image" src="/ProiectWeb2/<?php echo $row['image_url'] ?>" alt="cover-img">

        </div>

        <div class="story-details">

            <div class="story-title">
                <?php echo $row['title'] ?>
            </div>

            <div class="story-preview">

                <?php echo $row['preview'] ?>
            </div>

            <div class="story-date-and-number-of-views">

                <div class="story-date">
                    <?php echo $row['publish_date'] ?>

                </div>

                <div class="story-number-of-views">

                    <?php echo $row['nr_of_accesses'] ?>
                </div>

            </div>

            <div class="story-genre">
                <?php echo $row['genre'] ?>

            </div>

        </div>
    </div>

    <div class="read-block">



    </div>



<?php
}
?>