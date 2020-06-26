<?php 
    include('database.php');

    if(isset($_POST['reg_form'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $direction = $_POST['direction'];
        $type_job = $_POST['type_job'];
        $price = $_POST['price'];
        $especi = $_POST['especi'];
        $date_register = $_POST['date_register'];

        $query = "INSERT INTO budget(name, phone, direction, type_job, price, especi, date_register) VALUES('$name', '$phone', '$direction', '$type_job', '$price', '$especi', '$date_register')";
        $result = mysqli_query($db, $query);

        if(!$result) {
            die("Query Failed");
        }

        header('location: ../budget.php');
    }
?>