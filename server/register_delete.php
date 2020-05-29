<?php 
include('database.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM register WHERE id_register = '$id'";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die("jQuery failed");
    }
    
}
?>