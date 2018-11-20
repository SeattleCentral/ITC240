<?php

define('BASEPATH', dirname(__FILE__));

require BASEPATH . '/secret.php';

function connectDB() {
    try {
        $pdo = new PDO(
            'mysql:host='.DBHOST.';dbname='.DBNAME,
            DBUSER, DBPASSWORD
        );
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        $pdo->exec("SET NAMES 'utf8'");
        return $pdo;
    } catch (PDOException $e) {
        //
    }
    return null;
}

