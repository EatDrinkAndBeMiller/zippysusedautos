<?php
    /* $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';  */

    $dsn = 'mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=n9ledcrwnfrpiqpx';
    $username = 'zfymazkfxs7zfruh';
    $password = 'g45w0tdqhhg6tuo8';  
 
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }