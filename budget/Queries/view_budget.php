<?php
    include('database.php'); // Realizamos la consulta a la base de datos

    $query = "SELECT * FROM budget ORDER BY id_budget DESC"; // Seleccionamos todos los datos de la db
    $result = mysqli_query($db, $query); // Ejecutamos la consulta

    // Si existe un error mostrara el mensaje de Consulta fallida
    if(!$result) {
        die('Query Failed'. mysqli_error($db));
    }

    //Convertimos la respuesta de mysql a un array
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'name' => $row['name'],
            'type_job' => $row['type_job'],
            'price' => $row['price'],
            'date_register' => $row['date_register'],
            'id_budget' => $row['id_budget']
        );
    }  

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>