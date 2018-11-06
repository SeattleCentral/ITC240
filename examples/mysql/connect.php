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
        echo "DB Connection error: " . $e->getCode() .
             " - " . $e->getMessage();
    }
    return null;
}

$db = connectDB();

if (null) {
    echo "UH OH."; die();
}
$query = $db->prepare('SELECT * FROM people');
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $person) {
    echo "<h3>".$person['name']."</h3>";
}
