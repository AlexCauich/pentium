<?php 
    include('database.php');

    if(isset($_POST['name_job'])) {
        $name_job = $_POST['name_job'];
        $name_service = $_POST['name_service'];
        $phone = $_POST['phone'];
        $place_delivery = $_POST['place_delivery'];
        $anticipo = $_POST['anticipo'];
        $especi = $_POST['especi'];
    
        $data = $_POST['data'];
    
        $query = "INSERT INTO register(name_job,name_service,phone,place_delivery,anticipo,especi,fecha_registro) VALUES('$name_job', '$name_service', '$phone', '$place_delivery', '$anticipo', '$especi', '$date')";
        $result = mysqli_query($db, $query);
        if(!$result) {
            die('Query Failed.');
        }
        echo 'Register Added Successfully';
    }
?>