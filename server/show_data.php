<?php 

include('database.php');
$id = $_GET['ID'];

$query = "SELECT * FROM register WHERE id_register = '$id'";
$result = mysqli_query($db, $query);

?>