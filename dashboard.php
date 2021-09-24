<?php 
    //Allow the config 
    define('__CONFIG__', true);
    //Require the config
    require_once "inc/config.php";

    ForceLogin();

    $user_id = $_SESSION['user_id'];
    $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
    $getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $getUserInfo->execute();

    if($getUserInfo->rowCount() == 1) {
        $User = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: /FullStackPHP/PHP-Login-System/logout.php"); exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
</head>

<body>

    <div class="uk-section uk-container">
        <h2>Dashboard</h2>
        <p>Hello <?php echo $User['email']; ?>, you registered at <?php echo $User['reg_time']; ?></p>
        <p><a href="/FullStackPHP/PHP-Login-System/logout.php">Logout</a></p>
    </div>

    <?php require_once "inc/footer.php";?>

</body>
</html>