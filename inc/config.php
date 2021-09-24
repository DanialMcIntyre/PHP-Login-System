<?php

    //If there is no constant define called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    if(!isset($_SESSION)) {
        session_start();
    }

    //Our config is below
    error_reporting(-1);
    ini_set('display_errors', 'On');

    //include DB.php
    include_once "classes/DB.php";
    include_once "classes/Filter.php";
    include_once "functions.php";


    $con = DB::getConnection();

?>