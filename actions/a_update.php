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
    $id = $_POST['id'];



    $uploadError = '';
    $picture = file_upload($_FILES['picture']);
    if($picture->error===0){
        ($_POST["picture"]=="picavatar.png")?: unlink("../picture/$_POST[picture]");
        $sql = "UPDATE estates SET `title` = '$title', `picture` = '$picture->fileName', `size` = '$size', `room_number` = '$room_number', `city` = '$city', `address`= '$address' , `latitude` = '$latitude',`longitude` = '$longitude', `reduction` = '$reduction',`price` = '$price'  WHERE id = {$id}";
    }else{
        $sql = "UPDATE estates SET `title` = '$title', `size` = '$size', `room_number` = '$room_number', `city` = '$city', `address`= '$address' , `latitude` = '$latitude',`longitude` = '$longitude', `reduction` = '$reduction',`price` = '$price' WHERE id  = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        header("refresh:3;url= ../index.php");
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
    <?php require_once '../components/navbar.php' ?>
    <?php require_once '../components/hero.php' ?>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    <?php require_once '../components/footer.php' ?>

    </body>
</html>