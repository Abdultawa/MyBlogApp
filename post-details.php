<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post-details</title>
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
                <a href="#" class="p-4">Post</a>
                <a href="#" class="p-4">Comment</a>
            </nav>
        </div>
    </div>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("database.php");
    ?>
    <div class="md:flex flex-wrap justify-between m-16">
        <?php
        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
            $sql = "SELECT * FROM post WHERE post_id = $postId";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $post = mysqli_fetch_assoc($result);
                echo "<div class= 'md:w-1/3 h-52'>";
                echo "<img src='./images/{$post['image_url']}' class='w-full'>";
                echo "</div>";

                echo "<div class= 'md: justify-end mt-24'>";
                echo "<h1 class= ''>" . $post['title'] . "</h1>";
                echo "<p class= ''>" . $post['content'] . "</p>";
                // echo "<a href='comment.php'><input type='submit' class='rounded-3xl bg-black mt-6 w-28 p-2 text-white text-xs float-right' value='Comment'></a>";
                echo "</div>";
            } else {
                echo "Error executing query: " . mysqli_error($connection);
            }
            mysqli_free_result($result);
        } else {
            echo "no post";
        }
        ?>
        <?php
        //     echo $postId;
        //     die();
        // 
        ?>
    </div>
    <div class='float-right'>
        <form action="comment.php" method="post" class="md: bottom-0 relative mt-56 ml-32">
            <input type="hidden" name="post_id" value='<?php echo $postId ?>'>
            <textarea name="comment" id="" cols="70" placeholder="Make your comment here" rows="10" class="md:border-solid border-black outline-none border p-1 resize-none w-1/2"></textarea><br>
            <button type="submit" class="bg-black text-white rounded-3xl p-3">Submit</button>
        </form>
    </div>
</body>

</html>