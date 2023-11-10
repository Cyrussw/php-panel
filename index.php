<?php

require("./web/php/config.php");

if (!empty($_SESSION["id"])) {
    header("Location: ./index.php");
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$name' OR email = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

            header("Location: ./web/pages/index.php");
        } else {
            echo "<script> alert('Wrong Password!'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered!'); </script>";
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
    <h2>Login</h2>

    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Username or Email: </label>
        <input type="text" name="name" id="name" value="" required> <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="" required> <br>
        <button type="submit" name="submit">Login!</button>
    </form>
    <a href="./web/pages/register.php">Register</a>
</body>

</html>