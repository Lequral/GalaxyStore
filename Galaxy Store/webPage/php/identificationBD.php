<?php

    $host = "localhost";
    $bdName = "galaxydatabase";
    $user = "root";
    $pass = "root";
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    try {
        $bd = new PDO("mysql:host=$host;dbname=$bdName;",
            $user, $pass, $option); 
    } catch(Exception $e) {
        die("Connexion à la base de donnée impossible !");
    }

?>