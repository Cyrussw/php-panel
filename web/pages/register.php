<?php

require("../php/config.php");

if (!empty($_SESSION["id"])) {
    header("Location: ./index.php");
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["confirmpassword"];

    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

    $duplicate = mysqli_query($conn, $sql);

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        if ($password == $password_confirm) {
            $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `createdTime`, `isBanned`, `isPremium`, `isAdmin`, `isOwner`) VALUES (NULL, '$username', '$email', '$password', NOW(), 0, 0, 0, 0);";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful'); </script>";
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Panel</title>
</head>

<body>
    <h2>Registration</h2>

    <form class="" action="" method="post" autocomplete="off">
        <label for="username">Username: </label>
        <input type="text" name="username" id="name" value="" required> <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="" required> <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="" required> <br>
        <label for="confirmpassword">Confirm Password: </label>
        <input type="password" name="confirmpassword" id="confirmpassword" value="" required> <br>
        <button type="submit" name="submit">Register!</button>
    </form>
    <a href="../../index.php">login</a>
</body>

</html>