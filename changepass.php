<?php 
    //Allow the config 
    define('__CONFIG__', true);
    //Require the config
    require_once "inc/config.php";

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
        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
            <form class="uk-form-stacked js-changepass">
                    
                <h2>Change Password</h2>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Enter your new password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="password" required='required' placeholder="New Password">
                    </div>
                </div>

                <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
                <div class="uk-margin uk-alert uk-alert-success js-success" style='display: none;'></div>

                <div class="uk-margin">
                    <button class="uk-button uk-button-default" type="submit">Change Password</button>
                </div>
                
                <p><a href="/FullStackPHP/PHP-Login-System/dashboard.php">Dashboard</a></p>

            </form>
        </div>
    </div>

    <?php require_once "inc/footer.php";?>

</body>
</html>