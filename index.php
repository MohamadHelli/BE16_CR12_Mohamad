<?php 
require_once 'actions/db_connect.php';

$sql = "SELECT * FROM estates";
$result = mysqli_query($connect , $sql);
$tbody = '';
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$tbody .= "
<div class = 'col-lg-4 col-md-6 col-sm-12 p-3'>
    <div class='card' style='width: 18rem;'>
        <img src='picture/" . $row['picture'] . "' class='card-img-top' alt='...'>
            <div class='card-body shadow-lg'>
            <h5 class='card-title'>" . $row['title'] . "</h5>
            <p class='card-text'><span class = 'fw-bold'>Size : </span>" . $row['size'] . " m<sup>2</sup>" . "</p>
            <p class='card-text'><span class = 'fw-bold'>Price : </span>" . $row['price'] . " € " . "</p>
            <p class='card-text'><span class = 'fw-bold'>City : </span>" . $row['city'] . "</p>
            <p class='card-text'><span class = 'fw-bold'>Address : </span>" . $row['address'] . "</p>
            <a href='details.php?id=" . $row['id'] . "' class='btn btn-warning'>Details</a>
        </div>
    </div>
</div>";
    };

}else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
mysqli_close($connect)
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome!</title>
        <link rel="stylesheet" href="./Css/style.css">
        <script src="https://kit.fontawesome.com/eedc6ffb6a.js" crossorigin="anonymous"></script>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">
            .manageProduct {
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {
                text-align: left;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }
        </style>
    </head>
    <body>
    <?php require_once 'components/navbar.php' ?>
    <?php require_once 'components/hero.php' ?>
        <div class="manageProduct w-75 mt-3">
            <div class="container">
                <div class="row">
                    <?= $tbody; ?>
                </div>
            </div>
        </div>
    <?php require_once 'components/footer.php' ?>
</body>
</html>