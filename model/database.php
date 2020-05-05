<?php
    
    $dsn = 'mysql:host=ko86t9azcob3a2f9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vdzpcv5mw0p3dygf';
    $username = 'jfo6rzlgq3oek7wi';
    $password = 'ofcmxx3h56o0oqyk';
    try {
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('..C:\xampp\htdocs\Final_Project\errors\database_error.php');
        exit();
    }
?>

