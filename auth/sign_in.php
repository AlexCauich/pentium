<?php 

include('../server/database.php');

$errors = 0;

if(isset($_POST['username'])) {
    //quitar espacion en blanco
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $reg_password = mysqli_real_escape_string($db, $_POST['reg_password']);
    $repeat_pass = mysqli_real_escape_string($db, $_POST['repeat_pass']);

    $mdpassword = md5($reg_password);

    $query_check = "SELECT * FROM users WHERE username = '$username'";
    $result_check = mysqli_query($db, $query_check);
    if(mysqli_num_rows($result_check) == 1) {
        die("un usuario ya existe con ese nombre y correo");
    }else {
        $query = "INSERT INTO users(username, password, repead_password) VALUES('$username','$mdpassword','$mdpassword')";
        $result = mysqli_query($db, $query);
        if(!$result) {
            die('Query failed');
        }
        $_SESSION['success'] = "You are now logged in";
        header('location: ../index.php');
    }

}

?>