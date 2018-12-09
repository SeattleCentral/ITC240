<?php

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

echo "\n".
     "Add a New User! This is a CLI only application.\n".
     "===============================================\n\n";

$db = connectDB();

if ($db == null) {
    echo "Oh NO!! Could not connect to the database.\n\n";
    die();
}

echo "Type the username, and press [Enter]\n";
$username = trim(fgets(STDIN));

echo "Type the editor's password, and press [Enter]\n";
$password = trim(fgets(STDIN));

echo "Type the editor's name, and press [Enter]\n";
$name = trim(fgets(STDIN));

$hashed = password_hash($password, PASSWORD_DEFAULT);

$query = $db->prepare(
    'INSERT INTO editor (username, password, name) '.
    'VALUES (:username, :password, :name)'
);

$success = $query->execute([
    'username' => $username,
    'password' => $hashed,
    'name' => $name
]);

if ($success) {
    echo "Successfully added $username.\n\n";
} else {
    echo "Failed to add user.\n\n";
}

