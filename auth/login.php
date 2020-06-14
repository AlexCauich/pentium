<?php 

include('../server/database.php');
session_start();

if(isset($_POST['email'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $mdpassword = md5($password);


    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$mdpassword'";
    $result = mysqli_query($db, $query);
    
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['email'] = $email;
        exit();
    } 
    
}

?>