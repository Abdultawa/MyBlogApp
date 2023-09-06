<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.9/dist/tailwind.min.css">

    <title>Document</title>
</head>
<body>
    <div class="shadow w-1/3 m-auto py-7 rounded-3xl bg-gray-400 mt-40">
    <form action="" method="post" class="flex flex-col justify-center items-center">
    <h1>ADMIN LOGIN</h1>
        <input type="text" name="username" class="border mb-4" autocomplete="on" placeholder="Enter username">
        <input type="password" name="password" class="border mb-4" placeholder="Enter password">
        <input type="submit" value="Login" class="border py-3 px-9 rounded-3xl">
    </form>
    </div>
</body>
</html>

<?php
include "database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check user credentials
    $sql = "SELECT * FROM `Admin_tbl` WHERE `username`='$username' AND `role` = 'Admin' AND `password`='$password'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        // $row = mysqli_fetch_assoc($result);
        // $password = $row["password"];
        $_SESSION['user'] = ['role' => 'Admin'];
        header("Location: post.php");
        exit();
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    }

?>