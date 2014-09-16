<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php';

try {
    $db = Database::getInstance();
    echo 'No need to install.';
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL 
            . '<br />You are about to create database <strong>'.DB_NAME.'</strong>. '
            . '<br />You may change your settings in <strong>config.php</strong> file.'
            . '<br /> ... <br />';
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS);
    $sql="CREATE DATABASE " . DB_NAME;
    if (mysqli_query($con,$sql)) {
        echo "Database ".DB_NAME." created successfully. You will be redirected to home page in 5 seconds";
        mysqli_select_db($con,DB_NAME);
        
        $table_contacts = " CREATE TABLE contacts
                            
                            ";
        mysqli_query($table_contacts);
        
        header( "Refresh:5; url=/", true, 303);
    } else {
        echo "Error creating database: " . mysqli_error($con);
    }
}

