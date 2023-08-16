<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="type
        " id="title" name="title" required><br>
        
      <input type="file" name="image_url">
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
      
        <input type="submit" value="Submit Post">
      </form>  
      
      <?php
        include ("database.php");
        


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_POST['image_url'];
  $query = "INSERT INTO post (title, content) VALUES ('$title', '$content')";
  $result = mysqli_query($connection, $query);
  
  if ($result) {
    echo "Post submitted successfully!";
} else {
    echo "Error submitting post: " . mysqli_error($connection);
}
}

// header("location: index.php");

?>
</body>
</html>