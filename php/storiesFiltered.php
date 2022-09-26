<?php
session_start();
include("functions.php");
include("connection.php");

$_SESSION;

sleep(0.5);
$user_data = check_login($conn);


if (isset($_POST['request'])) {

    $rsqt = $_POST['request'];

    if ($rsqt === "All") {
        $query = "SELECT story.*, user.username, user.profile_url FROM story INNER JOIN user ON story.user_id = user.user_id";
    } else {
        $query = "SELECT story.*, user.username, user.profile_url FROM story INNER JOIN user ON story.user_id = user.user_id WHERE story.genre = '$rsqt'";
    }
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

?>
            <div class="story-content">
                <div class="story-image">
                    <a href="readStory.html?url=<?php echo $row['url']; ?>" target="_blank"> <img src="<?php echo $row['image_url'] ?>"></a>
                </div>
                <div class="story-details">

                    <div class="story-tile">
                        <a href="readStory.html?url=<?php echo $row['url']; ?>" target="_blank">Title: <?php echo $row['title']; ?></a>
                    </div>

                    <div class="story-author">
                        Author: <a href="profile.html?profile_url=<?php echo $row['profile_url']; ?>"> <?php echo $row['username']; ?> </a>
                    </div>

                    <div class="number-of-views">
                        <i class="fas fa-eye"></i> <?php echo $row['nr_of_accesses']; ?>
                    </div>

                    <div class="story-preview">
                        Preview: <?php echo previewcheck($row['preview']); ?>
                    </div>

                    <div class="story-genre">
                        Genre: <?php echo $row['genre']; ?>
                    </div>

                </div>

            </div>


        <?php
        }
    } else {
        ?>
        <div class="empty">
            <p> No stories for current selection </p>
            <i class="fas fa-frown"></i>
        </div>

<?php
    }
}
?>