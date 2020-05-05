<?php
    
    $dsn = 'mysql:host=localhost;dbname=famous_quotes_site';
    $username = 'root';
    $password = 'Mongmo12';
    try {
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('..C:\xampp\htdocs\Final_Project\errors\database_error.php');
        exit();
    }
?>

