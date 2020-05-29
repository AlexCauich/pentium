<?php
    include('database.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM register WHERE id_register = $id";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        die('jQuery Failed.');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'name_job' => $row['name_job'],
            'name_service' => $row['name_service'],
            'phone' => $row['phone'],
            'place_delivery' => $row['place_delivery'],
            'anticipo' => $row['anticipo'],
            'especi' => $row['especi'],
            'fecha_registro' => $row['fecha_registro'],
            'id_register' => $row['id_register']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;    

?>