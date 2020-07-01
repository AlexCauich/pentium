<?php

    include('database.php');
    $id = $_POST['id'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $direction = $_POST['direction'];
    $type_job = $_POST['type_job'];
    $price = $_POST['price'];
    $especi = $_POST['especi'];
    $date_register = $_POST['date_register'];

    $query = "UPDATE budget SET name = '$name', phone = '$phone', direction = '$direction', type_job = '$type_job', price = '$price', especi = '$especi', date_register = '$date_register' WHERE id_budget = $id";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('jQuery Failed');
    }
?>