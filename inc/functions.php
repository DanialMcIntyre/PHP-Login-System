<?php

function ForceLogin() {
    if(isset($_SESSION['user_id'])) {

    } else {
        header("Location: /FullStackPHP/PHP-Login-System/login.php"); exit;
    }
}

function ForceDashboard() {
    if(isset($_SESSION['user_id'])) {
        header("Location: /FullStackPHP/PHP-Login-System/dashboard.php"); exit;
    } else {
    }
}

function FindUser($con, $email, $return_assoc = false) {

    $email = (string) Filter::String($email);

    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($return_assoc) {
        return $findUser->fetch(PDO::FETCH_ASSOC);
    }

    $user_found = (boolean) $findUser->rowCount();

    return $user_found;

}

?>