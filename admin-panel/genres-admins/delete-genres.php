<?php require "../../config/config.php" ?>
<?php



if (isset($_GET['name'])) {
    $name = $_GET['name'];

    


    $deletShow = $conn->query("DELETE FROM genres WHERE name='$name'");
    $deletShow->execute();

    header("location: show-genres.php");
}




?>