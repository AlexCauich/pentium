<?php 

include('../server/database.php');

$errors = 0;

if(isset($_POST['first_name'])) {
    //quitar espacion en blanco
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $repead_password = mysqli_real_escape_string($db, $_POST['repead_password']);

    $mdpassword = md5($password);

    $query_check = "SELECT * FROM users WHERE first_name = '$first_name' AND email = '$email'";
    $result_check = mysqli_query($db, $query_check);
    if(mysqli_num_rows($result_check) == 1) {
        die("un usuario ya existe con ese nombre y correo");
    }else {
        $query = "INSERT INTO users(first_name, last_name, email, password, repead_password) VALUES('$first_name','$last_name','$email','$mdpassword','$mdpassword')";
        $result = mysqli_query($db, $query);
        if(!$result) {
            die('Query failed');
        }
        $_SESSION['success'] = "You are now logged in";
        header('location: ../index.php');
    }

}

?>