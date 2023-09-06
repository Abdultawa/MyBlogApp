<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include "database.php";
// include "post-details.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = $_POST["name"];
    $post_id = $_POST['post_id'];
    $comment = $_POST["comment"];


    // Insert comment into the database
    $sql = "INSERT INTO `comments` (`post_id`,`comment_text`) VALUES ('$post_id','$comment')";
    if ($connection->query($sql) === TRUE) {
        echo "Comment submitted successfully!";
        //  header('Location: post-details.php');

    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>


