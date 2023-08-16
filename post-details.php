<?php
include ("database.php");
?>
<?php
    if(isset($_GET['id'])){
        $postId = $_GET['id'];
        $sql = "SELECT * FROM post WHERE id = $postId";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $post = mysqli_fetch_assoc($result);
    
       
            echo "<h2>" . $post['title'] . "</h2>";
            echo "<p>" . $post['content'] . "</p>";
        } else {
            echo "Error executing query: " . mysqli_error($connection);
        }
        mysqli_free_result($result);
    }else{
        echo"no post";
    }





?>