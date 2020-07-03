<?php 

include('database.php');

$id = $_GET['ID'];

$query_select = "SELECT * FROM delivered WHERE id_delivered = $id";
$result = mysqli_query($db, $query_select);

while($row = mysqli_fetch_array($result)) {
    $name_job = $row['name_job'];
    $name_service = $row['name_service'];
    $phone = $row['phone'];
    $place_delivery = $row['place_delivery'];
    $anticipo = $row['anticipo'];
    $especi = $row['especi'];
    $fecha_registro = $row['fecha_registro'];
}

$query = "INSERT INTO register(name_job,name_service,phone,place_delivery,anticipo,especi,fecha_registro) VALUES('$name_job', '$name_service', '$phone', '$place_delivery', '$anticipo', '$especi', '$fecha_registro')";
$result = mysqli_query($db, $query);

if(!$result) {
    die('Query Failed.');
} 
else {
    $delete_query = "DELETE FROM delivered WHERE id_delivered = $id";
    $result_delete = mysqli_query($db, $delete_query);
    header('location: ../../home.php');
    die();
}


?>