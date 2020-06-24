<?php
    include('../../connection/db.php');

    $query = "SELECT * FROM budget ORDER BY id_budget DESC";
    $result = mysqli_query($db, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($db));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'name' => $row['name'],
            'type_job' => $row['type_job'],
            'price' => $row['price'],
            'date_register' => $row['date_register'],
        );
    }  

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>