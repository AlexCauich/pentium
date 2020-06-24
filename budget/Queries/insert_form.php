<?php

include('../../connection/db.php');

if(isset($_POST['date_register'])) {
    $date = $_POST['date_register'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $direction = $_POST['direction'];
    $type_job = $_POST['type_job'];
    $price = $_POST['price'];
    $especi = $_POST['especi'];

    $query = "INSERT INTO budget(date_register, name, phone, direction, type_job, price, especi) VALUES('$date', '$name', '$phone', '$direction', '$type_job', '$price', '$especi')";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die("Query Failed");
    }

    echo 'Register success';
}

?>