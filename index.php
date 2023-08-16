<?php
include("database.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="output.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.9/dist/tailwind.min.css">
</head>

<body class="bg-gray-200">
    <!-- <h1 class="bold underline">Hello world</h1> -->
    <div class="bg-white w-full px-9 pt-6 flex justify-between shadow">


        <div>
            <img src="logo.PNG" alt="">
        </div>
        <div class="font-blod">
            <a href="#" class="p-4">Home</a>
            <a href="#" class="p-4">About</a>
            <a href="#" class="p-4">Blog</a>
            <a href="#" class="p-4">Post</a>
            <a href="#" class="p-4">Comment</a>
        </div>
    </div>
    <h2 class="m-20">RECENT POSTS</h2>
    <div class="flex m-20">
        <div class="w-1/5">
            <img src="img1.PNG" alt="" class="w-full">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi fugiat esse placeat iste quas maiores tempora tenetur </p>
            <!-- <a href="#">Learn more <i class="material-icons">arrow_forward</i> -->
            <a href="post-details.php?1d=1"><input type="submit" class="rounded-3xl bg-black mt-6 w-28 p-2 text-white text-xs float-left" value="Learn More"></a>
        </div>
    </div>

        <?php
$sql = "SELECT * FROM post";
$result = mysqli_query($connection, $sql);
if ($result) {
    while ($post = mysqli_fetch_assoc($result)) {
        echo '<div class="flex m-20 flex-row">';
        echo '<div class="w-1/5">';
        echo "<img src='" . $post['image_url'] . "' alt='Post Image' class='w-full'>";
        echo "<h2>" . $post['title'] . "</h2>";
        echo "<p>" . $post['content'] . "</p>";
       echo '</div>';
       echo '</div>';
    } 
    mysqli_free_result($result);
} else {
    echo "Error executing query: " . mysqli_error($connection);
}
?>


</body>

</html>


