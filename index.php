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
    <h2 class="m-20">RECENT POSTS</h2>
    <div class="md:flex m-auto flex-row flex-wrap">
        <!-- <div class="w-1/3 pb-10">
            <img src="img1.PNG" alt="" class="w-full h-52">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi fugiat esse placeat iste quas maiores tempora tenetur </p>
            <a href="post-details.php?1d= . $post['id']"><input type="submit" class="rounded-3xl bg-black mt-6 w-28 p-2 text-white text-xs float-left" value="Learn More"></a>
        </div> -->
        <?php
        $sql = "SELECT * FROM post";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            while ($post = mysqli_fetch_assoc($result)) {
                echo '<div class="md:w-1/3 p-10">';
                echo "<img src='./images/{$post['image_url']}' alt='' class = 'w-full h-52'>";
                echo "<h2>" . $post['title'] . "</h2>";
                echo "<p>" . $post['content'] . "</p>";
                echo "<a href='post-details.php?id={$post['post_id']}'><input type='submit' class='rounded-3xl bg-black mt-6 w-28 p-2 text-white text-xs float-left' value='Learn More'></a>";
                echo '</div>';
            }
            mysqli_free_result($result);
        } else {
            echo "Error executing query: " . mysqli_error($connection);
        }
        ?>
    </div>




</body>

</html>