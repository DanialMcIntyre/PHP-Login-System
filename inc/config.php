<?php

    //If there is no constant define called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    //Our config is below

    //include DB.php
    include_once "C:\wamp64\www\FullStackPHP\PHP-Login-System\inc\classes\DB.php";

    $con = DB::getConnection();

?>