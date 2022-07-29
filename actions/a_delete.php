<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture =="picavatar.png")?: unlink("../picture/$picture");
    $sql = "DELETE FROM estates WHERE id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
        header("refresh:3;url= ../index.php");
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/style.css">
        <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
        <title>Delete</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
    <?php require_once '../components/navbar.php' ?>
    <?php require_once '../components/hero.php' ?>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/footer.php' ?>
    </body>
</html>
