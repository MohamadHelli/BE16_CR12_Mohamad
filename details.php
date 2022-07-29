<?php

require_once 'actions/db_connect.php';

$sql = "SELECT * FROM estates WHERE id = $_GET[id]";
$result = mysqli_query($connect, $sql);

$lat ="";
$lng ="";

$tbody="";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $lat ="".$row['latitude']."";
        $lng ="".$row['longitude']."";

        $tbody .= "
        <div class = 'col-lg-4 col-md-6 col-sm-12 p-3'>
            <div class='card' style='width: 18rem;'>
                <img src='picture/" . $row['picture'] . "' class='card-img-top' alt='...'>
                    <div class='card-body shadow-lg'>
                    <h5 class='card-title'>" . $row['title'] . "</h5>
                    <p class='card-text'><span class = 'fw-bold'>Size : </span>" . $row['size'] . " m<sup>2</sup>" . "</p>
                    <p class='card-text'><span class = 'fw-bold'>Room Number : </span>" . $row['room_number'] . "</p>
                    <p class='card-text'><span class = 'fw-bold'>City : </span>" . $row['city'] . "</p>
                    <p class='card-text'><span class = 'fw-bold'>Address : </span>" . $row['address'] . "</p>
                    <p class='card-text'><span class = 'fw-bold'>Reduction : </span>" . $row['reduction'] . "</p>
                    <p class='card-text'><span class = 'fw-bold'>Price : </span>" . $row['price'] . " € " . "</p>
                    <div class='col-12 m-4'>
                        <a href='update.php?id=".$row['id']."'><button class='btn btn-primary'>Update</button></a>
                        <a href='delete.php?id=".$row['id']."'><button class='btn btn-danger' >Delete</button></a>
                        <a href='index.php?id=".$row['id']."'><button class='btn btn-warning'>Back</button></a>
                    </div>
                </div>
            </div>
        </div>";
    };
}else {
    $tbody="
        <tr>
        <td> colspan='5' class='text-center'>Not Data </td>
        </tr>
    ";

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php'?>
    <link rel="stylesheet" href="./Css/style.css">
    <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
    <title>Details</title>
</head>
<body>
<?php require_once 'components/navbar.php' ?>
<?php require_once 'components/hero.php' ?>
        <div class="manageProduct w-75 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <?= $tbody; ?>
                    </div>
                    <div class="col-8">
                        <div id="map" style = "height:50vh; width:50wh;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <script>
        var map;
        function initMap() {
            var location = {
                lat:  <?php echo $lat; ?>,
                lng:   <?php echo $lng; ?>
            };
            map = new google.maps.Map(document.getElementById("map"), {
                center: location,
                zoom: 15
            });
            var pinpoint = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>


    <?php require_once 'components/footer.php' ?>

</body>
</html>
