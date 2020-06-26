<?php 

include('database.php');

$query = "SELECT * FROM budget ORDER BY id_budget DESC";

$result = mysqli_query($db, $query);    

?>