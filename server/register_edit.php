<?php

    include('database.php');

    $id = $_POST['id'];
    $name_job = $_POST['name_job'];
    $name_service = $_POST['name_service'];
    $phone = $_POST['phone'];
    $place_delivery = $_POST['place_delivery'];
    $anticipo = $_POST['anticipo'];
    $especi = $_POST['especi'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE register SET name_job = '$name_job', name_service = '$name_service', phone = '$phone', place_delivery = '$place_delivery', anticipo = '$anticipo', especi = '$especi', fecha_registro = '$fecha' WHERE id_register = $id";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('jQuery Failed');
    }
?>