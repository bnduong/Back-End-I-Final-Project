<?php
    
    $dsn = 'mysql:host=wftuqljwesiffol6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=hgr35rs7vhgydaqa';
    $username = 'g02d3awnk7yz8v89';
    $password = 'gmfyrukark3oxzcd';
    try {
        $db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>

