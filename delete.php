<?php
require_once 'actions/db_connect.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM estates WHERE id = {$id}" ;
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $title = $data['title'];
        $size = $data['size'];
        $room_number = $data['room_number'];
        $city = $data['city'];
        $address = $data['address'];
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $reduction = $data['reduction'];
        $price = $data['price'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Css/style.css">
        <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
        <title>Delete</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }
        </style>
    </head>
    <body>
    <?php require_once 'components/navbar.php' ?>
    <?php require_once 'components/hero.php' ?>
        <fieldset>
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='picture/<?php echo $picture ?>' alt="<?php echo $title ?>"></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td><?php echo $title?></td>
                </tr>
            </table>
            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action ="actions/a_delete.php" method="post" class="m-4">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    <?php require_once 'components/footer.php' ?>

    </body>
</html>