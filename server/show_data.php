<?php 

include('database.php');
$id = $_GET['id'];

$query = "SELECT * FROM register WHERE id_register = '$id'";
$result = mysqli_query($db, $query);

$query_select = "SELECT * FROM delivered WHERE id_delivered = '$id'";
$result_query = mysqli_query($db, $query_select);


?>