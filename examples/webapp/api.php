<?php

header('Content-Type: application/json');

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    $results = [
        "error" => "Could not connect to DB"    
    ];
    echo json_encode($results);
    die();
}

if (isset($_GET['search'])) {
    $search = $db->prepare("SELECT * FROM people WHERE name LIKE :search");
    $search->execute([
        'search' => "%".$_GET['search']."%"
    ]);
    $results = $search->fetchAll(PDO::FETCH_ASSOC);
} else {
    $query = $db->prepare("SELECT * FROM people");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($results, JSON_PRETTY_PRINT);