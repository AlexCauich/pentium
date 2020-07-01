<?php
    include('database.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM budget WHERE id_budget = $id";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        die('jQuery Failed.');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'name' => $row['name'],
            'phone' => $row['phone'],
            'direction' => $row['direction'],
            'type_job' => $row['type_job'],
            'price' => $row['price'],
            'especi' => $row['especi'],
            'date_register' => $row['date_register'],
            'id_budget' => $row['id_budget']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;    

?>