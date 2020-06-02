<?php 

include('database.php');

$query = "SELECT * FROM register ORDER BY id_register DESC";

$result = mysqli_query($db, $query);    

?>


