<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post page</title>
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
  <form action="" method="post" enctype="multipart/form-data">
    <!-- <label for="title">Title:</label> -->
    <input type="type" id="title" name="title" placeholder="Post title" required class="border border-solid border-black outline-none">

    <input type="file" name="image">
    <!-- <label for="content">Content:</label><br> -->
    <textarea id="content" name="content" rows="20" cols="50" placeholder="Content of your post" class="md: border border-solid border-black outline-none w-full"></textarea><br>

    <input type="submit" value="Submit Post" class="bg-black text-white p-3 rounded-2xl m-auto">
  </form>

  <?php
  include("database.php");



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    // $fileSize = $_FILES["image"]["size"];

    move_uploaded_file($image_tmp, "images/" . $image);
    // move_uploaded_file($tmpName, 'img/' . $newImageName);
    $query = "INSERT INTO post (title, content, image_url) VALUES ('$title', '$content', '$image')";
    $result = mysqli_query($connection, $query);

    if ($result) {
      echo "Post submitted successfully!";
      header("location: index.php");
    } else {
      echo "Error submitting post: " . mysqli_error($connection);
    }
  }


  ?>
</body>

</html>