<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $title = $_POST['title'];
    $size = $_POST['size'];
    $room_number = $_POST['room_number'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $reduction = $_POST['reduction'];
    $price = $_POST['price'];
    $uploadError = '';
    $picture = file_upload($_FILES['picture']);
    $sql = "INSERT INTO estates(`title`, `size`, `picture`, `room_number`, `city`, `address`, `latitude`, `longitude`, `reduction`, `price`) VALUES ('$title', '$size','$picture->fileName','$room_number', '$city', '$address', '$latitude', '$longitude', '$reduction', '$price')";
    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $title </td>
            <td> $size </td>
            <td> $room_number </td>
            <td> $city </td>
            <td> $address </td>
            <td> $latitude </td>
            <td> $longitude </td>
            <td> $reduction </td>
            <td> $price </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        header("refresh:3;url= ../index.php");
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
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
        <title>Create</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
    <?php require_once '../components/navbar.php' ?>
    <?php require_once '../components/hero.php' ?>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    <?php require_once '../components/footer.php' ?>

    </body>
</html>
