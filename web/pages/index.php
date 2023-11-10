<?php 

require("../php/config.php");

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);    
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../../index.php");
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
    <h1>Welcome, <?php echo $row["username"]; ?>!</h1>
    <a href="../php/logout.php">Logout!</a>
</body>

</html>