<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.9/dist/tailwind.min.css">

</head>

<body>
    <div class="bg-white w-full px-9 pt-6 flex justify-between shadow">


        <div>
            <img src="logo.PNG" alt="">
        </div>
        <div class="font-blod">
            <button id="mobile-open-button" class="text-3xl sm:hidden focus:outline-none">
                &#9776;
            </button>
            <nav class="hidden md:block space-x-8 text-xl" aria-label="main">
                <a href="index.php" class="p-4">Home</a>
                <a href="#" class="p-4">About</a>
                <a href="#" class="p-4">Blog</a>
                <a href="admin.php" class="p-4">Post</a>
                <a href="#" class="p-4">Comment</a>
            </nav>
        </div>
    </div>
</body>
</html>

<?php

include 'database.php';
$sql = "SELECT * FROM  comments WHERE post";
$result = mysqli_query($connection, $sql);
if ($result) {
    while ($comment = mysqli_fetch_assoc($result)) {
        echo '<div class="">';
        echo "<table class='md: w-full'>";
        echo "<thead>";
        // echo "<td>ID</td>";
        // echo "<td>Username</td>";
        echo "</thead>";
        echo "<tr>";
        echo "<td>" . $comment['post_id'] . "</td>";
        echo "<td>" . $comment['comment_text'] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo '</div>';
    }
    mysqli_free_result($result);
} else {
    echo "Error executing query: " . mysqli_error($connection);
}
?>