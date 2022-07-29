<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="./Css/style.css">
        <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
        <title>Create</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }
        </style>
    </head>
    <body>
    <?php require_once 'components/navbar.php' ?>
    <?php require_once 'components/hero.php';
    '<p>Create</p>'
    ?>
        <fieldset>
            <legend class='h2'>Create</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Title</th>
                        <td><input class='form-control' type="text" name="title"  placeholder="title" /></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class='form-control' type="number" name="size"  placeholder="123" /></td>
                    </tr>
                    <tr>
                    <th>Room Number</th>
                    <td>
                    <textarea class="form-control" placeholder="**" id="floatingTextarea" name="room_number"></textarea></td>
                    </tr>
                    <tr>
                    <th>Reduction</th>
                    <td><select class="form-select" aria-label="Default select example" name="reduction">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input class='form-control' type="text" name="city" ></td>
                    </tr>
                    <tr>
                        <th>address</th>
                        <td><input class='form-control' type="text" name="address" ></td>
                    </tr>
                    <tr>
                        <th>latitude</th>
                        <td><input class='form-control' type="text" name="latitude" placeholder="48.55585"></td>
                    </tr>
                    <tr>
                        <th>longitude</th>
                        <td><input class='form-control' type="text" name="longitude" placeholder="19.15151"></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><input class='form-control' type="number" name="price" ></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"/></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
    <?php require_once 'components/footer.php' ?>

</html>