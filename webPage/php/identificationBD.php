<?php

    $host = "localhost";
    $bdName = "galaxydatabase";
    $user = "root";
    $pass = "root";
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    try {
        $bd = new PDO('mysql:dbname='.$bdName.';host='.$host,
        $user, $pass, $option);
        /*echo "Connected to ".$bdName." at ".$host." successfully !";*/
    } catch(PDOException $pe) {
        die("Connexion à la base de donnée impossible :".$pe->getMessage());
    }
    
?>