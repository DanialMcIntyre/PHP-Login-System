<?php 
    //Allow the config 
    define('__CONFIG__', true);
    //Require the config
    require_once "../inc/config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        header('Content-Type: application/json');

        $return = [];

        $email = Filter::String($_POST['email']);

        $user_found = FindUser($con, $email);

        if($user_found) {
            $return['error'] = "You already have an account";
        } else{

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;

            $return['redirect'] = '/FullStackPHP/PHP-Login-System/dashboard.php?message=welcome';
            
        }

        echo json_encode($return, JSON_PRETTY_PRINT); exit;   
    } else {
        exit('Invalid URL');
    }
    
?>