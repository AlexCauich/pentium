<?php 
    include('database.php');
    
    $query = "SELECT * FROM delivered";
    $query_result = mysqli_query($db, $query);
?>