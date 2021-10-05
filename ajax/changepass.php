<?php 
    //Allow the config 
    define('__CONFIG__', true);
    //Require the config
    require_once "../inc/config.php";

    $User = new User($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        header('Content-Type: application/json');

        $return = [];
        $changepass = Filter::String($_POST['password']);

        $password = password_hash($changepass, PASSWORD_DEFAULT);

        $userid = $User->user_id;

        $sql = "UPDATE users SET password =:password WHERE user_id =:userid";

        $statement = $con->prepare($sql);
        $statement->bindParam('userid', $userid);
        $statement->bindParam('password', $password);
        $statement->execute();

        echo json_encode($return, JSON_PRETTY_PRINT); exit;   
    } else {
        exit('Invalid URL');
    }
    
?>