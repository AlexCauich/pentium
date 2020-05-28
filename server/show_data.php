<?php 

include('database.php');
$id = $_GET['id'];

$query = "SELECT * FROM register WHERE id_register = '$id'";
$result = mysqli_query($db, $query);

?>