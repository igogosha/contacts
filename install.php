<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php';

try {
    $db = Database::getInstance();
    echo 'No need to install.';
    echo "<br />You now will be redirected to home page";
    header( "Refresh:5; url=/contacts/", true, 303);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL 
            . '<br />You are about to create database <strong>'.DB_NAME.'</strong>. '
            . '<br />You may change your settings in <strong>config.php</strong> file.'
            . '<br /> ... <br />';
    
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS);
    $sql="CREATE DATABASE " . DB_NAME;
    
    if (mysqli_query($con,$sql)) {
        echo "Database <strong>".DB_NAME."</strong> created successfully.";
        mysqli_select_db($con,DB_NAME);
        
        $table_users = "CREATE TABLE users (
                        id int NOT NULL AUTO_INCREMENT,
                        email varchar(255),
                        password varchar(32),
                        PRIMARY KEY (id)
                        )";
        
        if (mysqli_query($con,$table_users)) {
            echo "<br />Table <strong>users</strong> successfully created";
        }
        
        $table_contacts = "CREATE TABLE contacts (
                            id int NOT NULL AUTO_INCREMENT,
                            user_id int,
                            name varchar(255),
                            phone varchar(50),
                            address varchar(255),
                            PRIMARY KEY (id),
                            FOREIGN KEY (user_id) REFERENCES users(id) 
                            )";
        
        if (mysqli_query($con,$table_contacts)) {
            echo "<br />Table <strong>contacts</strong> successfully created";
        }
        
        echo "<br /><strong>Thank you!</strong> You now will be redirected to home page";
        header( "Refresh:5; url=/contacts/", true, 303);
    } else {
        echo "Error creating database: " . mysqli_error($con);
    }
}
