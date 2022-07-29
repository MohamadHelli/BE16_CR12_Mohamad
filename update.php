<?php
require_once 'actions/db_connect.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM estates WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
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
<html>
    <head>
        <title>Update</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="Css/style.css">
        <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
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
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='picture/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <td><input class="form-control" type="text"  name="title" placeholder ="Product Name" value="<?php echo $title ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class="form-control" type= "number" name="size"  placeholder="**" value ="<?php echo $size ?>" /></td>
                    </tr>
                    <tr>
                        <th>Room Number</th>
                        <td><input class="form-control" type="number"  name="room_number" placeholder ="Room Number" value="<?php echo $room_number ?>"  /></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input class="form-control" type="text"  name="city" placeholder ="city" value="<?php echo $city ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class="form-control" type="text"  name="address" value="<?php echo $address ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td><input class="form-control" type="text"  name="latitude" value="<?php echo $latitude ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td><input class="form-control" type="text"  name="longitude" value="<?php echo $longitude ?>"/></td>
                    </tr>
                    <tr>
                    <th>Reduction</th>
                    <td> 
                        <select name="reduction">
                        <option <?php if($reduction == "Yes") { echo "selected";}  ?> value="Yes">Yes</option>
                        <option <?php if($reduction == "No") { echo "selected";}  ?> value="No">No</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><input class="form-control" type="text"  name="price" value="<?php echo $price ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name= "picture"/></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    <?php require_once 'components/footer.php' ?>

    </body>
</html>