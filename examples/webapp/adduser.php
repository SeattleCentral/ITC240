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

echo "Type the user's password, and press [Enter]\n";
$password = trim(fgets(STDIN));

$hashed = password_hash($password, PASSWORD_DEFAULT);

$query = $db->prepare(
    'INSERT INTO users (username, password) VALUES (:username, :password)'
);

$success = $query->execute([
    'username' => $username,
    'password' => $hashed
]);

if ($success) {
    echo "Successfully added $username.\n\n";
} else {
    echo "Failed to add user.\n\n";
}

